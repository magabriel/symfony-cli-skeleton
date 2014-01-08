<?php
/*
 * Build the application
 */
namespace YourNamespace;

use Skel\DependencyInjection\Application;
use Skel\Lib\Version;

// the autoloader
$loader = require __DIR__.'/vendor/autoload.php';

// create application and get the container
$app = new Application(__NAMESPACE__);
$container = $app->getContainer();

// get the version manager
$vm = new Version('app/config/build.yml');

// start
$pathsParam = $container->getParameter('paths');
$appParam = $container->getParameter('application');

$buildPath = $pathsParam['build'];
$buildTarget = $appParam['slug'].'.phar';
$output = $buildPath.$buildTarget;
echo sprintf('Building "%s" version "%s" into "%s"'."\n", $buildTarget, $vm->getVersion(), realpath($buildPath));

// remove old
@unlink($output);

// start phar creation
$phar = new \Phar($output);
$phar->startBuffering();

// the runner
$phar->addFile('run.php');

// add other paths if needed
$phar->buildFromDirectory(__DIR__, '/\/app\//');
$phar->buildFromDirectory(__DIR__, '/\/src\//');
$phar->buildFromDirectory(__DIR__, '/\/vendor\//');

// this will make the phar autoexecutable
$defaultStub = $phar->createDefaultStub('run.php');
$stub = "#!/usr/bin/env php \n" . $defaultStub;
$phar->setStub($stub);

$phar->compressFiles(\Phar::GZ);

$phar->stopBuffering();

// set execution rights
chmod($output, 0755);

// increment version

$vm->incrementVersion();

echo "Finished!!\n";
