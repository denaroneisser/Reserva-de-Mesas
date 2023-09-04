<?php
session_start();
if(isset($_SESSION['nome'])){
	
	
}else{
	header("Location:../index.php");
}
require ("../sql/conexao.php");
$user= $_SESSION['nome'];
?>
<html>
<head><title>Administração</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<form method="GET">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Tabela:Recursos</a>
  <button type="submit" class="btn btn-primary" value='2'name='btn'>Cadastrar Mesa</button>
  <button type="submit" class="btn btn-secondary" value='0' name='btn'>Remover Mesa</button>
  <a href='sair.php'><button type="button" class="btn btn-danger" name='btn'>Sair</button></a>
</nav>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Tabela:Usuario</a>
  <a href='../sql/cadastro.php'><button type="button" class="btn btn-primary"value=''name='btn'>Criar Usuario</button></a>
  <a href='editar.php'><button type="button" class="btn btn-secondary" name='btn'>Perfil</button></a>
  <button type="submit" class="btn btn-danger"value='5'name='btn'>Remover Usuario</button>
</nav>
<nav class="navbar navbar-light bg-light">
 <a class="navbar-brand" href="#">Tabela:Tipo</a>
  <button type="submit" class="btn btn-primary"value='6'name='btn'>Cadastrar Tipo</button>
  <button type="submit" class="btn btn-secondary"value='8'name='btn'>Alterar Tipo</button>
  <button type="submit" class="btn btn-danger"value='7'name='btn'>Remover Tipo</button>
 
</nav>
<nav class="navbar navbar-light bg-light">
<a class="navbar-brand" href="#">Tabela:Reservas</a>
  <button type="submit" class="btn btn-primary"value='4'name='btn'>Cadastrar Reservas</button>
  <button type="submit" class="btn btn-secondary"value='1'name='btn'>Alterar Resevas</button>
  <button type="submit" class="btn btn-danger"value='3'name='btn'>Remover Reservas</button>


</nav>



