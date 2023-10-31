<?php
	//Visibilidade dos erros
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	//construção da string de conexão.
	$server="localhost:3307";
	$username="root";
	$conn=new mysqli($server,$username,"");
	mysqli_select_db($conn,"cadastro");
	
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];
	$id = $_POST["id"];
	settype($id,"integer");
	
	mysqli_query($conn,"UPDATE tabela SET nome='$nome',sobrenome='$sobrenome',
	email='$email',sexo='$sexo' WHERE tabela.id_tabela='$id'");
	mysqli_close($conn);
	header("Location: listar.php");
?>
	
	