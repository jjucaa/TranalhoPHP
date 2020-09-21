<?php

require_once('conexao.php');

$n_da_porta = '';
$tp_quarto = '';
$vr_diaria = '';
$status = '';
$id_do_quarto = '';

if(isset($_GET['id']) && $_GET['id'] != ""){
	$sql = "select * from quartos where id = " . $_GET['id'];
    $resultado = mysqli_query($conexao, $sql);
	if($resultado){
		$dados = mysqli_fetch_array($resultado);
		$n_da_porta = $dados['n_da_porta'];
		$tp_quarto = $dados['tp_quarto'];
		$vr_diaria = $dados['vr_diaria'];
		$status = $dados['status'];
		$status = $dados ['id_do_quarto'];
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

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div class="field">
				<label for="n_da_porta">numero do quarto</label>
				<input type="int" id="n_da_porta" name="n_da_porta" value="<?php echo $n_da_porta; ?>" placeholder="digite o numero da porta*" required>
			</div>

			<div class="field">
				<label for="tp_quarto">tipo do quarto:</label>
				<input type="int" id="pq" name="tp_quarto" value="<?php echo $tp_quarto; ?>" placeholder="numero do tipo de quarto">
			</div>

			<div class="field">
				<label for="vr_diaria">Valor da diaria:</label>
				<input type="float" id="vr_diaria" name="vr_diaria" value="<?php echo $vr_diaria; ?>" placeholder="valor da diaria*" required>
			</div>        

			<div class="field">
				<label for="status">Valor da diaria:</label>
				<input type="int" id="status" name="status" value="<?php echo $status; ?>" placeholder="0 vago e 1 ocupado*" required>
			</div> 

			<input type="submit" name="quartos" value="Enviar">
		</form>
	</div>
</body>
</html>