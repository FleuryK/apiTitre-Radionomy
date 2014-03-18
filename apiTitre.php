<?php
 
/************************************/
/*       Script Last Title          */
/*           By Max                 */
/*		Modified by FleuryK			*/
/************************************/
 
// @author Max
// @modified FleuryK
// @version 2.1
// @description Affichage des derniers titres diffusés
 

// Titre de la page
$title = "Votre Webradio - C'était quoi ce titre";
// Fichier call_api.php du tracklist
$fichier_php_call_api_tracklist="http://www.votresite.fr/tracklist/call_api.php";
// Affichage des pochettes : 1 = Oui, 0 = Non
$affichagePochette = 1;
// Longeur de l'image pour les pochettes (en px)
$longeurImageImg = "70px";
// Fichier (ou URL) de l'image "Pas de pochette"
$paspochette="";
// Fichier (ou URL) de l'image Rafraîchissement de la page
$refresh="traklist/refresh.png";
// Hauteur de l'image de Rafraîchissement (en px)
$heightrefresh="16px";
// Temps de rafraîchissement (en secondes. ATTENTION ! Pas en dessous de 3 minutes = 150 secondes ! En dessous,
// risque de blacklistage de votre clé API !)
$metarefresh=150;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //
// Ne pas modifier la suite du script ! //
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! //
echo "<!DOCTYPE html>
<html>
<head>
<title>$title</title>
<meta charset=\"UTF-8\" />
<meta http-equiv=\"refresh\" content=\"$metarefresh\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"tracklist/style.css\" />
</head>

<body>
	<a href=\"#\" onclick=\"javascript:window.location.reload();\"><img src=\"$refresh\" style=\"border: 0px; height: $heightrefresh; margin-top: 5px;\" alt=\"Refresh\" align=\"right\" /></a>\n\n";

$confirmPochette = ($affichagePochette) ? 'yes' : 'no';	
$xml = file_get_contents("$fichier_php_call_api_tracklist");
$sxml = simplexml_load_string($xml);
$i = 0;
if($affichagePochette)
	echo "		<input type=\"hidden\" value=\"Affichage de la pochette\" />\n\n";
else
	echo "		<input type=\"hidden\" value=\"Pas d'affichage de la pochette\" />\n\n";
foreach ($sxml->track as $radionomy) {
	if ($i==0) {
		$date = "Diffusé en ce moment";
	}
	else {
		$date = "Diffusé à ".date('H:i', strtotime($radionomy->dateofdiff))."";
	}

	if($affichagePochette) {
		if(isset($radionomy->cover) && !empty($radionomy->cover))
			echo "		<div class=\"pochette\">
			<img src=\"$radionomy->cover\" style=\"width: $longeurImageImg;\" alt=\"$radionomy->artists - $radionomy->title\" />
		</div>\n";
		else
			echo "		<div class=\"pochette\">
			<img src=\"$paspochette\" style=\"width: $longeurImageImg;\" alt=\"Pas de pochette\" />
		</div>\n";
	}

	echo "		<div class=\"heurediffusion\">&nbsp;$date</div>\n";
	echo "		<div class=\"titreartiste\">
			<span style=\"font-weight: bold;\">&nbsp;$radionomy->artists</span><br />&nbsp;$radionomy->title
		</div>\n\n";

	$i++;
}
echo "
</body>
</html>";
?>