<?php
namespace App\Controllers;
use App\Models\Job;
use App\Models\Project;
class indexController{
    public function indexAction()
    {
        $jobs=Job::all();//Formas de hacer una peticion con eloquent
        $projects=Project::all();//Formas de hacer una peticion con eloquent
  $name = 'Hector Benitez';
        include '../views/index.php';
    }
}
?>