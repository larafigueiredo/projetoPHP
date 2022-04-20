<?php
//including the database connection file
include_once("config.php");
session_start(); 
//echo $_SESSION['nome'];
//echo $_SESSION["usuario"];
$_SESSION["usuario"][2];
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
.floatl  {
  float: left;
}
</style>
            <div id="content">
			<div id="logout" class="floatr">
                    <a href="acoes/logout.php"><button type="button" class="btn btn-danger">Sair</button></a>
                </div>
            <h3>Sistema de acesso</h3>
					<div id="user">
			<div><span class="bold">ID: </span><?php echo $_SESSION["usuario"][2]; ?><div>
			<div><span class="bold">Name: </span><?php echo $adm ? $nome." " : $nome; ?><div>
                </div>
				</br>   
                
            </div>
        </header>

<body>

<table>

	<tr>
		<td class='w-25'><a href="add.html"><button type="button" class="btn btn-success">Add novos termos</button></a></td>
		<td class='w-25'></td>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	
	
		while($res = mysqli_fetch_array($resultpermissao2)) { 		
		
			if ($res['adm'] == '1') {
					   
				   
				   echo "<td class='w-25'><a href=\"users.php\"><button type='button' class='btn btn-secondary'><i class='glyphicon glyphicon-user'></i>  Gerir Usuarios</button></a></td>";
				   echo "<td class='w-25'><a href=\"adduser.html\"><button type='button' class='btn btn-secondary'><i class='glyphicon glyphicon-plus-sign'></i>  Adicionar novos usuarios</button></a></td>";
				   					   
			   
			   
			   //echo "<td><a href=\"users.php\">Users</a> ";
			}
				   
	   }
	?>
	</td>
	</tr>
	</table>
	</br>

	<table class="table table-bordered table-striped" >
  	<thead>
    <tr>
      <th scope="col" class="text-center">ID Term</th>
      <th scope="col" class="text-center">Term</th>
	  <th scope="col" class="text-center">Description</th>
      <th scope="col" class="text-center">Active</th>
	  <th scope="col" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	
	
	while($res = mysqli_fetch_array($resultpermissao)) { 		
		if ($res['adm'] == '0') {
			while($res = mysqli_fetch_array($result)) { 		
				echo "<tr>";
				echo "<td class='align-middle'>".$res['id_termo']."</td>";
				echo "<td class='align-middle'>".$res['termo']."</td>";	
				echo "<td class='align-middle'>".$res['descricao']."</td>";
				echo "<td></td>";
				echo "<td></td>";
				//echo "<td><a href=\"edit.php?id_termo=$res[id_termo]\">Edit</a> | <a href=\"delete.php?id_termo=$res[id_termo]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}
		 }
		 elseif ($res['adm'] == '1') {
			while($res = mysqli_fetch_array($resultadm)) { 		
				echo "<tr>";
				echo "<td class='align-middle'>".$res['id_termo']."</td>";
				echo "<td class='align-middle'>".$res['termo']."</td>";
				echo "<td class='align-middle'>".$res['descricao']."</td>";
				echo "<td class='text-center align-middle'>".$res['ativo']."</td>";	
				echo "<td class='text-center align-middle'><a href=\"edit.php?id_termo=$res[id_termo]\"><button type='button' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-edit'></i>  Edit</button></a> &nbsp;  <a href=\"delete.php?id_termo=$res[id_termo]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button type='button' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i>   Delete</button></a></td>";
				

				//echo "<td><a href=\"users.php\">Users</a> ";		
			}
			
		 }
				
	}	
	?>
  </tbody>
</table>

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
