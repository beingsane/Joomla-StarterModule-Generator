<?php
function creationFichierModule($tmpFile,$sourceFile,$replaceWordName,$nomModule)
{

    // Ouverture du fichier en r (Ouvre en lecture, et place le pointeur de fichier au début du fichier.)
    if (!$fichierOuvert = fopen($sourceFile, 'r')) {
         echo "Impossible d'ouvrir le fichier ($sourceFile)";
         exit;
    }

    // Enregistrement du contenu dans une variable    
    $contentSource = fread($fichierOuvert, filesize($sourceFile));

    // Remplacer le mot recherché par 
    $content = str_replace($replaceWordName, $nomModule, $contentSource);

    // Fermeture du fichier source
    fclose($fichierOuvert);

    // Création du fichier dans le dossier /tmp 
    if (!$fichierOuvert = fopen($tmpFile, 'x+')) {
         echo "Impossible d'ouvrir le fichier ($tmpFile)";
         exit;
    }

    // Ecriture du contenu modifier avec le mot recherché dans le fichier
    file_put_contents($tmpFile, $content);

    // Fermeture du fichier temporaire
    fclose($fichierOuvert);
}
?>
