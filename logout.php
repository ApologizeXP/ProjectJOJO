<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['usergroup']);
unset($_SESSION['id']);
unset($_SESSION['fistname']);
unset($_SESSION['lastname']);
unset($_SESSION['error']);
header("location:index.php"); 
?>