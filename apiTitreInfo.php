<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Votre Radio - C'était quoi ce titre ? - À propos ...</title>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
		<style type="text/css">
		body {
			background: #F0F0F0;
			width: 550px;
			margin: auto;
			font-family: 'Ubuntu', Arial, Verdana, sans-serif;
		}

		#apropos {
			padding: 5px;
			margin-top: 5px;
			margin-bottom: 20px;
			font-weight: bold;
			font-size: 1.5em;
			text-align: center;
		}

		#contenuapropos {
			border: 1px solid #000000;
			border-radius: 5px;
			padding: 5px;
			margin-bottom: 20px;
		}

		#attention {
			margin-top: 20px;
			font-weight: bold;
			color: #FF0000;
		}

		#copyrightapropos {
			padding: 5px;
			border: 1px solid #000000;
			border-radius: 5px;
			text-align: center;
		}
		</style>
	</head>

	<body>
		<div id="apropos">
			À propos de C'était quoi ce titre ?
		</div>
		
		<div id="contenuapropos">
			Le C'était quoi ce titre ? est un script PHP de Max qui à été repris par FleuryK afin d'adapter au nouveau système d'API de Radionomy.<br />
			Il permet de visualiser selon le nombre fixé, les derniers titres en cours diffusés sur votre webradio.
				<div id="attention">
					ATTENTION ! Lors des émissions en live, les derniers titres diffusés sur votre webradio n'apparaissent pas !
				</div>
		</div>

		<div id="copyrightapropos">
			© <?php echo date("Y"); ?>. Votre Radio - C'était quoi ce titre ?.<br />
			<!-- Merci de ne pas toucher à la ligne d'en dessous. Merci de respecter l'auteur (ou les auteurs) de ce script -->
			Script de Max repris par FleuryK. Tous droits réservés.
		</div>
	</body>
</html>