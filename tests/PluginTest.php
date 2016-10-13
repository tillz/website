<?php

require_once __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class PluginTest extends TestCase
{
    protected $plugins = [];

    public function setUp()
    {
        $this->plugins = include(__DIR__.'/../data/plugins.php');
    }

    public function testFields()
    {
        foreach ($this->plugins as $key => $plugin) {
            $this->assertInternalType('string', $key);
            $this->assertArrayHasKey('title', $plugin);
            $this->assertArrayHasKey('version', $plugin);
            $this->assertArrayHasKey('author', $plugin);
            $this->assertArrayHasKey('license', $plugin);
            $this->assertArrayHasKey('description', $plugin);
            $this->assertArrayHasKey('homepage', $plugin);
            $this->assertArrayHasKey('readme', $plugin);
            $this->assertArrayHasKey('download', $plugin);
            $this->assertArrayHasKey('remote_install', $plugin);
            $this->assertArrayHasKey('compatible_version', $plugin);
        }
    }

    public function testReadme()
    {
        foreach ($this->plugins as $plugin) {
            $readme = @file_get_contents($plugin['readme']);
            $this->assertNotEmpty($readme, 'Readme is empty for '.$plugin['title']);
        }
    }

    public function testArchives()
    {
        foreach ($this->plugins as $plugin) {
            if ($plugin['remote_install']) {
                $archive = @file_get_contents($plugin['download']);
                $this->assertNotEmpty($archive, 'Archive is empty for '.$plugin['title']);

                $filename = tempnam(sys_get_temp_dir(), 'plugin_');
                file_put_contents($filename, $archive);

                $zip = new ZipArchive();
                $this->assertTrue($zip->open($filename), 'Zip file invalid for plugin '.$plugin['title']);
                $this->assertFalse($zip->statName('__MACOSX/'), '__MACOSX file found in plugin '.$plugin['title']);
                $zip->close();

                unlink($filename);
            }
        }
    }
}
