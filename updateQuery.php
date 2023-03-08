<?php

include "Database.php";
$id = $_POST['stuId'];
$name = $_POST['stuName'];
$email = $_POST['stuEmail'];
$phone = $_POST['stuPhone'];
$city = $_POST['stuCity'];


$editQuery = "UPDATE `studentdata` SET `Name`='$name',`Email`='$email',`Phone`='$phone',`City`='$city' WHERE Id = $id";
if (mysqli_query($conn, $editQuery)) {
    echo 1;
}else {
    echo 0;
}
mysqli_close($conn);

?>

