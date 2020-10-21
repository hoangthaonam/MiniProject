<?php
    class User extends Database{
        function checkLogin($username,$password){
            $sql = "SELECT username, password FROM user WHERE username='$username'";
            $result = $this->do_sql($sql);
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return password_verify($password,$row["password"]);
            } else return false;
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