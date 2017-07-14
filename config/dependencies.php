<?php
// DIC configuration

$container = $app->getContainer();

// view
$container['view'] = function ($c) {
  $setting = $c->settings['view'];
  $loader = \Twig_Loader_Filesystem($setting['template_path']);
  $view = \Twig_Environment($loader, ['cache' => $setting['cache_path']]);
  return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
