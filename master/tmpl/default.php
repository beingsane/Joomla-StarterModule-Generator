<?php
/**
 * @package     monsite.site
 * @subpackage  mod_monmodule
 */

defined('_JEXEC') or die;	
?>
<!-- Module mod_assurancevie
	========================

	* Description : Affiche les contrats d'assurance-vie.
	* Positon : 3
	
	-->
	
	<?php 
		/**
		* Affichage du contrat #1
		*
		* @param string  titre-bloc-assurancevie   Titre du bloc contenant les contrats
		**/
	 ?>
	<div class="col-40">
		<div id="bloc-1">
			<h1><?php echo $params->get('titre-bloc-assurancevie');?></h1>

			<div class="cols-row cols-split end">

				<?php 
					/**
					* Affichage du contrat #1
					*
					* @param string  titre-contrat-1   Titre du contrat dans le bloc
					* @param string  txt-contrat-1     Affiche le taux du contrat
					* @param string  image-contrat-1   Affichage de l'image du bloc
					* @param string  lien-contrat-1    Met le lien qui va pointer vers la bonne page
					* @param booleen contrat-1         Activation de ce contrat
					**/

					if ($params->get('contrat-1', 1)) { ?>
					
					<!-- Contrat d'assurance-vie #1 -->
					<div id="croissance-vie" class="col-50 centered">
						<h3><?php echo $params->get('titre-contrat-1');?></h3>
						<?php if ($params->get('image-contrat-1')) { ?>		
							<img src="<?php echo $params->get('image-contrat-1'); ?>" alt="">
						<?php } ?>
						
						<span><?php echo $params->get('txt-contrat-1');?></span>

						<a href="<?php echo $params->get('lien-contrat-1');?>" class="btn-call">Souscire ce contrat</a>
					</div>
				<?php } ?>
	
				<?php 
					/**
					* Affichage du contrat #2
					*
					* @param string  titre-contrat-2   Titre du contrat dans le bloc
					* @param string  txt-contrat-2     Affiche le taux du contrat
					* @param string  image-contrat-2   Affichage de l'image du bloc
					* @param string  lien-contrat-2    Met le lien qui va pointer vers la bonne page
					* @param booleen contrat-2         Activation de ce contrat
					**/

					if ($params->get('contrat-2', 1)) { ?>
					
					<!-- Contrat d'assurance-vie #2 -->
					<div id="croissance-avenir" class="col-50 centered">
						<h3><?php echo $params->get('titre-contrat-2');?></h3>
						<?php if ($params->get('image-contrat-2')) { ?>		
							<img src="<?php echo $params->get('image-contrat-2'); ?>" alt="">
						<?php } ?>
						
						<span><?php echo $params->get('txt-contrat-2');?></span>

						<a href="<?php echo $params->get('lien-contrat-1');?>" class="btn-call">Souscire ce contrat</a>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>

<!-- FIN Module mod_assurancevie -->