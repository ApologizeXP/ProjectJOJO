<?php
session_start();
include('sever.php');
$errors = array();


$id = $_POST['id'];

if (isset($_POST['edittravel'])) {
    if (isset($_FILES['file'])) {
        echo "<pre>";
        print_r($_FILES['file']);
        echo "</pre>";

        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];


 if ($file_size > 1000000) {
            array_push($errors, "The file is too large");
            $_SESSION['error'] = "The file is too large";
        } else {
            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);

            $allowd_exs = array("jpg", "jpeg", "png");
            if (in_array($file_ex_lc, $allowd_exs)) {
                $new_file_name = $file_name;
                $file_upload_path = 'images/'. $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
            }
        }
    }

    $attraction = mysqli_real_escape_string($conn, $_POST['attraction']);
    $history = mysqli_real_escape_string($conn, $_POST['history']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

if (empty($attraction)) {
    array_push($errors, "Please enter the name of the place.");
    $_SESSION['error'] = "Please enter the name of the place.";
}

if (empty($history)) {
    array_push($errors, "Please enter the location history.");
    $_SESSION['error'] = "Please enter the location history.";
}

if (empty($address)) {
    array_push($errors, "Please enter the address of the place.");
    $_SESSION['error'] = "Please enter the address of the place.";
}
if (empty($link)) {
    array_push($errors, "Please enter link");
    $_SESSION['error'] = "Please enter link";
}



if (count($errors) == 0) {
    if ($file_size >> 0) {
        $sql = "UPDATE addloca SET file='$new_file_name',attraction='$attraction',history='$history',address='$address',link='$link' WHERE id = '$id'";
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE addloca SET attraction='$attraction',history='$history',address='$address',link='$link' WHERE id = '$id'";
        mysqli_query($conn, $sql);
    }
    header('location: index.php');
} else {
    
    header('location: editdata.php?id=' . $id . '');
}
}