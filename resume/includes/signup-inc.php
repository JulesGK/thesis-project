<?php

// Check if the user has clicked the signip button
if(isset($_POST["submit"])) {
    // Grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    // Then we include the classes related to signup
    include_once '../classes/db-classes.php';
    include_once '../classes/signup-classes.php';
    include_once '../classes/signup-contr-classes.php';

    // Instantiate SignupContr class
    $signup = new SignupContr($username, $email, $pwd, $pwdRepeat);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going to back to front page
    header("location: ../signup.php?error=none");
}