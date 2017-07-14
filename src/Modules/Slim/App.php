<?php
namespace App\Modules\Slim;

use Slim\App as SlimApp;


/**
 * App
 */
class App extends SlimApp
{

  public function __construct($settings)
  {
    parent::__construct($settings);


  }

  protected function chooseFileRoutes()
  {
    $container = $this->getContainer();
    $app = $this;

    $routesFile = $container->get('settings')['routesFile'];

    $request = $container['request'];

    $path = $request->getUri()->getPath();

    foreach ($routesFile as $route => $file) {

      if (preg_match('#^'.$route.'#', $path)) {
        (function($file) use ($app,$container) {
          include $file;
        })($file);
        break;
      }
    }
  }

  public function run($silent = false)
  {
    $this->chooseFileRoutes();

    return parent::run($silent);
  }
}
