<?php
/*
 * Run the application
 */
namespace YourNamespace;

use YourNamespace\Console\Command;
use Skel\DependencyInjection\Application;

// the autoloader
$loader = require __DIR__ . '/vendor/autoload.php';

// create application
$application = new Application(__NAMESPACE__);

// and run
$application->run();
