<?php

class Signup extends Db {

    protected function setUser($username, $email, $pwd) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_username, users_email, users_pwd) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT users_username FROM users WHERE users_username = ? OR users_email = ?;');

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
   
}