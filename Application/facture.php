<?php 
	require_once"connexion.php";
	ob_start();
?>
<?php
		 $nd= $_GET['nd'];
         $sql2= "SELECT * from factures where numeroFacture= $nd ";
         $response= $bdd->query($sql2);
         $donnees= $response->fetch();
         $ncl=$donnees['numeroCL'];
         $response->closeCursor();
?>
<?php
 	 $sql3= "SELECT * from client where numero= $ncl ";
         $response= $bdd->query($sql3);
         $donnees= $response->fetch();
         $nomClient= $donnees['nomClient'];
         $prenomClient= $donnees['prenomClient'];
         $adresseClient= $donnees['adresseClient'];
         $response->closeCursor();
?>
<style type ="text/css">
	table{ border-collapse: collapse; width:100%;color:#717375;font-size:12pt;font-family: helvetica; line-height: 6mm;}
	strong{color:#000;}
	em{font-size: 9pt;}
	td.right{text-align:right;}
	table.border td{border :1px solid #CFD1D2; padding:3mm 1mm;}
	table.border th {border :1px solid #CFD1D2;background:black;color:white; font-size: 11pt; text-align:left;}
	td.black {background:black;color:white; font-size: 11pt;}
	td.nborder{border:none;}
	h3{ text-align: center; font-size:8pt; }
</style>

<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
	<page_footer>
		<hr/>
		<h3>Enreprise indivuduelle-SIREN : 800792434</h3>
	</page_footer>
	<table>
		<tr>
			<td style="width:30%"><h2>Facture <?php echo $_GET['nd'];?></h2></td>
			<td style="width:30%"class="right">Emise le <?php echo date('d/m/Y');?></td>
			<td style="width:30%"class="right">Code du client : <?php echo $ncl?></td>
		</tr>
	</table>
	<table style="vertical-align:top;margin-top: 20mm;">
		<tr>
			<td style="width:70%;" > 
				<?php echo $nom." ".$prenom?><br/>
				<?php echo $numMaison ?>
		 		<br/>
		 		<?php echo $rue ?>
		 		<br/>
		 		<?php echo $Residence ?>
		 		<br/>
		 		<?php echo $ville ?>
		 		<br/>
		 		<strong>Tel:</strong><?php echo $numeroFixe ?>-portable: <?php echo $numeroPortable?>
		 		<br/>
		 		<strong>Email: </strong><?php echo $adresseMail?>
		 		<br/>
		 		<strong>SIRET:</strong> <?php echo $Siret?>
		 	</td>
		 	<td style="width:30%;">
				<?php echo $nomClient." ".$prenomClient?><br/>
		 		adresse :
		 		<?php echo nl2br($adresseClient)?>
		 	</td>
		</tr>
	</table>
	<br/><br/>
	<table style="margin-top: 20mm;">
		<tr> <td>Mode de paiement : </td> </tr>
		<tr> <td>Date de validité : </td> </tr>

	</table>
	<table class="border" style="margin-top: 5mm;" >
		<thead>
			<tr>
				<th style="width:11%">Reference</th>
				<th style="width:56%">Description</th>
				<th style="width:9%">Quantité</th>
				<th style="width:12%">Prix Unitaire</th>
				<th style="width:12%">Montant</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$ndv=$_GET['nd'];
 				$sql2= "SELECT * from lignefacture where idFacture= (SELECT  idFacture FROM factures where numeroFacture=$ndv)";
 				$response= $bdd->query($sql2);
 				$prixTotal=0;
 				while($donnees = $response->fetch())
 				{
 			?>
 			<tr>
 				<td><?php echo $donnees['referenceF']; ?></td>
 				<td><?php echo $donnees['descriptionF']; ?></td>
 				<td><?php echo $donnees['quantiteF']; ?></td>
 				<td><?php echo number_format($donnees['prixUnitaireF'],2)."€"; ?></td>
 				<td><?php echo number_format(Total($donnees['prixUnitaireF'],$donnees['quantiteF']),2)."€"?> </td>
 			</tr>
 			<?php
 				$prixTotal+=Total($donnees['prixUnitaireF'],$donnees['quantiteF']);
 				}
 				$response->closeCursor();  
 			?>
 			<tr>
 				<td style="padding:1mm;" class="nborder"colspan="3"></td>
 				<td style="padding:1mm;"class="black"> Total </td>
 				<td style="padding:1mm;"> <?php echo$prixTotal ;?>€</td>
 			</tr>
 			<tr>
 				<td style="padding:1mm;" class="nborder"colspan="3"></td>
 				<td style="padding:1mm;"class="black"> Déjà réglé </td>
 				<td style="padding:1mm;"> €</td>
 			</tr>
 			<tr>
 				<td style="padding:1mm;" class="nborder"colspan="3"></td>
 				<td style="padding:1mm;"class="black"> Net à payer </td>
 				<td style="padding:1mm;"> €</td>
 			</tr>
		</tbody>
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