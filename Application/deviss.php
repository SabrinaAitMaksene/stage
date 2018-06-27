<?php 
	require_once"connexion.php";
	ob_start();
?>
<style type ="text/css">
	table{ width:100%;color:#717375;font-size:12pt;font-family: helvetica; line-height: 6mm;}
	strong{color:#000;}
	em{font-size: 9pt;}
	td.right{text-align:right;}
</style>

<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
	<table>
		<tr>
			<td style="width:30%"><h2>Devis n°25</h2></td>
			<td style="width:30%"class="right">Emis le <?php echo date('d/m/Y');?></td>
			<td style="width:30%"class="right">Code du client :23</td>
		</tr>
	</table>
	<table style="vertical-align:top;margin-top: 20mm;">
		<tr>
			<td style="width:70%;" > 
				<?php echo $nom." ".$prenom?><br/>
		 		<strong>Tel:</strong><?php echo $numeroFixe ?>-portable: <?php echo $numeroPortable?>
		 		<br/>
		 		<strong>Email: </strong><?php echo $adresseMail?>
		 		<br/>
		 		<strong>SIRET:</strong> <?php echo $Siret?>
		 	</td>
		 	<td style="width:30%;">
		 		adresse :
		 	</td>
		</tr>
	</table>

	
</page>

<?php
	$content= ob_get_clean();
	require_once"html2pdf/html2pdf.class.php";
	try
	{

		$pdf = new HTML2PDF('p','A4','fr');
		$pdf->pdf->SetDisplayMode('fullpage');
		$pdf-> writeHTML($content);
		$pdf->Output('test.pdf');
	}
	catch(html2pdf_exception $e)
	{
		die($e);
	}
?>