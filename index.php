<?php

use Symfony\Component\HttpFoundation\Response;
use PicoFeed\Syndication\AtomFeedBuilder;
use PicoFeed\Syndication\AtomItemBuilder;

const DATA_PATH           = 'data/';
const DEFAULT_LANG        = 'en_US';
const URL_NIGHTLY_ARCHIVE = 'https://s3.amazonaws.com/kanboard-releases/kanboard-nightly.zip';

require __DIR__.'/vendor/autoload.php';

if (file_exists(__DIR__.'/config.php')) {
    require __DIR__.'/config.php';
}

defined('APP_VERSION') or define('APP_VERSION', '0.0.0');
defined('APP_RELEASE_DATE') or define('APP_RELEASE_DATE', 'today');
defined('MAILGUN_API_KEY') or define('MAILGUN_API_KEY', 'replace_me');

if (php_sapi_name() === 'cli-server') {
    $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);

    if (is_file($filename)) {
        return false;
    }
}

function render_doc($language, $file)
{
    $file = basename($file);
    $filename = DATA_PATH.'documentation/'.$language.'/'.$file.'.markdown';
    $url_lang = $language === DEFAULT_LANG ? '' : substr($language, 0, 2).'/';

    if (! file_exists($filename)) {
        return false;
    }

    $markdown = file_get_contents($filename);

    $markdown = preg_replace_callback('/\((.*.markdown)\)/', function (array $matches) use ($url_lang) {
        return '(/'.$url_lang.'documentation/'.str_replace('.markdown', '', $matches[1]).')';
    }, $markdown);

    $markdown = preg_replace_callback('/\((screenshots.*\.png)\)/', function (array $matches) use ($language) {
        if (! file_exists('screenshots/documentation/'.$language.'/'.$matches[1])) {
            return '(/screenshots/documentation/en_US/'.$matches[1].')';
        }

        return '(/screenshots/documentation/'.$language.'/'.$matches[1].')';
    }, $markdown);

    return [
        'content' => Parsedown::instance()->text($markdown),
        'title' => file($filename)[0],
    ];
}

function render_nav($language)
{
    return Parsedown::instance()->text(file_get_contents(DATA_PATH.'pages/'.$language.'/nav.markdown'));
}

function render_page($filename, $url = '')
{
    $url = basename($url);
    $lines = file($filename);
    $date = '';
    $title = '';
    $description = '';
    $language = 'en_US';

    for ($i = 0, $ilen = count($lines); $i < $ilen; $i++) {
        $line = array_shift($lines);

        if (strpos($line, 'Date: ') === 0) {
            $date = trim(substr($line, 6));
        } elseif (strpos($line, 'Title: ') === 0) {
            $title = trim(substr($line, 7));
        } elseif (strpos($line, 'Description: ') === 0) {
            $description = trim(substr($line, 13));
        } elseif (strpos($line, 'Language: ') === 0) {
            $language = trim(substr($line, 10));
        } elseif (strpos($line, '---') === 0) {
            break;
        }
    }

    return [
        'url' => $url,
        'content' => Parsedown::instance()->text(implode('', $lines)),
        'date' => empty($date) ? null : new DateTime($date),
        'title' => $title,
        'description' => $description ?: $title,
        'language' => $language,
    ];
}

function render_news()
{
    $news = [];
    $dir = new DirectoryIterator(DATA_PATH.'news');

    foreach ($dir as $fileinfo) {
        if ($fileinfo->getExtension() === 'markdown') {
            $post = render_page($fileinfo->getRealPath(), $fileinfo->getBasename('.markdown'));
            $news[$post['date']->format('Y-m-d')] = $post;
        }
    }

    krsort($news);

    return array_values($news);
}

function load_plugins($load_plugin = '')
{
    $plugins = include(DATA_PATH.'plugins.php');

    foreach ($plugins as $key => &$plugin) {
        if ($load_plugin !== '' && $load_plugin === $key) {
            $readme = file_get_contents($plugin['readme']);
            $lines = explode("\n", $readme);
            array_shift($lines);
            array_shift($lines);

            $plugin['readme_markdown'] = Parsedown::instance()->text(implode("\n", $lines));
        }

        $plugin['description_markdown'] = Parsedown::instance()->text($plugin['description']);
    }

    return $plugins;
}

