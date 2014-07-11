<?php
require_once("config.php");

$nomModule = $_POST['name'];
$nomAuteur = $_POST['auteur'];
$descriptionModule = $_POST['description'];
$versionModule = "3.3.0";

$zip = new ZipArchive();
$filename = "mod_".$nomModule.".zip";
$thisdir = "";

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("Impossible d'ouvrir le fichier <$filename>\n");
}

$zip->addFromString("mod_".$nomModule.".php", "
<?php
/**
 * @package     monsite.site
 * @subpackage  mod_".$nomModule."
 */

defined('_JEXEC') or die;
require JModuleHelper::getLayoutPath('mod_".$nomModule."', $params->get('layout', 'default'));

?>
");
$zip->addFromString("mod_".$nomModule.".xml", '<?xml version="1.0" encoding="utf-8" ?>
<extension type="module" version="3.0" client="site" method="upgrade">
  <name>'.$nomModule.'</name>
    <author>'.$nomAuteur.'</author>
    <version>'.$versionModule.'</version>
    <description>'.$descriptionModule.'</description>
    <files>
      <filename>mod_'.$nomModule.'.xml</filename>
        <filename module="mod_'.$nomModule.'">mod_'.$nomModule.'.php</filename>
        <filename>index.html</filename>
        <filename>tmpl/default.php</filename>
        <filename>tmpl/index.html</filename>
    </files>
    <config>
      <fields name="params">
        <fieldset name="basic">

          <field name="parametre-1" type="text" default=""
            label="Parametre 1"
            description="Gestion du paramètre 1"
            filter="string" />

        </fieldset>
      </fields>
    </config>
</extension>
');
$zip->addFromString("index.html", "<html></html>");
$zip->addEmptyDir('tmpl');
$zip->addFromString("tmpl/default.php", "
<?php
/**
 * @package     monsite.site
 * @subpackage  mod_".$nomModule."
 * 
 * Description : ".$descriptionModule."
 * Positon     : 1
 */

defined('_JEXEC') or die;	
?>

<?php echo $params->get('parametre-1') ?>
");
$zip->addFromString("tmpl/index.html", "<html></html>");
$zip->close();

$_SESSION['done'] = "1"; 
$_SESSION['name'] = $_POST['name']; 

header ("location: index.php");

?>