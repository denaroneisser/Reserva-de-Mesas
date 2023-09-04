<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
		<h2>Cadastro de Usuario.</h2>
	</div>
</div><form class="form-horizontal" action="" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Registre-se</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-4">
  <input id="textinput" name="name" type="text" placeholder="Digite seu melhor Nome" class="form-control input-md"   required="">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Usuario</label>  
  <div class="col-md-4">
  <input id="textinput" name="username" type="text" placeholder="Digite seu melhor usuario" class="form-control input-md"   required="">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Senha</label>  
  <div class="col-md-4">
  <input id="textinput" name="password" type="password" placeholder="Insira sua senha" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Confirme Senha</label>
  <div class="col-md-4">
  <input id="textinput" name="password2" type="password" placeholder="Confirme sua Senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Confirmar</button>
  </div>
</div>

</fieldset>
</form>
<?php
if(isset($_POST['username']) and isset($_POST['password2']) and isset($_POST['password'])){
	//verifica se post existe
	if($_POST['password2']==$_POST['password']){
		require("conexao.php");
		$sql = "INSERT INTO `usuario`(`nome`, `login`, `senha`, `tipo`) VALUES ('".$_POST['name']."','".$_POST['username']."','".$_POST['password']."','2')";
		$res = mysqli_query($conn,$sql);
		mysqli_close($conn);
		if($res ==true){
			echo "<div class='alert alert-success' role='alert'>
  Cadastro feito com Sucesso! <br/><a href='login.php'><button type='button' class='btn btn-dark'>Faça Login</button></a>
</div>";
		}
	}else{
		echo "<div class='alert alert-warning' role='alert'>
  Senhas não conferem!
</div>";
		
	}
	
}








?>
