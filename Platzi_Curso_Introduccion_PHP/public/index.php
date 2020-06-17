<?php
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//unicamente se utilizan cuando estamos desarrallando
require_once '..\vendor\autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;

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
$route=$_GET['route'] ?? '/'; //el operador ?? verifica que lla variable get exista y ademas tenga contenido, en caso de que este vacia agrega / c la variable $route
if($route=='/')
{
    require_once '../index.php';
}elseif ($route=='addJob') {
    require_once '../addJob.php';
}
