
<?php

	require_once('conexao.php');

	if(isset($_POST['n_da_porta']) && $_POST['n_da_porta'] != ""){

		$n_da_porta = $_POST['n_da_porta'];
		$tp_quarto = $_POST['tp_quarto'];
		$vr_diaria = $_POST['vr_diaria'];
		$status = $_POST['status'];
		$id_do_quarto = $_POST['id_do_quarto'];

		if($id_do_quarto == ""){
			$sql = "insert into quartos (n_da_porta, tp_quarto, vr_diaria, status, id_do_quarto)
				values ('$n_da_porta', '$tp_quarto', '$vr_diaria', '$status', '$id_do_quarto', now(), '')
			";
		}else{
			$sql = "update quartos set n_da_porta = '$n_da_porta', tp_quarto = '$tp_quarto', vr_diaria = '$vr_diaria', status = '$status', id_do_quarto = '$id_do_quarto', alt_datahora = NOW()
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id_do_quarto==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $id_do_quarto!=""){
			$_GET['msg'] = 'Dados alterados com sucesso';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao inserir a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
	}
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mensagens Enviadas</title>
    <meta charset="utf-8"/>
   </head>
<body>
    <h2 align=center> Mensagens Recebidas:</h2>
    <p align=center> <a href="formulario.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome">Nome:</label></td>
        <td><label for="telefone">Telefone:</label></td>
        <td><label for="email">E-Mail:</label></td>        
        <td><span>Receber novidades?</span></td>
        <td><label for="mensagem">Mensagem:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select id_do_quarto, n_da_porta, vr_diaria, tp_quarto, status from quartos";
		$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['id_do_quarto'].'</td>
				  <td>'.$dados['n_da_porta'].'</td>
				  <td>'.$dados['tp_quarto'].'</td>        
				  <td>'.$dados['vr_diaria'].'</td>
				  <td>'.$dados['status'].'</td>
				  <td>
					<a href="excluir.php?id='.$dados['id_do_quarto'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['id_do_quarto'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="formulario.php">Cadastrar</a></p>
</body>
</html>