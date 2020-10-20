<?php
    class User extends Database{
        function checkLogin($username,$password){
            $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result = $this->do_sql($sql);
            return $result->num_rows;
        }
        function checkUsername($username){
            $sql = "SELECT username FROM user WHERE username='{$username}'";
            $result = $this->do_sql($sql);
            if($result->num_rows==0)return true;
            else return false;
        }
        function createUser($username,$password){
            $sql = "INSERT INTO user(username,password) VALUE('{$username}','{$password}')";
            $this->do_sql($sql);
        }
    }
?>