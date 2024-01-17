<?php

class SignupContr extends Signup {

    private $username;
    private $email;
    private $pwd;
    private $pwdRepeat;

    public function __construct($username, $email, $pwd, $pwdRepeat) {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function signupUser() {
       if($this->emptyInput() == false) {
        header("location: ./signup.php?error=emptyinput");
        exit();
       }

       if($this->invalidUsername() == false) {
         // echo "Invalid username!";
        header("location: ../signup.php?error=username");
        exit();
       }

       if($this->invalidEmail() == false) {
         // echo "Invalid email!";
        header("location: ../signup.php?error=email");
        exit();
       }

       if($this->pwdMatch() == false) {
         // echo "Passwords don't match!";
        header("location: ../signup.php?error=passwordmatch");
        exit();
       }

       if($this->usernameTakenCheck() == false) {
        // echo "Username or email taken!";
        header("location: ../signup.php?error=useroremailtaken");
        exit();
       }

       $this->setUser($this->username, $this->email, $this->pwd);
    }

    // check if inputs are empty
    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat)) {
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() {
        $result;
        if($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function usernameTakenCheck() {
        $result;
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }   
}