</form>
</body>
</html>
<?php
//testando post
if(isset($_GET['btn'])){
	$_SESSION['btn']=$_GET['btn'];
}
if(isset($_SESSION['btn'])){
	//testando primeiro botao
	if($_SESSION['btn']==0){
		$sql="select * from recursos where tipo='1' ";
		$res = mysqli_query($conn,$sql);
	echo "<div class='alert alert-danger' role='alert'>
  <h3>Remover Mesa</h3>
</div>
	<div align='center'><form method='post'><select name='sel'>";
		while($linha = mysqli_fetch_array($res)){
			echo"
			<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
		}
		echo "</select><br/><br/><br/><br/>
		
		<button type='submit' name='remove'>Remover</button></form></div>";
		if(isset($_POST['remove'])){
			$sql0="delete from recursos where codigo='".$_POST['sel']."' ";
		$res0 = mysqli_query($conn,$sql0);	
		header('Refresh:1');
		}
	}
	//testando segundo botao
	if($_SESSION['btn']==2){
		echo"
<div align='center'>		
<form class='form-horizontal' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Mesa</legend>

<!-- Text input-->
<div class='form-group'>
  <label class='col-md-2 control-label' for='codigo'>Nome da Mesa</label>  
  <div class='col-md-2'>
  <input id='codigo' name='nome' type='text' placeholder='' class='form-control input-md' required=''>
    
  </div>
</div>

<!-- Text input-->
<div class='form-group'>
  <label class='col-md-2 control-label' for='tipo'>Registro</label>
  <div class='col-md-2'>
    <select id='tipo' name='registro' class='form-control'>
      <option value='simples'>Simples</option>
      <option value='individual'>Individual</option>
	   <option value='familiar'>Familiar</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class='form-group'>
  <label class='col-md-2 control-label' for='tipo'>Tipo</label>
  <div class='col-md-2'>
    <select id='tipo' name='tipo' class='form-control'>
      <option value='1'>Mesa</option>
    </select>
  </div>
</div>
</fieldset>
<button type='submit' class='btn btn-success'>Cadastrar</button>
</form></div>
		"; //final form
		if(isset($_POST['nome']) and isset($_POST['tipo']) and isset($_POST['registro'])){
		$sql2="INSERT INTO `recursos`(`nome`, `tipo`, `registro`) VALUES ('".$_POST['nome']."','".$_POST['tipo']."','".$_POST['registro']."')";
		$res2 = mysqli_query($conn,$sql2);
		}
	}
	//testando terceiro botao
	if($_SESSION['btn']==6){
				echo"
<div align='center'>		
<form class='form-horizontal' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Tipo</legend>

<!-- Text input-->
<div class='form-group'>
  <label class='col-md-2 control-label' for='codigo'>Nome</label>  
  <div class='col-md-2'>
  <input id='codigo' name='nome' type='text' placeholder='' class='form-control input-md' required=''>
    
  </div>
</div>
</fieldset>
<button type='submit' class='btn btn-success'>Cadastrar</button>
</form></div>
		"; //final form
		if(isset($_POST['nome'])){
		$sql2="INSERT INTO `tipo`(`nome`) VALUES ('".$_POST['nome']."')";
		$res2 = mysqli_query($conn,$sql2);
		}
		
		
		
		
	}
	//testando setimo botao
	if($_SESSION['btn']==7){
		$nome=$_SESSION['nome'];
		
		$sql="select * from tipo where" .$nome;
		$res = mysqli_query($conn,$sql);
	echo "<div class='alert alert-danger' role='alert'>
  <h3>Remover Mesa</h3>
</div>
	<div align='center'><form method='post'><select name='sel'>";
		while($linha = mysqli_fetch_array($res)){
			echo"
			<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
		}
		echo "</select><br/><br/><br/><br/>
		
		<button type='submit' name='remove'>Remover</button></form></div>";
		if(isset($_POST['remove'])){
			$sql0="delete from tipo where nome".$_POST['sel']."' ";
		$res0 = mysqli_query($conn,$sql0);	
		header('Refresh:0');
		}
	}
		
		
		
	}	
	//testando quinto botao
	if($_SESSION['btn']==4){
	echo"	<div align='center'>		
<form class='form-horizontal' method='post'>
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Reserva</legend>

<!-- Text input-->
<!-- Text input-->
<div class='form-group'>
  <label class='col-md-2 control-label' for='tipo'>Status</label>
  <div class='col-md-2'>
    <select id='tipo' name='status' class='form-control'>
      <option value='0'>Desocupado</option>
      <option value=''>   </option>

    </select>
  </div>
</div>
<!-- Text input-->
<div class='form-group'>
  <label class='col-md-2 control-label' for='tipo'>Mesa</label>
  <div class='col-md-2'>
    <select id='tipo' name='recurso' class='form-control'>
";

$sql34 = "select * from recursos";
$res34 = mysqli_query($conn,$sql34);
$sql2 = "select * from reservas";
$resp = mysqli_query($conn,$sql2);
while($linha2 = mysqli_fetch_array($res34)){
	while($line = mysqli_fetch_array($resp)){
		if($linha2['codigo']==$line['recurso']){
		
		}else{
			echo "<option value='".$linha2['codigo']."'>".$linha2['nome']."</option>";
		}
}
}

echo "</select>
  </div>
</div>
";
echo"<!-- Select Basic -->
</fieldset>
<button type='submit' class='btn btn-success'>Cadastrar</button>
</form></div>
		"; //final form
		
	if(isset($_POST['status']) and isset($_POST['recurso'])){	
		$recurso =$_POST['recurso'];
		$sql99="select registro from recursos where codigo='".$recurso."'";
		$res99=mysqli_query($conn,$sql99);
		$linha = mysqli_fetch_array($res99);
		if(!empty($linha['registro'])){
			$finalidade = $linha['registro'];
		$sql4="INSERT INTO `reservas`(`usuario`,`data`,`recurso`, `finalidade`, `status`) VALUES (1,'','".$_POST['recurso']."','".$finalidade."','".$_POST['status']."')";
		$res=mysqli_query($conn,$sql4);
		//header('Refresh:1');
		echo $sql4;
		session_destroy();	
		unset($line);
		unset($linha);
		}
	}	
} //final testa post
if($_SESSION['btn']==5){
		$sql="select * from usuario where tipo='2' ";
		$res = mysqli_query($conn,$sql);
	echo "<div class='alert alert-danger' role='alert'>
  <h3>Remover Usuario</h3>
</div>
	<div align='center'><form method='post'><select name='sel'>";
		while($linha = mysqli_fetch_array($res)){
			echo"
			<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
		}
		echo "</select><br/><br/><br/><br/>
		
		<button type='submit' name='remove'>Remover</button></form></div>";
		if(isset($_POST['remove'])){
			$sql0="DELETE FROM `usuario` WHERE codigo='".$_POST['sel']."' ";
		$res0 = mysqli_query($conn,$sql0);	
		header('Refresh:0');
		}
		if($_SESSION['btn']==5){
			
			
			
			
		}
	}


?>