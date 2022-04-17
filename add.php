<html>
<head>
	<title>Add Termo</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
session_start(); 
$id   = $_SESSION["usuario"][2];

if(isset($_POST['Submit'])) {	
	$descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);
	$termo = mysqli_real_escape_string($mysqli, $_POST['termo']);
		
	// checking empty fields
	if(empty($descricao) || empty($termo)) {
				
		if(empty($descricao)) {
			echo "<font color='red'>descricao field is empty.</font><br/>";
		}
		
		if(empty($termo)) {
			echo "<font color='red'>termo field is empty.</font><br/>";
		}
		
		//link to the previous pid_termo
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO termos (termo, descricao,id_utilizador) VALUES ('$termo', '$descricao','$id')");
		
		//display success messid_termo
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
