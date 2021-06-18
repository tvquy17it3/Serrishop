<?php
require 'vendor/autoload.php';

class Auth extends database{
    public $error;
    public $return_url;
    public function Login($email,$pass)
    {
        $email = strip_tags($email);
        $email = addslashes($email);
        $pass = strip_tags($pass);
        $pass = addslashes($pass);
        $remember=((isset($_POST['remember'])!=0)?1:"");
        $pass=md5($pass);
        $sql= "SELECT * from users where email = '$email' and password = '$pass'";
        $this->select($sql);
        if($this->fetch()){
            $_SESSION['email'] = $email;
            $_SESSION['password']=$pass;
            return true;
        }else{
            return false;
        }
        
    }

    public function Validate_email($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }else{
            return true;
        }
    }

    public function Chechauth()
    {
        if(isset($_SESSION['email'])){
            echo("<script>location.href = 'index.php';</script>");
        }else{
            return false;
        }
    }

    public function User()
    {   
        $this->ReturnURL= base64_encode($_SERVER['REQUEST_URI']);
        if (isset($_SESSION['email']))
        { 
            $name= $_SESSION['email'];
            // $pass1=$_SESSION['password'];            
            $this->select("SELECT * FROM users where email='$name'");
            while ($user=$this->fetch()){
                $this->level   = $user->active;
                $this->name    = $user->name;
                $this->email   = $user->email;
                $this->address = $user->address;
                $this->phone   = $user->phone;
            }
            if($this->level != 1)
            {
                echo("<script>location.href = '../index.php';</script>");
            }
        }
    }

}