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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<meta charset="utf-8"/>
	<title>Listar PHP</title>
</head>
<body>
	<?php if(mysqli_num_rows($resultado) < 1){ exit; } ?>
	<div class="container">
    <h2 class="text-center">Sistema de Cadastro do Mvataide</h2>
    <table class="table table-bordered mx-auto" style="max-width: 500px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Editar/Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while($linha = mysqli_fetch_array($resultado)) {
                $id = $linha["id_tabela"];
                $nome = $linha["nome"];
                $sobrenome = $linha["sobrenome"];
                $email = $linha["email"];
                $sexo = $linha["sexo"];
                switch ($sexo) {
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
                echo "
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$sobrenome</td>
                    <td>$email</td>
                    <td>$sexo</td>
                    <td>
                        <a href=\"editar.php?id=$id\" class=\"btn btn-primary\">Editar</a>
                        <a href=\"excluir.php?id=$id\" class=\"btn btn-danger\">Excluir</a>
                    </td>
                </tr>\n";
            } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<h3><a href="index.html">Voltar Menu</a></h3>
</body>
</html>