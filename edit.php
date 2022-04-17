<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id_termo = mysqli_real_escape_string($mysqli, $_POST['id_termo']);
	$descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);
	$termo = mysqli_real_escape_string($mysqli, $_POST['termo']);	
	$ativo = mysqli_real_escape_string($mysqli, $_POST['ativo']);	
	

	// checking empty fields
	if(empty($descricao) || empty($termo)) {	
			
		if(empty($descricao)) {
			echo "<font color='red'>descricao field is empty.</font><br/>";
		}
		
		if(empty($termo)) {
			echo "<font color='red'>termo field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE termos SET ativo='$ativo',descricao='$descricao',data_alteracao = now(),termo='$termo' WHERE id_termo=$id_termo");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id_termo = $_GET['id_termo'];

//selecting data associated with this particular id_termo
$result = mysqli_query($mysqli, "SELECT * FROM termos WHERE id_termo=$id_termo");

while($res = mysqli_fetch_array($result))
{
	$descricao = $res['descricao'];
	$termo = $res['termo'];
	$ativo = $res['ativo'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>descricao</td>
				<td><input type="text" name="descricao" value="<?php echo $descricao;?>"></td>
			</tr>
			<tr> 
				<td>termo</td>
				<td><input type="text" name="termo" value="<?php echo $termo;?>"></td>
			</tr>
			<tr> 
				<td>ativo</td>
				<td><input type="text" name="ativo" value="<?php echo $ativo;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_termo" value=<?php echo $_GET['id_termo'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
