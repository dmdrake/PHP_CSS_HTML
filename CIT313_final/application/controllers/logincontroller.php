<?php

class LoginController extends Controller{

  protected $userObject;

  public function index(){

  }

  public function do_login(){

   $this->userobject = new Users();

   $userInfo = $this->userobject->getUserFromEmail($_POST['email']);
   $login = $this->userobject->isActive($userInfo['uID']);

        if($this->userobject->checkUser($_POST['email'],$_POST['password'])) {

          if ($login['active'] == 1) {


          $_SESSION['uID'] = $userInfo['uID'];
          if(strlen($_SESSION['redirect']) > 0) {
   	        $view = $_SESSION['redirect'];
   	        unset($_SESSION['redirect']);
   	        header('Location: '.BASE_URL.$view);
          }
          else{
            header('Location: '.BASE_URL);
          }
        }
        else{
         $this->set('message', "Account is not yet approved.");
        }
      }
      else{
        $this->set('message','Wrong password/email combination.');
      }
    }

public function logout() {

    //unset the session id
        unset($_SESSION['uID']);

    // close the session
        session_write_close();

    // send to the homepage
        header('Location: '.BASE_URL);

    }

}




?>
