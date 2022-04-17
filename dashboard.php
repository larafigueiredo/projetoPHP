<?php
//including the database connection file
include_once("config.php");
session_start(); 
//echo $_SESSION['nome'];
//echo $_SESSION["usuario"];
echo $_SESSION["usuario"][2];
$id   = $_SESSION["usuario"][2];
$adm  = $_SESSION["usuario"][1];
$nome = $_SESSION["usuario"][0];
//echo $_SESSION['moderador'];

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id_termo DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM termos where ativo = true ORDER BY id_termo ASC"); // using mysqli_query instead

$resultadm = mysqli_query($mysqli, "SELECT * FROM termos ORDER BY id_termo ASC"); // using mysqli_query instead



//$resultpermissao = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_utilizador = {$_SESSION['id_utilizador']}");

$resultpermissao = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id = $id");

$resultpermissao2 = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id = $id");

//$resultpermissao = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_utilizador = {$_SESSION['id_utilizador']}"); // using mysqli_query instead


?>

<html>
<head>	
	<title>Homepage</title>
</head>
<header>
            <div id="content">
                <div id="user">
                    <span><?php echo $adm ? $nome." " : $nome; ?></span>
                </div>
                <span class="logo">Sistema de acesso</span>
                <div id="logout">
                    <a href="acoes/logout.php"><button>Sair</button></a>
                </div>
            </div>
        </header>

<body>
<a href="add.html">Add novos termos</a><br/><br/>

<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td></td>
		<td></td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	
	
		while($res = mysqli_fetch_array($resultpermissao2)) { 		
		
			if ($res['adm'] == '1') {
					   
				   echo "<td><a href=\"users.php\">Gerir Usuarios </a> ";
				   echo "<td><a href=\"adduser.html\">Adicionar novos Usuarios</a> ";
						   
			   
			   
			   //echo "<td><a href=\"users.php\">Users</a> ";
			}
				   
	   }
	?>
	</table>
	


	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>descricao</td>
		<td>id_termo</td>
		<td>termo</td>
		<td>ativo</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	
	
	while($res = mysqli_fetch_array($resultpermissao)) { 		
		if ($res['adm'] == '0') {
			while($res = mysqli_fetch_array($result)) { 		
				echo "<tr>";
				echo "<td>".$res['descricao']."</td>";
				echo "<td>".$res['id_termo']."</td>";
				echo "<td>".$res['termo']."</td>";	
				//echo "<td><a href=\"edit.php?id_termo=$res[id_termo]\">Edit</a> | <a href=\"delete.php?id_termo=$res[id_termo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
		 }
		 if ($res['adm'] == '1') {
			while($res = mysqli_fetch_array($resultadm)) { 		
				echo "<tr>";
				echo "<td>".$res['descricao']."</td>";
				echo "<td>".$res['id_termo']."</td>";
				echo "<td>".$res['termo']."</td>";
				echo "<td>".$res['ativo']."</td>";	
				echo "<td><a href=\"edit.php?id_termo=$res[id_termo]\">Edit</a> | <a href=\"delete.php?id_termo=$res[id_termo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
				//echo "<td><a href=\"users.php\">Users</a> ";		
			}
			
		 }
				
	}	
	?>
	</table>
</body>
</html>
