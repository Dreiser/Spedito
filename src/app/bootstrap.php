<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

$configurator->setDebugMode(true); // enable for your remote IP
$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/components.config.neon');
$configurator->addConfig(__DIR__ . '/config/facades.config.neon');
$configurator->addConfig(__DIR__ . '/config/repositories.config.neon');
$configurator->addConfig(__DIR__ . '/config/services.config.neon');
$configurator->addConfig(__DIR__ . '/config/validators.config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
