<html>
<head>
	<title>Add Termo</title>
</head>

<body>

<style>
html, body {
	margin: 5px;
	padding: 5px;
	border: 0;
	font-size: 100%;
}

.bold{font-weight:bold;}

.floatr  {
  float: right;
}
</style>

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
			echo "<div class='alert alert-danger w-50 p-3' role='alert'>Descricao field is empty.</div>";
		}
		
		if(empty($termo)) {
			echo "<div class='alert alert-danger w-50 p-3' role='alert'>Termo field is empty.</div>";
		}
		
		//link to the previous pid_termo
		echo "</br><a href='javascript:self.history.back();'><button type='button' class='btn btn-secondary'><i class='glyphicon glyphicon-chevron-left'></i>  Go back</button></a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO termos (termo, descricao,id_utilizador) VALUES ('$termo', '$descricao','$id')");
		
		//display success messid_termo
		echo "<a href='index.php'><button type='button' class='btn btn-secondary'><i class='fa fa-home'></i>  Home</button></a></br></br>";
		echo "<div class='alert alert-success w-50 p-3' role='alert'>Data added successfully.</div>";
		
	}
}
?>
 <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</body>
</html>