function cache($app, callable $callback, array $headers = [])
{
    $uri = $app['request']->getUri();
    $filename = DATA_PATH.'cache/'.md5($uri).'.cache';
    $duration = 2*86400;

    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $hash = md5($uri.$content);
        $etags = $app['request']->getETags();

        if (count($etags) === 1 && $etags[0] === '"'.$hash.'"') {
            return Response::create()->setStatusCode(304);
        }

        $headers['ETag'] = '"'.$hash.'"';
    } else {
        $content = $callback();
        file_put_contents($filename, $content);
    }

    return new Response($content, 200, $headers + [
        'Pragma' => 'cache',
        'Expires' => gmdate('D, d M Y H:i:s', time() + $duration) . ' GMT',
        'Cache-Control' => 'public, max-age=' . $duration,
        'Last-Modified' => gmdate('D, d M Y H:i:s', filemtime($filename)) . ' GMT',
    ]);
}

function add_subscriber($list, $email)
{
    $payload = array(
        'subscribed' => 'True',
        'address' => $email,
    );

    $headers = array(
        'Connection: close',
        'Content-type: application/x-www-form-urlencoded',
        'Authorization: Basic '.base64_encode('api:'.MAILGUN_API_KEY),
    );

    $context = array(
        'http'=>array(
            'method' => 'POST',
            'protocol_version' => 1.1,
            'timeout' => 2,
            'header' => implode("\r\n", $headers),
            'content' => http_build_query($payload),
        )
    );

    $fp = @fopen('https://api.mailgun.net/v3/lists/'.$list.'/members', 'r', false, stream_context_create($context));
    @stream_get_contents($fp);
}


$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views',
]);

$app['twig']->addGlobal('info', [
    'version' => APP_VERSION,
    'date' => APP_RELEASE_DATE,
]);

$app->get('/plugins.json', function () use ($app) {
    return cache($app, function () use ($app) {
        return json_encode(load_plugins());
    }, ['Content-Type' => 'application/json']);
});

$app->get('/plugins', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('plugins.twig', [
            'plugins' => load_plugins(),
            'language' => DEFAULT_LANG,
            'nav' => render_nav(DEFAULT_LANG),
        ]);
    });
});

$app->get('/plugin/{plugin}', function ($plugin) use ($app) {
    return cache($app, function () use ($app, $plugin) {
        $plugins = load_plugins($plugin);

        if (! isset($plugins[$plugin])) {
            return $app->abort(404);
        }

        return $app['twig']->render('plugin.twig', [
            'plugin' => $plugins[$plugin],
            'language' => DEFAULT_LANG,
            'nav' => render_nav(DEFAULT_LANG),
        ]);
    });
});

$app->get('/news', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('posts.twig', [
            'posts' => render_news(),
            'language' => DEFAULT_LANG,
            'nav' => render_nav(DEFAULT_LANG),
        ]);
    });
});

$app->get('/news/{file}', function ($file) use ($app) {
    return cache($app, function () use ($app, $file) {
        return $app['twig']->render('post.twig', [
            'post' => render_page(DATA_PATH . 'news' . DIRECTORY_SEPARATOR . $file . '.markdown', $file),
            'language' => DEFAULT_LANG,
            'nav' => render_nav(DEFAULT_LANG),
        ]);
    });
});

$app->get('/version', function () use ($app) {
    return $app->json(['version' => APP_VERSION]);
});

$app->get('/feed', function () use ($app) {
    return cache($app, function () use ($app) {
        $feedBuilder = AtomFeedBuilder::create()
            ->withTitle('Kanboard News')
            ->withAuthor('Frédéric Guillot', '', 'https://github.com/fguillot')
            ->withFeedUrl('https://kanboard.net/feed')
            ->withSiteUrl('https://kanboard.net/')
            ->withDate(new DateTime());

        foreach (render_news() as $post) {
            $feedBuilder
                ->withItem(AtomItemBuilder::create($feedBuilder)
                    ->withTitle($post['title'])
                    ->withUrl('https://kanboard.net/news/' . $post['url'])
                    ->withPublishedDate($post['date'])
                    ->withUpdatedDate($post['date'])
                    ->withContent($post['content'])
                );
        }

        return $feedBuilder->build();
    }, ['Content-Type' => 'text/xml']);
});


