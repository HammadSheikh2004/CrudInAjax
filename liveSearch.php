<?php
include "Database.php";
// Search Query:

$search_value = $_POST['search'];
$select = "SELECT * FROM `studentdata` WHERE Name LIKE '%$search_value%' OR Email LIKE '%$search_value%'";
$result = mysqli_query($conn, $select);
$recode = "";
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recode .= "<tr>
             <th scope='row'>$row[Id]</th>
             <td>$row[Name]</td>
             <td>$row[Email]</td>
             <td>$row[Phone]</td>
             <td>$row[City]</td>
             <td>
             <button class='badge badge-primary py-2 border-0 edit-btn' data-eid='{$row["Id"]}'>Edit Data</button>
             <button class='badge badge-primary py-2 border-0 delete-btn' data-id='{$row["Id"]}'>Delete Data</button>
             </td>
         </tr>";
        }
        echo $recode;
        mysqli_close($conn);
}else {
echo "<h1 class='text-center mt-4'>No Recode Found.</h1>";    
}
?>

