<?php

use Symfony\Component\HttpFoundation\Response;
use PicoFeed\Syndication\AtomFeedBuilder;
use PicoFeed\Syndication\AtomItemBuilder;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';

if (php_sapi_name() === 'cli-server') {
    $filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);

    if (is_file($filename)) {
        return false;
    }
}

function get_title($file)
{
    $f = fopen($file, 'r');
    $line = fgets($f);
    fclose($f);

    return $line;
}

function doc_replace_url(array $matches)
{
    return '(/documentation/'.str_replace('.markdown', '', $matches[1]).')';
}

function doc_replace_image_url(array $matches)
{
    return '(/screenshots/documentation/'.$matches[1].')';
}

function doc_page($directory, $file)
{
    $file = basename($file);
    $directory = basename($directory);
    $filename = DATA_PATH.$directory.'/'.$file.'.markdown';

    if (! file_exists($filename)) {
        return false;
    }

    $markdown = file_get_contents($filename);
    $markdown = preg_replace_callback('/\((.*.markdown)\)/', 'doc_replace_url', $markdown);
    $markdown = preg_replace_callback('/\((screenshots.*\.png)\)/', 'doc_replace_image_url', $markdown);

    return [
        'menu' => $directory,
        'content' => Parsedown::instance()->text($markdown),
        'title' => get_title($filename),
    ];
}

function page($filename, $url = '')
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

function news()
{
    $news = [];
    $dir = new DirectoryIterator(DATA_PATH.'news');

    foreach ($dir as $fileinfo) {
        if ($fileinfo->getExtension() === 'markdown') {
            $post = page($fileinfo->getRealPath(), $fileinfo->getBasename('.markdown'));
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

$app->get('/', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('homepage.twig', [
            'menu' => 'home',
            'app' => [
                'version' => APP_VERSION,
                'release_date' => APP_RELEASE_DATE,
            ],
        ]);
    });
});

$app->get('/donations', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('donations.twig');
    });
});

$app->get('/downloads', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('downloads.twig', [
            'menu' => 'downloads',
            'app' => [
                'version' => APP_VERSION,
                'release_date' => APP_RELEASE_DATE,
            ],
        ]);
    });
});

$app->get('/features', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('features.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/kanban', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_kanban.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/search-and-filters', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_search.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/dashboard', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_dashboard.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/analytics-and-reports', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_analytics.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/integrations', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_integration.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/features/gantt-chart', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('feature_gantt.twig', [
            'menu' => 'features',
        ]);
    });
});

$app->get('/enterprise', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('enterprise.twig', [
            'menu' => 'enterprise',
        ]);
    });
});

$app->get('/consulting', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('consulting.twig', [
            'menu' => 'enterprise',
        ]);
    });
});

$app->get('/hosting', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('hosting.twig', [
            'menu' => 'hosting',
            'page' => page(implode(DIRECTORY_SEPARATOR, [DATA_PATH, 'pages', 'en_US', 'hosting.markdown'])),
            'price' => MONTHLY_PRICE,
            'trial_period' => TRIAL_PERIOD,
            'signup_url' => SIGNUP_URL,
        ]);
    });
});

$app->get('/plugins.json', function () use ($app) {
    return cache($app, function () use ($app) {
        return json_encode(load_plugins());
    }, ['Content-Type' => 'application/json']);
});

$app->get('/plugins', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('plugins.twig', [
            'menu' => 'plugins',
            'plugins' => load_plugins(),
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
            'menu' => 'plugins',
            'plugin' => $plugins[$plugin],
        ]);
    });
});

$app->get('/documentation', function () use ($app) {
    return cache($app, function () use ($app) {
        $page = doc_page('documentation', 'index');

        if ($page === false) {
            return $app->abort(404);
        }

        return $app['twig']->render('page.twig', $page + ['menu' => 'documentation']);
    });
});

$app->get('/documentation/{file}', function ($file) use ($app) {
    $redirects = [
        'slack' => '/plugin/slack',
        'jabber' => '/plugin/jabber',
        'hipchat' => '/plugin/hipchat',
        'mailgun' => '/plugin/mailgun',
        'sendgrid' => '/plugin/sendgrid',
        'postmark' => '/plugin/postmark',
        'budget' => '/plugin/budget',
        'nginx-ssl-php-fpm' => '/documentation',
        'recommended-configuration' => '/documentation/requirements',
        'bitbucket-webhooks' => '/plugin/bitbucket-webhook',
        'gitlab-webhooks' => '/plugin/gitlab-webhook',
        'github-webhooks' => '/plugin/github-webhook',
        'google-authentication' => '/plugin/google-auth',
        'github-authentication' => '/plugin/github-auth',
        'gitlab-authentication' => '/plugin/gitlab-auth',
    ];

    if (isset($redirects[$file])) {
        return $app->redirect($redirects[$file], 301);
    }

    return cache($app, function () use ($app, $file) {
        $page = doc_page('documentation', $file);

        if ($page === false) {
            return $app->abort(404);
        }

        return $app['twig']->render('page.twig', $page);
    });
});

$app->get('/downloads', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('downloads.twig', [
            'menu' => 'downloads',
            'app'  => [
                'version'      => APP_VERSION,
                'release_date' => APP_RELEASE_DATE,
            ],
        ]);
    });
});

$app->get('/news', function () use ($app) {
    return cache($app, function () use ($app) {
        return $app['twig']->render('posts.twig', [
            'menu' => 'news',
            'posts' => news(),
        ]);
    });
});

$app->get('/news/{file}', function ($file) use ($app) {
    return cache($app, function () use ($app, $file) {
        return $app['twig']->render('post.twig', [
            'menu' => 'news',
            'post' => page(DATA_PATH . 'news' . DIRECTORY_SEPARATOR . $file . '.markdown', $file),
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

        foreach (news() as $post) {
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

$app->get('/demo', function () use ($app) {
    return $app->redirect('/hosting', 301);
});

$app->get('/development', function () use ($app) {
    return $app->redirect('/consulting', 301);
});

$app->post('/subscribe/enterprise', function () use ($app) {
    add_subscriber('enterprise@ml.kanboard.net', $_POST['email']);
    return $app->redirect('/');
});

$app->post('/subscribe/hosting', function () use ($app) {
    add_subscriber('hosting@ml.kanboard.net', $_POST['email']);
    return $app->redirect('/');
});

$app->post('/subscribe/newsletter', function () use ($app) {
    add_subscriber('newsletter@ml.kanboard.net', $_POST['email']);
    return $app->redirect('/');
});

$app->get('/kanboard-{version}.zip', function ($version) use ($app) {
    if ($version === 'latest') {
        $version = APP_VERSION;
    }

    return $app->redirect('https://s3.amazonaws.com/kanboard-releases/kanboard-'.$version.'.zip', 302);
})->assert('version', '.+');;

$app->get('/kanboard-{version}.zip.asc', function ($version) use ($app) {
    if ($version === 'latest') {
        $version = APP_VERSION;
    }

    return $app->redirect('https://s3.amazonaws.com/kanboard-releases/kanboard-'.$version.'.zip.asc', 302);
})->assert('version', '.+');;

$app->run();
