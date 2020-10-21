<?php
    class Login extends Controller{
        function load(){
            if(isset($_SESSION["username"])){
                header('Location: http://localhost/Intern/MiniProject/Home');
            }
            else $this->views('layout',["page"=>"Login"]);
        }
        function verify(){
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $user = $this->models("User");
                if($user->checkLogin($username,$password)){
                    $_SESSION["username"] = $username;
                    if($_POST["remember"]){
                        setcookie("username",$username,time()+1800);
                        setcookie("password",$password,time()+1800);
                    }
                    header('Location: http://localhost/Intern/MiniProject/Home');
                }
                else {
                    echo '<script type = "text/javascript">
                    alert("Incorrect username or passworld");window.location ="http://localhost/Intern/MiniProject/Login"; 
                    </script>';
                }
            }
        }
        function validateLogin(){
            $username = $_POST["username"];
            if(strlen($username) <3 || strlen($username)>10){
                echo '<div class="alert alert-danger" role="alert">
                        The length of username must be in range [3,10]
                    </div>';
            }
        }
        function logout()
        {
            unset($_SESSION["username"]);
            header('Location: http://localhost/Intern/MiniProject/Login');
        }
    }
?>