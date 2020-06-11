<?php
class Job{
    private $title;
    public $description;
    public $visible;
    public $months;
    public function __construct($title,$description,$visible,$months)
    {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setVisible($visible);
        $this->setMonths($months)   ;
    }
    public function setTitle($title)
    {
        $this->title=$title;//recordar que las propiedades de un objeto  no llevan el signo de dolar al usarlas
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setDescription($description)
    {
        $this->description=$description;//recordar que las propiedades de un objeto  no llevan el signo de dolar al usarlas
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function setVisible($visible){
        $this->visible=$visible;
    }    
    public function getVisible()
    {
        return $this->visible;
    }
    public function setMonths($months)
    {
        $this->months=$months;
    }
    public function getMonths()
    {
        return  $this->months;
    }
}
$job1=new Job();
$job1->setTitle('PHP Developer');
$job1->setDescription('This is an awesome job!!!');
$job1->setvisible(true);
$job1->setMonths(12);
$job2=new Job('Nove Dev',' ',true,18);
$jobs = [
    $job1,
    $job2
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
