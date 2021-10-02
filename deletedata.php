<?php
session_start();
include('sever.php');
$id = $_GET['id'];
$sql = "DELETE FROM addloca  WHERE id = '$id' ";
mysqli_query($conn,$sql);
header('location: index.php');
