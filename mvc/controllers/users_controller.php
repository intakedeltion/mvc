<?php 
require_once 'Models/user.php';
class UserController {
    //goes registering page
    public function registreer() { 
        require_once('views/users/registreer.php'); 
    } 

    //here function have function that everthing works out what you put in rgstering inputs.
    public function registreering(){

        if(isset($_POST['authorsName']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
            if($_POST['password'] == $_POST['rePassword']){
                if(!user::DoesHeExit("email", strtolower($_POST['email']), "")){
                    if(!user::DoesHeExit("authorName", strtolower($_POST['authorsName']), "")){
                        if (strlen($_POST["password"]) >= 12 && preg_match('/[a-zA-Z]/', $_POST["password"]) && preg_match('/\d/', $_POST["password"]) && preg_match('/[^a-zA-Z\d]/', $_POST["password"])) {
                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                user::create(strtolower($_POST['authorsName']),$_POST['name'],strtolower($_POST['email']),password_hash($_POST['password'], PASSWORD_DEFAULT));
                                header('Location: ?controller=users&action=login&alert=Succes fully created uw account');
                            } else{
                                header('Location: ?controller=users&action=registreer&alert=The email is invalid');
                            }
                        } else{
                            header('Location: ?controller=users&action=registreer&alert=The password is not strong he do not have 12 char or 1 letter or 1 number or 1 special char pls make him stronger');
                        }
                    }else{
                        header('Location: ?controller=users&action=registreer&alert=The authors name already exist');
                    }
                }else{
                    header('Location: ?controller=users&action=registreer&alert=The email already has account');
                }
            } else{
                header('Location: ?controller=users&action=registreer&alert=Passwords are not the same');
            }
        } else{
            require_once('views/pages/error.php'); 
        }
    }
    //this function checks if you login if not then you go to login page else you go to profile
    public function login() { 
        $userid =$_SESSION['user_id'] ?? '';
        if(user::DoesHeExit("userid", $userid, "")){
            header('Location: ?controller=users&action=profile');
        } else{
            require_once('views/users/login.php'); 
        }
    } 
    //here is te code for if you password and email is corect
    public function dologin(){
        $result = user::canlogin(strtolower($_POST['email']), $_POST['password']);
        if($result != ''){
            $_SESSION['user_id'] = $result;
            header('Location: ?controller=users&action=profile');
        }else{
            header('Location: ?controller=users&action=login&alert1=You have the email or password wrong');
        }
    }
    //this function to logout
    public function logout(){
        session_destroy();
        header('location: ?controller=users&action=login&alert=succesfully logout');
    }
    //this function for going to you profile
    public function profile() {
        $_SESSION['user_id'];
        if(isset($_SESSION['user_id'])){
            $usergegevens = user::find($_SESSION['user_id']);
            require_once('views/users/profile.php');
        }
        else{
            require_once('views/pages/error.php'); 
        }
    }
    //this function edits you data looks if you data can
    public function edit(){
        $userid = $_SESSION['user_id'] ?? '';
        if(isset($_POST['authorsName']) && isset($_POST['name']) && isset($_POST['email']) && isset($_SESSION['user_id'])){
            if(!user::DoesHeExit("email", strtolower($_POST['email']), "AND NOT userid = $userid")){
                if(!user::DoesHeExit("authorName", strtolower($_POST['authorsName']), "AND NOT userid = $userid")){
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        user::edit(strtolower($_POST['authorsName']), $_POST['name'],strtolower($_POST['email']), $_SESSION['user_id']);
                        header('Location: ?controller=users&action=profile&alert=data are successfully edited'); 
                    } else{
                        header('Location: ?controller=users&action=profile&alert1=The email is invalid');
                    }
                }
                else{
                    header('Location: ?controller=users&action=profile&alert1=The authors name already exist');
                }
            } else{
                header('Location: ?controller=users&action=profile&alert1=The email already has account');
            }
        }else{
            require_once('views/pages/error.php'); 
        }
    }
    //this delets your account
    public function delete(){
        if(isset($_SESSION['user_id'])){
            user::delete($_SESSION['user_id']);
            session_destroy();
            header('location: ?controller=users&action=login&alert1=succesfully delete');
        }else{
            require_once('views/pages/error.php'); 
        }
    }

}
?>