<?php
namespace App\Controllers;
use App\Models\User;
use Respect\Validation\Validator as v;
use Laminas\Diactoros\Response\RedirectResponse;

class  AuthController extends BaseController{
   
    public function getLogin(){
        return  $this->renderHTML('login.twig');
    }
   
    public function postLogin($request)
    {
        $postData=$request->getParsedBody();
        $responsiveMessage=null;
        $user=User::where('email',$postData['email'])->first();
        if ($user) {
            if(\password_verify($postData['password'],$user->password))
            {
                $_SESSION['userId']=$user->id;
                return new RedirectResponse('admin');

                
            }
            else{
                echo 'incorrect';
                $responsiveMessage='Bad credentials';
                
            }
            echo " fount";
        }else{
            $responsiveMessage='Bad credentials';
        }
        return $this->renderHTML('login.twig',[
            'responsiveMessage'=>$responsiveMessage
            ]);
        }
        
        public function getLogout(){
            unset($_SESSION['userId']);
            return new RedirectResponse('login');
        }
        public function getProtected(){
            return new RedirectResponse('../login');
        }
    }
    ?>