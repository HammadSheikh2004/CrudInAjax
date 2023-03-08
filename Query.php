<?php
include "Database.php";
// Insert Query:
$name = $_POST['name_key'];
$email = $_POST['email_key'];
$phone = $_POST['phone_key'];
$city = $_POST['city_key'];

$sql = "INSERT INTO `studentdata`(`Name`, `Email`, `Phone`, `City`) VALUES ('$name','$email','$phone','$city')";

mysqli_query($conn, $sql);
mysqli_close($conn);
?>
