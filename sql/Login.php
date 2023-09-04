<?php
session_start();
if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']==1){
	header("Location:../userlog/useradmin.php");
}else{
	header("Location:../userlog/userlog.php");
}
}

?>
<html>
<head><title>Login</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Restaurante</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST">
                              <div class="form-group">
                                  <label for="username" class="control-label">Usuario</label>
                                  <input type="text" class="form-control" id="username" name="username"  required="" title="Please enter you username" placeholder="MeuMelhorUser123">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Senha</label>
                                  <input type="password" class="form-control" id="password" name="password"  required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Registre-se<span class="text-success"> Gratis</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span>Faça login e faça sua reserva.</li>
						  <li><span class="fa fa-check text-success"></span>Local VIP.</li>
						  <li><span class="fa fa-check text-success"></span>Self-Service.</li>
                          <li><span class="fa fa-check text-success"></span>Totalmente Seguro!</li>
                      </ul>
                      <p><a href="cadastro.php" class="btn btn-info btn-block">Registre-se</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
</body> 
</html> 
<?php
	if(isset($_POST['username']) and isset($_POST['password'])){
		$user = $_POST['username'];
		$senha = $_POST['password'];
		require 'conexao.php';
		$sql="select * from usuario where login='".$user."'";
		$res=mysqli_query($conn,$sql);
		$linha=mysqli_fetch_array($res);
		$_POST['username']='';
		$_POST['password']='';
		if($linha['login']==$user){
		if($linha['senha']==$senha){
			$_SESSION['user']=$user;
			$_SESSION['tipo']=$linha['tipo'];
				$_SESSION['nome']=$linha['nome'];
			if($linha['tipo']==1){
				header("Location:../userlog/useradmin.php");
			}else{
				header("Location:../userlog/userlog.php");
			}
			}else{
			echo "<div class='alert alert-warning' role='alert'>Senha incorreta!</div>";
			
			
		}
		}else{
			echo "<div class='alert alert-danger' role='alert'>Usuario incorreto!</div>";
			
		}
	}
	
?>
   