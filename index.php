<?php

require_once("config.php");

$zip = new ZipArchive();
$filename = "mod_test.zip";
$thisdir = "";

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("Impossible d'ouvrir le fichier <$filename>\n");
}


$zip->addFile("master/mod_master.php", "mod_monmodule.php");
$zip->addFile("master/mod_master.xml", "mod_monmodule.xml");
$zip->addFromString("index.html", "<html></html>");
$zip->addEmptyDir('tmpl');
$zip->addFile("master/tmpl/default.php", "tmpl/default.php");
$zip->addFromString("tmpl/index.html", "<html></html>");
echo "Nombre de fichiers : " . $zip->numFiles . "\n";
echo "Statut :" . $zip->status . "\n";
$zip->close();
?>
