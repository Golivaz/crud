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
	echo "<div class='alert alert-success' role='alert'>Salvo com Sucesso!!</div>";
?>
<h3><a href="index.html">Voltar</a></h3>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body> 
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>