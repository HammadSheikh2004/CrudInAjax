<?php
include "Database.php";

$stu_Id = $_POST['id'];

$deleteQuery = "DELETE FROM `studentdata` WHERE Id = $stu_Id";

if (mysqli_query($conn, $deleteQuery)) {
    echo 1;
} else {
    echo 0;
}
