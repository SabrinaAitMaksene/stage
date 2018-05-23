<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title> Sylvain ARD </title>
    <link rel="stylesheet" href="devis.css">
     <script type ="text/javasciprt" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 </head>
 <body>


 	<div id ="infoProp" >
 		<p>
	 		Tel: -portable: 
	 		<br>
	 		Email:
	 		</br>
	 		SIRET: 
 		</p> 
 	</div>
 	<div id = "devis">
 		<table>
 			<tr>
 				<th colspan="3">DEVIS</th>
 			</tr>
 			<tr>
 				<th>N° devis</th>
 				<th>Date</th>
 				<th>Code client</th>
 			</tr>
 			<tr>
 				<td>DC0025</td>
 				<td>21/07/2016</td>
 				<td>CL0024</td>
 			</tr>
 		</table>
 	</div>
 	<div id ="client">
 		<p>Adresse :</p>
 	</div>
 	<div id = "intro">
 		<p>Mode de paiement :
 		<br>Date de validité :</p>
 	</div>
 	

 	<div id = "contenu">
 		<table>
 			<tr>
 				<th>Référence</th>
 				<th>Description</th>
 				<th>Quantité</th>
 				<th>Prix Unitaire</th>
 				<th>Total</th>
 			</tr>
 		</table>
 	</div>
 	<div id = "resultat"></div>
 	<scrip>
 		var nbligne = 1;

	function nouvelleligne(nbligne){

		return '<tr name="'+ nbligne +'" onclick="ajouterligne($(this));">' +
				'<td>'+ nbligne +'</td>' +
				'<td></td>' +
				'<td></td>' +
				'<td></td>' +
			'</tr>';
	}
	
	// on creé la première ligne
		var nouvelle_ligne = nouvelleligne(nbligne);
		$(nouvelle_ligne).prependTo("#tableau");

	// On affiche le nombre de ligne
	$("#result").html("nb ligne = " + nbligne);


	function ajouterligne(ligne){

		// Si c'est la derière ligne	
		if(ligne.attr('name') == nbligne){
		
			// On insert la nouvelle ligne
			nbligne ++;
			var nouvelle_ligne = nouvelleligne(nbligne);
			$(nouvelle_ligne).insertAfter(ligne);
		
			// on change la variable nbligne et on l'affiche 
			$("#result").html("nb ligne = " + nbligne);
		}
	}

 	</scrip>
 	<div id = "tva">
 		<p>TVA non applicable, ar-293-B du CGI</p>
 	</div>
 	<div id = "montant">
 		<table> 
 			<th>Total</th>
 			<td> 420,00 euro   </td>
 		</table>
 	</div>
 	<div id ="lA">
 		<p> Cachet et signature précédés de BON POUR ACCORD </p>
 	</div>
 	<hr width = "90%">
 	<footer><P>Entreprise individuelle -SIREN : 800792434</P></footer>
 </body>
</html>