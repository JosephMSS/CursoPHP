<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;

class  UserController extends BaseController{
    public function getAddUserAction($request)
    {
        $responsiveMessage=null;
    //    key para los miembros de un arreglo y atribute apra los de un objeto
        if ($request->getMethod()=='POST')
        {
            $postData=$request->getParsedBody();
 
            $userValidator = v::key('email', v::stringType()->notEmpty())
                  ->key('password', v::stringType()->notEmpty());
            var_dump($postData['password'],password_hash($postData['password'],PASSWORD_DEFAULT));
            var_dump(password_verify($postData['password'],password_hash($postData['password'],PASSWORD_DEFAULT)));
            try {
                //code...
                $userValidator->assert($postData); // true) 
                $user=new User();
                $user->email=$postData['email'];
                $user->password=password_hash($postData['password'],PASSWORD_DEFAULT);
                $user->save();
                  $responsiveMessage='Saved';
            } catch (\Throwable $th) {
                // var_dump($th->getMessage());
                $responsiveMessage=$th->getMessage();
            }
        
        }
        return  $this->renderHTML('addUsers.twig',[
            'responsiveMessage'=>$responsiveMessage
        ]);

    }
}
?>