<?php
session_start();
include('sever.php');
$errors = array();


$id = $_POST['id'];


if (isset($_POST['edituser'])) {
    $fistname = mysqli_real_escape_string($conn, $_POST['fistname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);


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

    if (count($errors) > 1) {
        $_SESSION['error'] = "Enter the information correctly";
    }

    if (count($errors) == 0) {
        $sql = "UPDATE users SET fistname='$fistname',lastname='$lastname',email='$email',birthdate='$birthdate',gender='$gender' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        $_SESSION['fistname'] = $fistname;
        $_SESSION['lastname'] = $lastname;
        header('location: index.php');
    } else {

        header('location: edituser.php?id=' . $id . '');
    }
}
