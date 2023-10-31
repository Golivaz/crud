<?php
	//Visibilidade dos erros
	@ini_set('display_errors','1');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
	//construção da string de conexão.
	$server="localhost:3307";
	$username="root";
	$conn=new mysqli($server,$username,"");
	mysqli_select_db($conn,"cadastro");
	$id = $_GET["id"];
	settype($id,"integer");
	$resultado = mysqli_query($conn,"select * from tabela where id_tabela=$id");
	$dados = mysqli_fetch_array($resultado);
	switch($dados["sexo"]){
		case $dados["sexo"]="M":
			$checkedM="checked=\"checked\"";
			$checkedF="";
			$checkedI="";
			break;
		case $dados["sexo"]="F":
			$checkedM="";
			$checkedF="checked=\"checked\"";
			$checkedI="";
			break;
		case $dados["sexo"]="I":
			$checkedM="";
			$checkedF="";
			$checkedI="checked=\"checked\"";
			break;
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<head><title>Editar</title><meta charset="utf-8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="container">
        <h2 class="text-center">Editar PHP</h2>
        <form id="form1" name="form1" method="post" action="salvar_edicao.php">
            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
            <table class="table table-bordered mx-auto" style="max-width: 440px;">
                <tbody>
                    <tr>
                        <td style="width: 165px;">Nome</td>
                        <td><input name="nome" type="text" id="nome" value="<?php echo $dados["nome"];?>"></td>
                    </tr>
                    <tr>
                        <td>Sobrenome</td>
                        <td><input name="sobrenome" type="text" id="sobrenome" value="<?php echo $dados["sobrenome"];?>"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input name="email" type="email" id="email" value="<?php echo $dados["email"];?>"></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="M" value="M" <?php echo $checkedM;?>>
                                <label class="form-check-label" for="M">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="F" value="F" <?php echo $checkedF;?>>
                                <label class="form-check-label" for="F">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="I" value="I" <?php echo $checkedI;?>>
                                <label class="form-check-label" for="I">Indeterminado</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ação:</td>
                        <td><input type="submit" name="submit" value="Gravar" class="btn btn-primary" style="cursor:pointer"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<h3><a href="index.html">Voltar</a></h3>
</body>
</html>
	