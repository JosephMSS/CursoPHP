<?php
require_once 'vendor\autoload.php';
//En caso de que se requiera usar namespaces se debe declarar en todas las clases y posteriormente se usa el use en donde se requiere usar las clases
// Recordar que esta manera solo funciona para php 7 en adelante
// use App\Models\{Job, Project, Printable};
use App\Models\Job;
use App\Models\Project;

$jobs=Job::all();//Formas de hacer una peticion con eloquent
$projects=Project::all();//Formas de hacer una peticion con eloquent
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
function printElement($job)
{
  // if($job->getVisible()==false){
  //   return;
  // }
  echo '<li class="work-position">';
               echo '<h5>'.$job->title.'</h5>';
            echo '<p>'.$job->description.'</p>';
                
               echo '<p>'.getDuration($job->months).'</p>';

               echo '<strong>Achievements:</strong>';
               echo '<ul>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                echo'</ul>';
              echo'</li>';
}
//cuando es un archivo unicamente de php se recomienda no cerrar el bloque php
