<?php
namespace App\Controllers;
use App\Models\Job;
class  JobsController{
    public function getAddJobAction($request)
    {
        // var_dump($request->getMethod(),"<hr>");
        // var_dump((string)$request->getBody(),"<hr>");
        // var_dump((string)$request->getParsedBody(),"<hr>");
        if ($request->getMethod()=='POST')
        {
            $postData=$request->getParsedBody();
            $job=new Job();
            $job->title=$postData['title'];
            $job->description=$postData['description'];
            $job->save();
        }
        include '../views/addJob.php';

    }
}
?>