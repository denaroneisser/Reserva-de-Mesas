<?php
require ('../sql/conexao.php');
if(!isset($_POST['bnt'])){
	//$tipor=$_POST['bnt'];
	$tipor= 'simples';
	echo $tipor;
}
session_start();
if(isset($_SESSION['nome'])){
	
	
}else{
	header("Location:../index.php");
}
?>
<html>
<head><title>Reservas</title>
<link rel="stylesheet" href="style2.css" type="text/css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



</head>
<body>

<div class="container">
	<div class="row">
	    
	 <header>
	    
    <nav class="navbar navbar-expand-lg navbar-light text-light py-3 main-nav">
          <div class="container">
            <a class="navbar-brand" href="index.html"></a></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse " id="navbarSupportedContent">
             <div class="row">
      
   
    
	</div>      </div>
	 <ul class="ds-btn">
     <li>
         <a class="btn btn-lg btn-info " href="sair.php">
         <i class="glyphicon glyphicon-dashboard pull-left"></i><span>Sair<br></span></a> 
            
        </li>
        <li>
         <a class="btn btn-lg btn-success " href="#">
         <i class="glyphicon glyphicon-dashboard pull-left"></i><span>ORDERS<br></span></a> 
            
        </li>
        <li>
         <a class="btn btn-lg btn-success " href="#">
         <i class="glyphicon glyphicon-dashboard pull-left"></i><span>TABLES<br></span></a> 
            
        </li>
        
         
        
    </ul>
          </div>
          
        </nav>
    </header></div></div>
<br/><br/><br/><br/><br/><br/>
<?php
echo"
<h3>Selecione uma data.</h3>
<form method='POST' action=''>
<input type='date' name='data' required=''>
<button type='submit' class='btn btn-lg btn-secondary  btn-custom' name='bnt2'>Pesquisar</button>
</form>
<div class='row col-md-12'>
";
if(isset($_POST['data']) and isset($tipor)){
	$data=$_POST['data'];
$sql="SELECT reservas.codigo,reservas.usuario,reservas.recurso,reservas.finalidade,reservas.status,recursos.nome FROM `reservas` inner  join  recursos on reservas.recurso=recursos.codigo where  finalidade='".$tipor."' and data='".$data."'";	
	$res= mysqli_query($conn,$sql);
	echo "<h1>Reserve uma mesa</h1>";
	if(mysqli_num_rows($res)>0){
	while($linha= mysqli_fetch_array($res)){
		if($linha['status']==0){
		echo "
		<div class='col-md-1'></div>
       <div class='col-md-2 bgwhite'>
        <div class='smalldiv col-md-6'>".$linha['nome']."</div>
		<div class='cndtion'><b><form method='post'><button name='btn' value='".$linha['codigo']."' class='btn btn-danger'>Reservar</button></form></b></div>
        </div>
		";}else{
		echo "	
		<div class='col-md-1'></div>
			<div class='col-md-2 bgwhite'>
        <div class='smalldiv2 col-md-6'>".$linha['nome']."</div>
        
        <div class='cndtion'><b><u>Ocupado</u></b> <small> </small></div>
        </div>	
			";
		}
	}//final while
	}else{
		$sqlt="SELECT reservas.codigo,reservas.usuario,reservas.recurso,reservas.finalidade,reservas.status,recursos.nome FROM `reservas` inner  join  recursos on reservas.recurso=recursos.codigo where  finalidade='".$tipor."'";	
	$rest= mysqli_query($conn,$sqlt);
		while($linha= mysqli_fetch_array($rest)){
		if($linha['status']==0){
		echo "
		<div class='col-md-1'></div>
       <div class='col-md-2 bgwhite'>
        <div class='smalldiv col-md-6'>".$linha['nome']."</div>
		<div class='cndtion'><b><form method='post'><button name='btn' value='".$linha['codigo']."' class='btn btn-danger'>Reservar</button></form></b></div>
        </div>
		";}else{
		echo "	
		<div class='col-md-1'></div>
			<div class='col-md-2 bgwhite'>
        <div class='smalldiv2 col-md-6'>".$linha['nome']."</div>
        
        <div class='cndtion'><b><u>Ocupado</u></b> <small> </small></div>
        </div>	
			";
		}
	}	
	}
}
if(isset($_POST['btn'])){
	$sql="UPDATE `reservas` SET data='".$data."',status=1 WHERE  codigo='".$_POST['btn']."'";
	if(mysqli_query($conn,$sql)){
		echo 'da f5';
	}
}
echo"</div>";

?>
</body>


</html>
