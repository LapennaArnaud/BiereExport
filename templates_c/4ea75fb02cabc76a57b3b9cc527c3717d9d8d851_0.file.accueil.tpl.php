<?php
/* Smarty version 3.1.31, created on 2017-12-08 08:48:20
  from "/home/ubuntu/workspace/templates/accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2a51d4737d95_14989162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ea75fb02cabc76a57b3b9cc527c3717d9d8d851' => 
    array (
      0 => '/home/ubuntu/workspace/templates/accueil.tpl',
      1 => 1512722898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2a51d4737d95_14989162 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15961619725a2a51d4727532_19372472', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1656146525a2a51d472cf09_90782004', "zone_travail");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_964732435a2a51d4735341_59973007', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_15961619725a2a51d4727532_19372472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_15961619725a2a51d4727532_19372472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Accueil
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_1656146525a2a51d472cf09_90782004 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_1656146525a2a51d472cf09_90782004',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- PB DU CAROUSSEL : manque dans la balise head le lien vers le script jquery.min.js ET bootstrap.min.js
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
  		<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
		-->
		  <!-- Indicators -->
			<ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    	<li data-target="#myCarousel" data-slide-to="1"></li>
		    	<li data-target="#myCarousel" data-slide-to="2"></li>
		  	</ol>

  			<!-- Wrapper for slides -->
	  		<div class="carousel-inner">
		    	<div class="item active">
		      		<img src="../public/img/biere2.jpg" alt="Biere 2">
		    	</div>
		    	<div class="item">
		      		<img src="../public/img/biere1.jpg" alt="Biere 1">
		    	</div>
		    	<div class="item">
		      		<img src="../public/img/biere3.jpg" alt="Biere 3">
		    	</div>
		    </div>
		
			  <!-- Left and right controls -->
			  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    	<span class="glyphicon glyphicon-chevron-left"></span>
			    	<span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
			    	<span class="glyphicon glyphicon-chevron-right"></span>
			    	<span class="sr-only">Next</span>
			  	</a>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1><u>Bienvenue sur Bière EXPORT</u></h1>
			<br>
			<p class="text-home">
				Bière EXPORT, leader français sur le marché de la bière en ligne, proposant des bières bouteilles, des tireuses à bière, des verres à bière, des fûts et des coffrets de bières, est composé d’une équipe jeune et dynamique avec une seule priorité : la satisfaction des clients.
				Pour y parvenir, nous nous efforçons de vous offrir un service de qualité, d’être toujours à votre écoute et de vous dénicher de nouvelles bières introuvables en France et plus excellentes les unes que les autres.<br/><br/>
				Véritables spécialistes en bières, en brasseries et dans leurs domaines de compétences, nos membres se démènent chaque jour en logistique, achat/vente, service client et informatique pour faciliter et transformer votre expérience d’achat en réel plaisir.
			</p>
		</div>
<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_964732435a2a51d4735341_59973007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_964732435a2a51d4735341_59973007',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
