<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Joomla Module Generator</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Slim HTML/CSS est un framework responsive, léger, et pret à l'emploi." />
		<meta name="keywords" content="CSS, grid, grid system, Slim, HTML/CSS, fixed, layout, fluid, responsive, adaptive, design" />
		<meta name="viewport" content="initial-scale=1,minimum-scale=1,width=device-width">

		<!-- Open Graph facebook -->
		<meta property="og:url" content="http://"/>
		<meta property="og:title" content=""/> 
		<meta property="og:type" content="website"/> 
		<meta property="og:image" content="http://"/> 
		<meta property="og:site_name" content=""/> 
		<meta property="og:description" content=""/>
		<meta name="viewport" content="initial-scale=1,minimum-scale=1,width=device-width">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="css/slim-icons.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/slim.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />

		<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]> <html class="no-js lt-ie9"><![endif]-->
		<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
		<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>

	<body onload="prettyPrint()">

		<div class="container">
			<div class="cols-row">
				<div class="col-50 col-centre">
					
					<div class="cols-row">
						<div class="col-100 centered">
							<h1>Joomla Module Generator</h1>	
							<h2 class="soustitre">Générer un module prêt à développer</h2>
						</div>
					</div>
					
					<form action="gen.php" method="POST">

						<label for="name">Nom du module: </label>
						<input id="name" class="input width-100" placeholder="Nom du module" type="text" name="name">

						<label for="auteur">Auteur du module: </label>
						<input id="auteur" class="input width-100" placeholder="Auteur" type="text" name="auteur">

						<label for="description">Description du module: </label>
						<input id="description" class="input width-100" placeholder="Description" type="text" name="description">
						
						<input type="submit" class="btn width-100" value="Générer le module">

					</form>

					<?php 
						if ($_SESSION['done'] == "1" ) { ?>
							
						<hr>	
						<div class="cols-row">
							<div class="col-100 centered">
								<h2 class="soustitre">Module généré avec succés</h2>
								<div class="cols-row">
									<div class="col-60"><p class="lead"> Télécharger votre module : <?php echo $_SESSION['name'] ?> </p></div>
									<div class="col-40"><a href="<?php echo "mod_".$_SESSION['name'].".zip" ?>" class="btn-icon icon-download">Télécharger</a></div>
								</div>
							</div>
						</div>
							
					<?php } ?>
				</div>
			</div>
		</div>
		
		<?php
		// On détruit les variables de notre session
		$_SESSION = array();
		session_unset ();  
		?> 
		
		<script src="js/jquery.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>