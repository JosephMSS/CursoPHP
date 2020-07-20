<?php
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//unicamente se utilizan cuando estamos desarrallando
require_once '..\vendor\autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'cursophp',
  'username'  => 'root',
  'password'  => '',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
  ]);
  // Make this Capsule instance available globally via static methods... (optional)
  $capsule->setAsGlobal();
  
  // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
  $capsule->bootEloquent();
  $request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
  );
  $baseRoute='/CursoPHP/Platzi_Curso_Introduccion_PHP/';
  $routerContainer = new RouterContainer();
  $map = $routerContainer->getMap();
  $map->get('index', $baseRoute , [
    'controller'=>'App\controllers\IndexController',
    'action'=>'indexAction'

  ]);
  
  $map->get('addJobs', $baseRoute.'add/job' , [
    'controller'=>'App\controllers\JobsController',
    'action'=>'getAddJobAction'

  ]);
  $map->post('saveJobs', $baseRoute.'add/job' , [
    'controller'=>'App\controllers\JobsController',
    'action'=>'getAddJobAction'

  ]);
  $matcher = $routerContainer->getMatcher();
  $route = $matcher->match($request);

  function getDuration($months)
  {
    $msj=$months.'Months';
    
    if($months>12)
    {
      $msj=floor($months/12).'years, '.($months%12).'Months.';
  
    }if(($months%12)==0)
    {
      $msj= floor($months/12).' year';
    }
    return $msj;
  }
 
if(!$route){
  echo 'no route';
}else{
  $handlerData=$route->handler;
  $controllerName=$handlerData['controller'];
  $actionName=$handlerData['action'];
  $controller= new $controllerName;
  $response=$controller->$actionName($request);

echo $response->getBody();  // var_dump($route->handler);

  // require $route->handler;
}

  ///var_dump($route->handler);
  // var_dump($request->getUri()->getPath());
  