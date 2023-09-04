<?php
session_start();
require('conexao.php');
if(isset($_POST['senha']) and isset($_POST['senhaC'])  and isset($_POST['nome']) and isset($_POST['login'])){
	if($_POST['senha']==$_POST['senhaC']){
		$sql="UPDATE `usuario` SET `nome`='".$_POST['nome']."',`senha`='".$_POST['senha']."' WHERE login='".$_POST['login']."'";
if(mysqli_query($conn,$sql))	{
 $_SESSION['nome']= $_POST['nome'];
 $_SESSION['login']= $_POST['login'];
 $_SESSION['senha']= $_POST['senha'];
 header('Location:../index.php');
		}
	}else{
		echo"
		<div class='alert alert-danger' role='alert'>Senhas não conferem!</div>";
	}
}
?>
