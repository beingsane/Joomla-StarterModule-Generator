<?php

// Chargement des presets
require_once("config.php");

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
$replaceWordName = "*nomModule*";
  
  // Ouverture du fichier en r (Ouvre en lecture, et place le pointeur de fichier au début du fichier.)
  if (!$fichierOuvert = fopen($sourceFilePhp, 'r')) {
       echo "Impossible d'ouvrir le fichier ($sourceFilePhp)";
       exit;
  }

  // Enregistrement du contenu dans une variable    
  $contentSource = fread($fichierOuvert, filesize($sourceFilePhp));

  // Remplacer le mot recherché par 
  $content = str_replace($replaceWordName, $nomModule, $contentSource);

  fclose($fichierOuvert);

  // Ouverture du fichier en r+ (Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.)
    if (!$fichierOuvert = fopen($tmpFilePhp, 'x+')) {
         echo "Impossible d'ouvrir le fichier ($fichier)";
         exit;
    }
  // Ecriture du contenu final
  file_put_contents($tmpFilePhp, $content);

  // Fermeture du fichier
  fclose($fichierOuvert);


// mod_master.xml
$modFileXml = "mod_".$nomModule.".xml";


$tmpFileXml = "tmp/".$modFileXml;
$sourceFileXml = $dossierMaster."mod_master.xml";
$replaceWordName = "*nomModule*";
  
  // Ouverture du fichier en r (Ouvre en lecture, et place le pointeur de fichier au début du fichier.)
  if (!$fichierOuvert = fopen($sourceFileXml, 'r')) {
       echo "Impossible d'ouvrir le fichier ($sourceFileXml)";
       exit;
  }

  // Enregistrement du contenu dans une variable    
  $contentSource = fread($fichierOuvert, filesize($sourceFileXml));

  // Remplacer le mot recherché par 
  $content = str_replace($replaceWordName, $nomModule, $contentSource);

  fclose($fichierOuvert);

  // Ouverture du fichier en r+ (Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.)
    if (!$fichierOuvert = fopen($tmpFileXml, 'x+')) {
         echo "Impossible d'ouvrir le fichier ($fichier)";
         exit;
    }
  // Ecriture du contenu final
  file_put_contents($tmpFileXml, $content);

  // Fermeture du fichier
  fclose($fichierOuvert);


// default.php
$tmpFileDefault = "tmp/default.php";
$sourceFileDefault = $dossierMaster."/tmpl/default.php";
$replaceWordName = "*nomModule*";
  
  // Ouverture du fichier en r (Ouvre en lecture, et place le pointeur de fichier au début du fichier.)
  if (!$fichierOuvert = fopen($sourceFileDefault, 'r')) {
       echo "Impossible d'ouvrir le fichier ($sourceFileDefault)";
       exit;
  }

  // Enregistrement du contenu dans une variable    
  $contentSource = fread($fichierOuvert, filesize($sourceFileDefault));

  // Remplacer le mot recherché par 
  $content = str_replace($replaceWordName, $nomModule, $contentSource);

  fclose($fichierOuvert);

  // Ouverture du fichier en r+ (Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.)
    if (!$fichierOuvert = fopen($tmpFileDefault, 'x+')) {
         echo "Impossible d'ouvrir le fichier ($tmpFileDefault)";
         exit;
    }
  // Ecriture du contenu final
  file_put_contents($tmpFileDefault, $content);

  // Fermeture du fichier
  fclose($fichierOuvert);


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
// header ("location: index.php");

?>