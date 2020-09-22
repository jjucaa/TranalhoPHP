
<?php

	require_once('conexao.php');

	if(isset($_POST['IDdoCliente']) && $_POST['IDdoCliente'] != ""){

		$IDdoCliente = $_POST['IDdoCliente'];
		$NomeCompleto = $_POST['NomeCompleto'];
		$Documento = $_POST['Documento'];
		$DatadeNascimento = $_POST['DatadeNascimento'];
		$Cidade = $_POST['Cidade'];
		$Estado = $_POST['Estado'];

		if($Cidade == ""){
			$sql = "insert into clientefinal (Estado, IDdoCliente, NomeCompleto, Documento, DatadeNascimento, Cidade)
				values ( '$Estado','$IDdoCliente', '$NomeCompleto', '$Documento', '$DatadeNascimento', '$Cidade')
			";
		}else{
			$sql = "update clientefinal set IDdoCliente = '$IDdoCliente', NomeCompleto = '$NomeCompleto', Documento = '$Documento', DatadeNascimento = '$DatadeNascimento', Estado = '$Estado' Cidade = '$Cidade'
					where Cidade = ".$Cidade;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $Cidade==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $Cidade!=""){
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
    <h2 align=center> clientefinal cadastrados:</h2>
    <p align=center> <a href="inserir_dados.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome">nome completo:</label></td>
        <td><label for="IDdoCliente">N do quarto:</label></td>
        <td><label for="NomeCompleto">Tipo:</label></td>        
        <td><span>Valor diaria</span></td>
        <td><label for="DatadeNascimento">DatadeNascimento:</label></td>
        <td><label for="acoes">Ações</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select Cidade, IDdoCliente, Documento, NomeCompleto, DatadeNascimento from clientefinal";
		$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['Cidade'].'</td>
				  <td>'.$dados['IDdoCliente'].'</td>
				  <td>'.$dados['NomeCompleto'].'</td>        
				  <td>'.$dados['Documento'].'</td>
				  <td>'.$dados['DatadeNascimento'].'</td>
				  <td>'.$dados['Estado'].'</td>
				  
				  <td>
					<a href="excluir.php?id='.$dados['Cidade'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['Cidade'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="inserir_dados.php">Cadastrar</a></p>
</body>
</html>