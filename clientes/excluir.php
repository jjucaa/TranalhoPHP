<?php

	require_once('conexao.php');
	
	$id_do_quato = $_GET['id_do_quato'];
	
	if($id_do_quato != ""){
		
		$sql = "delete from quartos where id_do_quato = ".$id_do_quato;
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$msg = "Dados excluidos com sucesso!";
		}
		echo "<script>window.location.href='mensagens.php?msg=$msg';</script>";
		
	}
	
?>