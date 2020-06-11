<?php
class Job{
    private $title;
    public $description;
    public $visible;
    public $months;

    public function setTitle($var_T)
    {
        $this->title=$var_T;//recordar que las propiedades de un objeto  no llevan el signo de dolar al usarlas
    }
    public function getTitle()
    {
        return $this->title;
    }
    
}
// $job1=new Job();
// $job1->title=;
// $job1->description=;
// $job1->visible=;
// $job1->months=;
$job1=new Job();
$job1->setTitle('PHP Developer');
$job1->description='This is an awesome job!!!';
$job1->visible=true;
$job1->months=12;
$jobs = [
    $job1
//     [
//         'title' => 'PHP Developer',
//     'description' => 'This is an awesome job!!!' ,
//     'visible'=>true,
//     'months'=>12
    
//   ],
//   [
//       'title' => 'Python Dev',
//     'visible'=>true,
//     'months'=>18

//   ],
//   [
//       'title' => 'Devops',
//     'visible'=>true,
//     'months'=>24
//   ],
//   [
//       'title' => 'Node Devs',
//     'visible'=>true,
//     'months'=>1
//   ],
//   [
//       'title' => 'Frontend Dev',
//     'visible'=>true,
//     'months'=>2
//   ]
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
function printJob($job)
{
  if($job->visible==false){
    return;
  }
  echo '<li class="work-position">';
               echo '<h5>'.$job->getTitle().'</h5>';
               if(isset($job->description))
               {
                 echo '<p>'.$job->description.'</p>';
                }
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
