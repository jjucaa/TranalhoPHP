<?php

require_once('conexao.php');

$IDdoCliente = '';
$NomeCompleto = '';
$Documento = '';
$DatadeNascimento = '';
$Cidade = '';
$Estado = '';



if(isset($_GET['IDdoCliente']) && $_GET['IDdoCliente'] != ""){
	$sql = "select * from clientefinal where id = " . $_GET['IDdoCliente'];
    $resultado = mysqli_query($conexao, $sql);
	if($resultado){
		$dados = mysqli_fetch_array($resultado);
		$IDdoCliente = $dados['IDdoCliente'];
		$NomeCompleto = $dados ['NomeCompleto'];
		$Documento = $dados['Documento'];
		$DatadeNascimento = $dados['DatadeNascimento'];
		$Cidade = $dados['Cidade'];
		$Estado = $dados ['Estado'];
		
	}
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Formulário HTML</title>
	<meta charset="utf-8"/>
</head>
<body background-color = "gray">
	<div width=60% align=center>
		<form class="formulario" method="post" action="mensagens.php" align=left> 
			<p> cadastre um preenchendo o formulário abaixo</p>

			<input type="hidden" name="IDdoCliente" value="<?php echo $IDdoCliente; ?>">

			<div class="field">
				<label for="NomeCompleto">NomeCompleto</label>
				<input type="varchar" id="NomeCompleto" name="NomeCompleto" value="<?php echo $NomeCompleto; ?>" placeholder="Nome Completo*" required>
			</div>

			<div class="field">
				<label for="Documento">rg ou cpf:</label>
				<input type="int" id="Documento" name="Documento" value="<?php echo $Documento; ?>" placeholder="rg ou cpf sem caracteres">
			</div>

			<div class="field">
				<label for="DatadeNascimento">Data de Nascimento:</label>
				<input type="int" id="DatadeNascimento" name="DatadeNascimento" value="<?php echo $DatadeNascimento; ?>" placeholder="data de Nascimentose /*" required>
			</div>        

			<div class="field">
				<label for="Cidade">cidade:</label>
				<input type="varchar" id="Cidade" name="Cidade" value="<?php echo $Cidade; ?>" placeholder="cidade do ser*" required>
			</div> 

			<div class="field">
				<label for="Estado">estado:</label>
				<input type="varchar" id="Estado" name="Estado" value="<?php echo $Estado; ?>" placeholder="estado do ser (estado UF)*" required>
			</div>

			<input type="submit" name="mensagens.php" value="Enviar">
		</form>
	</div>
</body>
</html>