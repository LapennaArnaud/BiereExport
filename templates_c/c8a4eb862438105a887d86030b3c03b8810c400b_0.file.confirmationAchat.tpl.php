<?php
/* Smarty version 3.1.31, created on 2017-12-12 08:13:56
  from "/home/ubuntu/workspace/templates/confirmationAchat.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2f8fc43b83e3_11838713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8a4eb862438105a887d86030b3c03b8810c400b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/confirmationAchat.tpl',
      1 => 1513066422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2f8fc43b83e3_11838713 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10141508175a2f8fc43b0898_84554161', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6442104855a2f8fc43b4641_88139236', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_10141508175a2f8fc43b0898_84554161 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_10141508175a2f8fc43b0898_84554161',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Confirmation Achat
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_6442104855a2f8fc43b4641_88139236 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_6442104855a2f8fc43b4641_88139236',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
		<u><h2 class="text-center">Confirmation Achat</h2></u>
	</div>
	<h3 class="text-center">Votre achat a bien été éffectué</h3>
	<div class="col-md-12 text-center">
	    <a href="/index.php"><button type="button" class="btn btn-success">Retour à l'accueil</button></a>
	    <a href="/produit/panier.html"><button type="button" class="col-md-offset-1 btn btn-info ">Retour au panier</button></a>
	</div>
			
<?php
}
}
/* {/block "zone_travail"} */
}
