<?php
//including the database connection file
include("config.php");

//getting id_termo of the data from url
$id_termo = $_GET['id_termo'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM termos WHERE id_termo=$id_termo");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

