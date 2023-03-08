<?php

include "Database.php";

$student_id = $_POST['id'];

$sql = "SELECT * FROM `studentdata` where Id = $student_id";

$result = mysqli_query($conn, $sql);

$output = "";    

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
        <div class='form-group'>
        <label for='name'>Name</label>
        <input type='hidden' value='{$row["Id"]}' id='edit_id'>
        <input type='text' name='name' class='form-control' value='{$row["Name"]}' id='edit_name'>
    </div>
    <div class='form-group'>
        <label for='email'>Email</label>
        <input type='email' name='email' class='form-control' value='{$row['Email']}' id='edit_email'>
    </div>
    <div class='form-group'>
        <label for='phone'>Phone</label>
        <input type='number' name='phone' class='form-control' value='{$row["Phone"]}' id='edit_phone'>
    </div>
    <div class='form-group'>
        <label for='city'>City</label>
        <input type='text' name='city' class='form-control' value='{$row['City']}' id='edit_city'>
    </div>
    <input type='submit' value='Update Data' class='btn btn-primary' id='updateBtn'>
        ";
    }

    echo $output;
}
