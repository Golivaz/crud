<?php
	//Visibilidade dos erros
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	//construção da string de conexão.
	$server="localhost:3307";
	$username="root";
	$conn=new mysqli($server,$username,"");
	mysqli_select_db($conn,"cadastro");
	// Pegar por GET
	$id = $_GET["id"];
	settype($id,"integer");
	// Delete SQL
	mysqli_query($conn,"delete from tabela where id_tabela = $id");
	mysqli_close($conn);
	header("Location: listar.php");
?>
<h3><a href="index.html">Voltar</a></h3>