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
<head><title>Editar</title><meta charset="utf-8"/></head>
<body>
	<h2 align="center">Editar PHP</h2>
	<form id="form1" name="form1" method="post" action="salvar_edicao.php">
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
		<table width="440" border="1" align="center">
			<tr>
				<td width="165">Nome</td>
				<td width="380"><input name="nome" type="text" id="nome"
				value="<?php echo $dados["nome"];?>"/></td>
			</tr>
			<tr>
				<td>Sobrenome</td>
				<td><input name="sobrenome" type="text" id="sobrenome"
				value="<?php echo $dados["sobrenome"];?>"/></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input name="email" type="email" id="email"
				value="<?php echo $dados["email"];?>"/></td>
			</tr>
			<tr>
				<td>Sexo</td>
				<td><input name="sexo" type="radio" id="M" value="M"
					<?php echo $checkedM;?> />Masculino
					<input name="sexo" type="radio" id="F" value="F"
					<?php echo $checkedF;?> />Feminino
					<input name="sexo" type="radio" id="I" value="I"
					<?php echo $checkedI;?> />Indeterminado
				</td>
			</tr>
			<tr>
				<td>Ação:</td>
				<td><input type="submit" name="submit" value="Gravar" 
				style="cursor:pointer"/></td>
			</tr>
		</table>
	</form>
	<h3><a href="index.html">Voltar</a></h3>
</body>
</html>
	