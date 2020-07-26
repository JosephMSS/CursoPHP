<?php
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//unicamente se utilizan cuando estamos desarrallando
require_once '..\vendor\autoload.php';
session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

// echo $_ENV['DB_HOST'];
// die;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => $_ENV['DB_HOST'],
  'database'  => $_ENV['DB_NAME'],
  'username'  => $_ENV['DB_USER'],
  'password'  => $_ENV['DB_PASS'],
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
    'action'=>'getAddJobAction',
    'auth'=>true

  ]);
  $map->post('saveJobs', $baseRoute.'add/job' , [
    'controller'=>'App\controllers\JobsController',
    'action'=>'getAddJobAction'

  ]);
  // Seccion de users
  $map->get('addUsers', $baseRoute.'add/user' , [
    'controller'=>'App\controllers\UserController',
    'action'=>'getAddUserAction',
    'auth'=>true

  ]);
  $map->post('saveUsers', $baseRoute.'add/user' , [
    'controller'=>'App\controllers\UserController',
    'action'=>'getAddUserAction'

  ]);

  $map->get('loginForm', $baseRoute.'login' , [
    'controller'=>'App\controllers\AuthController',
    'action'=>'getLogin'

  ]);
  $map->post('login', $baseRoute.'auth' , [
    'controller'=>'App\controllers\AuthController',
    'action'=>'postLogin'

  ]);
  $map->get('admin', $baseRoute.'admin' , [
    'controller'=>'App\controllers\AdminController',
    'action'=>'getIndex',
    'auth'=>true

  ]);
  $map->get('logout', $baseRoute.'logout' , [
    'controller'=>'App\controllers\AuthController',
    'action'=>'getLogout'
    // 'auth'=>true

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
  $needsAuth=$handlerData['auth'] ?? false;
  $sessionUserId=$_SESSION['userId'] ?? null;
  if( $needsAuth && !$sessionUserId  )
  {
    $controllerName='App\controllers\AuthController';
    $actionName='getProtected';
  }
  $controller= new $controllerName;
  $response=$controller->$actionName($request);
  var_dump($needsAuth, !$sessionUserId);

  foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
      header(sprintf('%s: %s',$name,$value),false);
    }
  }
  http_response_code($response->getStatusCode());
  echo $response->getBody();  
}

  