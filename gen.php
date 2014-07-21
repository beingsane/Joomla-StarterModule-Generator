<?php

// Chargement des presets
require_once("config.php");
require_once("functions.php");

// Récupération des valeurs du formulaire
$nomModule = $_POST['name'];
$nomAuteur = $_POST['auteur'];
$descriptionModule = $_POST['description'];

// Variables vitales
$versionModule = "3.3.0";
$dossierMaster = "master/";
$zip = new ZipArchive();
$filename = "mod_".$nomModule.".zip";


// Création des fichier dans le dossier à zipper
if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("Impossible d'ouvrir le fichier <$filename>\n");
}

//Déclaration des nom de fichiers
$modFilePhp = "mod_".$nomModule.".php";
$modFileXml = "mod_".$nomModule.".xml";
$modFileDefault = "tmpl/default.php";

// Duplicate des fichier par rapport au "master" exisant.
// ------------------------------------------------------

// mod_master.php

$tmpFilePhp = "tmp/".$modFilePhp;
$sourceFilePhp = $dossierMaster."mod_master.php";
$wordName = "*nomModule*";

creationFichierModule($tmpFilePhp,$sourceFilePhp,$wordName,$nomModule);


// mod_master.xml

$tmpFileXml = "tmp/".$modFileXml;
$sourceFileXml = $dossierMaster."mod_master.xml";
$wordName = "*nomModule*";

creationFichierModule($tmpFileXml,$sourceFileXml,$wordName,$nomModule);


// default.php
$tmpFileDefault = "tmp/default.php";
$sourceFileDefault = $dossierMaster."/tmpl/default.php";
$wordName = "*nomModule*";
  
creationFichierModule($tmpFileDefault,$sourceFileDefault,$wordName,$nomModule);


// Zip des fichiers dupliqué
$zip->addFile( "tmp/".$modFilePhp, $modFilePhp);
$zip->addFile( "tmp/".$modFileXml, $modFileXml);
$zip->addFromString("index.html", "<html></html>");
$zip->addEmptyDir('tmpl');
$zip->addFile( "tmp/default.php", $modFileDefault);
$zip->addFromString("tmpl/index.html", "<html></html>");

// Fermeture du ZIP
$zip->close() or die("Erreur lors de la fermeture de l'archive");

unlink($tmpFilePhp);
unlink($tmpFileXml);
unlink($tmpFileDefault);

// On mémorise que le fichier a bien été créée et on stocke le nom pour le téléchargement.
$_SESSION['done'] = "1"; 
$_SESSION['name'] = $_POST['name']; 


// Une fois le script executé on redirige vers l'accueil
header ("location: index.php");

?>