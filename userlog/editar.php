<?php
session_start();

?>
<html>

<!------ Include the above in your HEAD tag ---------->

<!------ Include the above in your HEAD tag ---------->
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Editar Perfil</title>
  <link rel="icon" href="../pack/icon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style rel="stylesheet" type="text/css"> 
</style>
</head>

<body background='../Pack/background/back3.jpg'>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Editar Perfil</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
<form class="form" action="../sql/attPerfil.php" method="POST" id="registrationForm">
      <div class="text-center">
        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Editar</button>
		<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Limpar Campos</button>
      </div></hr><br>
          <ul class="list-group">
          </ul>  
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
			<h2>Editar Perfil</h2>
              </ul>   
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Login</h4></label>
                              <input type="text" class="form-control" name="login" id="first_name" placeholder="Login" value='<?php echo $_SESSION['user'] ?>' >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nome</h4></label>
                              <input type="text" class="form-control" name="nome" id="last_name" placeholder="Nome" title="Entre com seu Nome." value='<?php echo $_SESSION['nome'] ?>' required=''>
                          </div>
                      </div>
                      <div class="form-group">
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password"><h4>Senha</h4></label>
                             <input type="password" class="form-control" name="senha" id="password" placeholder="senha" title="Entre com sua Senha."  required=''>
                         
                              <label for="password"><h4>Confirmar Senha</h4></label>
                              <input type="password" class="form-control" name="senhaC" id="password" placeholder="senha" title="Entre com sua Senha."  required=''>
                          </div>
                      </div>
    </form>	
</html>             