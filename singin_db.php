<?php
include 'sever.php';
session_start();
$errors = array();
if (isset($_POST['singin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
        $_SESSION['error'] = "Username is required";
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
        $_SESSION['error'] = "Password is required";
    }
    if (count($errors) > 1) {
        $_SESSION['error'] = "Enter the information correctly";
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['usergroup'] = $user['usergroup'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['fistname'] = $user['fistname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['username'] = $username;
            header('location: index.php');
        }else{
            $_SESSION['error'] = "Enter the information correctly";
            header('location: singin.php');
        }
    }else {
        header('location: singin.php');
    }
}
