<?php 
    class Register extends Controller{
        function load(){
            if(isset($_SESSION["username"])){
                header('Location: http://localhost/Intern/MiniProject/Home');
            }
            else $this->views("layout",["page"=>"Register"]);
        }
        function signUp(){
            $err = "";
            $flag = true;
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $re_password = trim($_POST["re_password"]);
            $user = $this->models("User");
            if(strlen($username)<3 || strlen($username)>10){
                $err.= "The length of username must be in range [3,10];  ";
                $flag = false;
            }
            else if(!$user->checkUsername($username)){
                $err.= "Username existed!;  ";
                $flag = false;
            }
            if($password!=$re_password){
                $err.= "  Password does not match!";
                $flag = false;
            }
            if($flag){
                $password = password_hash($password,PASSWORD_BCRYPT);
                $user->createUser($username,$password);
                $_SESSION["username"] = $username;
                header('Location: http://localhost/Intern/MiniProject/Home');
            }
            else{
                echo '<script type = "text/javascript">
                    alert("'.$err.'");window.location ="http://localhost/Intern/MiniProject/Register"; 
                    </script>';
            }
        }
        function validateUsername(){
            $username = trim($_POST["username"]);
            if(strlen($username)<3 || strlen($username)>10){
                echo '<div class="alert alert-danger" role="alert">
                            The length of username must be in range [3,10]!
                        </div>';
            }
            else{
                $user = $this->models("User");
                if(!$user->checkUsername($username)){
                    echo '<div class="alert alert-danger" role="alert">
                                Username existed!
                            </div>';
                }
            }
        }
        function validatePassword(){
            $password = trim($_POST["password"]);
            $re_password = trim($_POST["re_password"]);
            if($password!=$re_password){
                echo '<div class="alert alert-danger" role="alert">
                                Password does not match!
                            </div>';
            }
        }
    }
?>