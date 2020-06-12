<?php
require_once 'app\Models\Job.php';
require_once 'app\Models\Project.php';
$job1=new Job('PHP Developer','This is an awesome job!!!'/*,true,12*/);
// $job1->setTitle('PHP Developer');
// $job1->setDescription('This is an awesome job!!!');
$job1->setvisible(true);
$job1->setMonths(12);
$job2=new Job('Nove Dev',' '/*,true,18*/);
$job2->setvisible(true);
$job2->setMonths(18);
$project1=new Project('Proyect 1','Decription1');
$project1->setvisible(true);
$jobs = [
    $job1,
    $job2
];
$projects=[
  $project1
];
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
  if($job->getVisible()==false){
    return;
  }
  echo '<li class="work-position">';
               echo '<h5>'.$job->getTitle().'</h5>';
            echo '<p>'.$job->getDescription().'</p>';
                
               echo '<p>'.getDuration($job->getMonths()).'</p>';

               echo '<strong>Achievements:</strong>';
               echo '<ul>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
                echo'</ul>';
              echo'</li>';
}
//cuando es un archivo unicamente de php se recomienda no cerrar el bloque php
