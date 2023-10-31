<?php
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	$server="localhost:3307";
	$username="root";
	$conn = new mysqli($server,$username,"");
	mysqli_select_db($conn,"cadastro");
	$resultado = mysqli_query($conn,"select * from tabela order by id_tabela");
	mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<title>Listar PHP</title>
</head>
<body>
	<?php if(mysqli_num_rows($resultado) < 1){ exit; } ?>
	<table width="500" border="1" align="center">
		<tr>
			<th>ID</th><th>Nome</th><th>Sobrenome</th><th>E-mail</th>
			<th>Sexo</th><th>Editar/Excluir</th>
		</tr>
	<?php while($linha = mysqli_fetch_array($resultado)){
		$id = $linha["id_tabela"];
		$nome = $linha["nome"];
		$sobrenome = $linha["sobrenome"];
		$email = $linha["email"];
		$sexo = $linha["sexo"];
		switch ($sexo){
			case "M":
				$sexo = "Masculino";
				break;
			case "F":
				$sexo = "Feminino";
				break;
			case "I":
				$sexo = "Indeterminado";
				break;
		}
		echo"
		<tr>
			<td>$id</td><td>$nome</td><td>$sobrenome</td><td>$email</td>
			<td>$sexo</td>
			<td><a href=\"editar.php?id=$id\">[Editar]</a>
			| <a href=\"excluir.php?id=$id\">[Excluir]</a></td>
		</tr>\n";
	}?>
	</table>
	<h3><a href="index.html">Voltar Menu</a></h3>
</body>
</html>