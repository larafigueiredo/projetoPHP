<?php
//including the database connection file
include("config.php");

//getting id_termo of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM usuarios WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:users.php");
?>

