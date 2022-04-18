<html>
<head>
	<title>Add usuario</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
//include_once("acesso.php");

if(isset($_POST['Submit'])) {	
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
	$adm = mysqli_real_escape_string($mysqli, $_POST['adm']);
		
	// checking empty fields
	if(empty($nome) || empty($email)) {
				
		if(empty($nome)) {
			echo "<font color='red'>nome field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		//link to the previous pid_email
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		$length = 16;
		$a = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
		$b = array();

		for($i = 0; $i < $length; $i++){
			$r = rand(0, (sizeof($a) - 1));
			$b[$i] = $a[$r];
		}

		$token = join("", $b);
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO usuarios (nome, email, senha, adm,token,confirmado) VALUES ('$nome', '$email', md5($senha), '$adm','$token',1)");
		
		//display success messid_email
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
