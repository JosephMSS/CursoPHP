<?php
require_once 'vendor\autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

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
if(!empty($_POST))//verificacion para que post no se accione si esta vacio
{
    $project=new Project();
    $project->title=$_POST["title"];
    $project->description=$_POST["description"];
    $project->save();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProject</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>AddProject</h1>
    <form action="addProject.php" method='POST'>
    <label for="title">Title</label>
    <input type="text" name='title' id='title'>
    <br>
    <label for="description">Description</label>
    <input type="text" name='description' id='description'>
    <br>
    
    <input type="submit" value="Save">
    </form>
</body>
</html>