$archives = [
    '/kanboard-nightly.zip' => URL_NIGHTLY_ARCHIVE,
    '/kanboard-latest.zip' => '/kanboard-' . APP_VERSION . '.zip',
    '/kanboard-latest.zip.asc' => '/kanboard-' . APP_VERSION . '.zip.asc',
];

foreach ($archives as $url => $archive) {
    $app->get($url, function () use ($app, $archive) {
        return $app->redirect($archive, 302);
    });
}


$newsletters = [
    '/subscribe/enterprise' => 'enterprise@ml.kanboard.net',
    '/subscribe/newsletter' => 'newsletter@ml.kanboard.net',
];

foreach ($newsletters as $url => $email) {
    $app->post($url, function () use ($app, $email) {
        add_subscriber($email, $_POST['email']);
        return $app->redirect('/');
    });
}


$docs = [
    '/documentation' => 'en_US',
    '/documentation/{file}' => 'en_US',
    '/fr/documentation' => 'fr_FR',
    '/fr/documentation/{file}' => 'fr_FR',
];

foreach ($docs as $url => $language) {
    $app->get($url, function ($file = 'index') use ($app, $language) {
        return cache($app, function () use ($app, $file, $language) {
            $page = render_doc($language, $file);

            if ($page === false) {
                return $app->abort(404);
            }

            return $app['twig']->render('page.twig', [
                'page' => $page,
                'language' => $language,
                'nav' => render_nav($language),
            ]);
        });
    });
}


$pages = [
    '/' => 'en_US/index.markdown',
    '/security' => 'en_US/security.markdown',
    '/fr' => 'fr_FR/index.markdown',
    '/features' => 'en_US/features.markdown',
    '/fr/fonctionnalites' => 'fr_FR/features.markdown',
    '/consulting' => 'en_US/consulting.markdown',
    '/fr/personnalisation' => 'fr_FR/consulting.markdown',
    '/enterprise' => 'en_US/enterprise.markdown',
    '/fr/entreprise' => 'fr_FR/enterprise.markdown',
    '/downloads' => 'en_US/downloads.markdown',
    '/fr/telechargements' => 'fr_FR/downloads.markdown',
    '/hosting' => 'en_US/hosting.markdown',
    '/fr/hebergement' => 'fr_FR/hosting.markdown',
    '/donations' => 'en_US/donations.markdown',
    '/fr/donations' => 'fr_FR/donations.markdown',
];

foreach ($pages as $url => $markdown_file) {
    $app->get($url, function () use ($app, $markdown_file) {
        return cache($app, function () use ($app, $markdown_file) {
            $page = render_page(DATA_PATH.'pages/'.$markdown_file);

            return $app['twig']->render('page.twig', [
                'page' => $page,
                'nav' => render_nav($page['language']),
                'language' => $page['language'],
            ]);
        });
    });
}


$redirects = [
    '/demo' => '/hosting',
    '/development' => '/consulting',
    '/documentation/slack' => '/plugin/slack',
    '/documentation/jabber' => '/plugin/jabber',
    '/documentation/hipchat' => '/plugin/hipchat',
    '/documentation/mailgun' => '/plugin/mailgun',
    '/documentation/sendgrid' => '/plugin/sendgrid',
    '/documentation/postmark' => '/plugin/postmark',
    '/documentation/budget' => '/plugin/budget',
    '/documentation/nginx-ssl-php-fpm' => '/documentation',
    '/documentation/recommended-configuration' => '/documentation/requirements',
    '/documentation/bitbucket-webhooks' => '/plugin/bitbucket-webhook',
    '/documentation/gitlab-webhooks' => '/plugin/gitlab-webhook',
    '/documentation/github-webhooks' => '/plugin/github-webhook',
    '/documentation/google-authentication' => '/plugin/google-auth',
    '/documentation/github-authentication' => '/plugin/github-auth',
    '/documentation/gitlab-authentication' => '/plugin/gitlab-auth',
    '/features/gantt-chart' => '/features',
    '/features/integrations' => '/features',
    '/features/analytics-and-reports' => '/features',
    '/features/dashboard' => '/features',
    '/features/search-and-filters' => '/features',
    '/features/kanban' => '/features',
];

foreach ($redirects as $source => $destination) {
    $app->get($source, function () use ($app, $destination) {
        return $app->redirect($destination, 301);
    });
}


$app->run();
