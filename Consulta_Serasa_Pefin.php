<?php	
	require_once 'sws_extensao.php';
	require_once 'sws_serasa_pefin.php';
	
	$credenciais        = new Credenciais();
	$credenciais->Email = 'seu email aqui';
	$credenciais->Senha = 'sua senha aqui';
	
	$pefin                = new Pefin();
	$pefin->Credenciais   = $credenciais;
	$pefin->Documento     = '00000000191';
	
	$serasa = new SERASA();
	$pefin = $serasa->getSerasaPefin($pefin);
	
	echo "<pre>";
	echo "-----------------------   INFORMACOES GERAIS   -----------------------\n";
	echo 'Documento:         ' . $pefin->Documento . "\n";
	echo 'Nome:              ' . $pefin->Nome . "\n";
	echo 'NomeMae:           ' . $pefin->NomeMae . "\n";
	echo 'Data Nascimento:   ' . $pefin->DataNascimento . "\n";
	echo 'Total Ocorrencias: ' . $pefin->TotalOcorrencias . "\n";
	echo 'Mensagem:          ' . $pefin->Mensagem . "\n";
	echo 'Status:            ' . $pefin->Status . "\n";
	
	echo "\n\n\n";
	echo "----------------------------------------------------------------------\n";
	echo "Alerta Documentos\n";
	echo "----------------------------------------------------------------------\n";
	foreach ($pefin->AlertaDocumentos as $AlertaDocumentos)
	{
		echo 'Mensagem  : ' . $AlertaDocumentos->Mensagem . "\n";
		echo 'DDD/Fone 1: ' . $AlertaDocumentos->DDD1 . "-" . $AlertaDocumentos->Fone1 . "\n";
		echo 'DDD/Fone 2: ' . $AlertaDocumentos->DDD2 . "-" . $AlertaDocumentos->Fone2 . "\n";
		echo 'DDD/Fone 3: ' . $AlertaDocumentos->DDD3 . "-" . $AlertaDocumentos->Fone3 . "\n";
	}
	
	echo "\n\n\n";
	echo "----------------------------------------------------------------------\n";
	echo "Pendencias Financeiras\n";
	echo "----------------------------------------------------------------------\n";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>Data Ocorrencia</td>";
	echo "<td>Modalidade</td>";
	echo "<td>Avalista</td>";
	echo "<td>Valor</td>";
	echo "<td>Contrato</td>";
	echo "<td>Sigla</td>";
	echo "</tr>";
	foreach ($pefin->PendenciasFinanceiras as $PendenciasFinanceiras)
	{
		echo '<tr>';
		echo '<td>' . $PendenciasFinanceiras->DataOcorrencia . '</td>';
		echo '<td>' . $PendenciasFinanceiras->Modalidade . '</td>';
		echo '<td>' . $PendenciasFinanceiras->Avalista . '</td>';
		echo '<td>' . $PendenciasFinanceiras->Valor . '</td>';
		echo '<td>' . $PendenciasFinanceiras->Contrato . '</td>';
		echo '<td>' . $PendenciasFinanceiras->Sigla . '</td>';
		echo '</tr>';
	}
	echo "</table>";

	echo "\n\n\n";
	echo "----------------------------------------------------------------------\n";
	echo "Pendencias Varejo\n";
	echo "----------------------------------------------------------------------\n";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>CodigoCompensacaoBanco</td>";
	echo "<td>NumeroAgencia</td>";
	echo "<td>OrigemOcorrencia</td>";
	echo "<td>Sigla</td>";
	echo "<td>NumeroLojaFilial</td>";
	echo "</tr>";
	foreach ($pefin->PendenciasVarejo as $PendenciasVarejo)
	{
		echo '<tr>';
		echo '<td>' . $PendenciasVarejo->CodigoCompensacaoBanco . '</td>';
		echo '<td>' . $PendenciasVarejo->NumeroAgencia . '</td>';
		echo '<td>' . $PendenciasVarejo->OrigemOcorrencia . '</td>';
		echo '<td>' . $PendenciasVarejo->Sigla . '</td>';
		echo '<td>' . $PendenciasVarejo->NumeroLojaFilial . '</td>';
		echo '</tr>';
	}
	echo "</table>";

	echo "\n\n\n";
	echo "----------------------------------------------------------------------\n";
	echo "Pendencias Bacen/CCF\n";
	echo "----------------------------------------------------------------------\n";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>TotalChequesSemFundo</td>";
	echo "<td>DataOcorrenciaAntiga</td>";
	echo "<td>DataOcorrenciaRecente</td>";
	echo "<td>CodigoCompensacao</td>";
	echo "<td>NumeroAgencia</td>";
	echo "<td>NomeFantasiaBanco</td>";
	echo "</tr>";
	foreach ($pefin->PendenciasBacen as $PendenciasBacen)
	{
		echo '<tr>';
		echo '<td>' . $PendenciasBacen->TotalChequesSemFundo . '</td>';
		echo '<td>' . $PendenciasBacen->DataOcorrenciaAntiga . '</td>';
		echo '<td>' . $PendenciasBacen->DataOcorrenciaRecente . '</td>';
		echo '<td>' . $PendenciasBacen->CodigoCompensacao . '</td>';
		echo '<td>' . $PendenciasBacen->NumeroAgencia . '</td>';
		echo '<td>' . $PendenciasBacen->NomeFantasiaBanco . '</td>';
		echo '</tr>';
	}
	echo "</table>";


	echo "</pre>";


	# PRINT TODOS ELEMENTOS (TESTE)
	print_r($pefin);
?>
