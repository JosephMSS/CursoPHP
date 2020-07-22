<?php
namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as v;

class  JobsController extends BaseController{
    public function getAddJobAction($request)
    {
        $responsiveMessage=null;
    //    key para los miembros de un arreglo y atribute apra los de un objeto
        if ($request->getMethod()=='POST')
        {
            $postData=$request->getParsedBody();
 
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

            try {
                //code...
                $jobValidator->assert($postData); // true) 
                $files=$request->getUploadedFiles();
                $logo=$files['logo'];
                $routeImg='';
                if($logo->getError()== UPLOAD_ERR_OK){
                    $fileName=$logo->getClientFilename();
                    $routeImg="uploads/$fileName";
                    $logo->moveTo($routeImg);
                }
                $job=new Job();
                $job->title=$postData['title'];
                $job->description=$postData['description'];
                $job->image=$routeImg;
                $job->save();
                  $responsiveMessage='Saved';
            } catch (\Throwable $th) {
                // var_dump($th->getMessage());
                $responsiveMessage=$th->getMessage();

            }
        
        }
        return  $this->renderHTML('addJob.twig',[
            'responsiveMessage'=>$responsiveMessage
        ]);

    }
}
?>