<?php
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];
	// DAO
	$server = "localhost:3307";
	$username = "root";
	$conn = new mysqli($server, $username, "");
	mysqli_select_db($conn, "cadastro");
	mysqli_query($conn,"INSERT INTO tabela(id_tabela, nome, sobrenome, email, sexo)
	VALUES (NULL, '$nome','$sobrenome','$email','$sexo')");
	mysqli_close($conn);
	echo "Salvo com Sucesso <br></br>";
?>
<br><a href="index.html">voltar...</a></br>