<?php
session_start();
include('sever.php');
$errors = array();


$id = $_POST['id'];


if (isset($_POST['reset'])) {
    $password0 = mysqli_real_escape_string($conn, $_POST['password0']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($password0)) {
        array_push($errors, "Old Password is required");
        $_SESSION['error'] = "Old Password is required";
    }
    if (empty($password1)) {
        array_push($errors, "New Password is required");
        $_SESSION['error'] = "New Password is required";
    }

    if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
        $_SESSION['error'] = "The two passwords do not match";
    }

    if (count($errors) > 1) {
        $_SESSION['error'] = "Enter the information correctly";
    }

    $oldpassword = md5($password0);
    $user_check_query = "SELECT * FROM users WHERE password = '$oldpassword' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        array_push($errors, "Please enter the old password correctly.");
        $_SESSION['error'] = " Please enter the old password correctly. already exists";
    }
        
    if (count($errors) == 0) {
        $password = md5($password1);
        $sql = "UPDATE users SET password='$password' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header('location: logout.php');
    } else {

        header('location: resetpassword.php');
    }
}
