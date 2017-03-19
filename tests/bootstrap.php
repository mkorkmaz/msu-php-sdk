<?php
declare(strict_types=1);

namespace tests;
require_once dirname(__DIR__) . '/vendor/autoload.php';
$loader = new \Composer\Autoload\ClassLoader();
$loader->add('tests', dirname(__DIR__) );
$loader->register();