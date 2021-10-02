<?php
include 'sever.php';
session_start();
$errors = array();
if (isset($_POST['singup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fistname = mysqli_real_escape_string($conn, $_POST['fistname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
        $_SESSION['error'] = "Username is required";
    }
    if (empty($fistname)) {
        array_push($errors, "fistname is required");
        $_SESSION['error'] = "fistname is required";
    }
    if (empty($lastname)) {
        array_push($errors, "lastname is required");
        $_SESSION['error'] = "lastname is required";
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
        $_SESSION['error'] = "Email is required";
    }
    if (empty($birthdate)) {
        array_push($errors, "Birthdate is required");
        $_SESSION['error'] = "Birthdate is required";
    }
    if (empty($gender)) {
        array_push($errors, "Gender is required");
        $_SESSION['error'] = "Gender is required";
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
        $_SESSION['error'] = "Password is required";
    }
    if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
        $_SESSION['error'] = "The two passwords do not match";
    }
    if(count($errors) > 1){
        $_SESSION['error'] = "Enter the information correctly";
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
            $_SESSION['error'] = "Username already exists";
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
            $_SESSION['error'] = "email already exists";
        }
    }

   
    if (count($errors) == 0) {
        $password = md5($password1);

        $query = "INSERT INTO users (username,fistname,lastname,email,birthdate,gender,password,usergroup) 
  			  VALUES('$username','$fistname','$lastname','$email','$birthdate','$gender','$password','P')";
        mysqli_query($conn, $query);
        header('location: index.php');
    }else{
        
        header('location: singup.php');
    }
}