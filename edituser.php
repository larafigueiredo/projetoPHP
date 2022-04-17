<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);	
	$ativo = mysqli_real_escape_string($mysqli, $_POST['ativo']);
	
	// checking empty fields
	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE usuarios SET ativo='$ativo',email='$email',nome='$nome' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: users.php");
	
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nome = $res['nome'];
	$email = $res['email'];
	$ativo = $res['ativo'];
}
?>
<html>
<head>	
	<title>Edit user</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edituser.php">
		<table border="0">
			<tr> 
				<td>nome</td>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>ativo</td>
				<td><input type="text" name="ativo" value="<?php echo $ativo;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
