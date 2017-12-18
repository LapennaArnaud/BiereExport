<?php
/* Smarty version 3.1.31, created on 2017-12-18 14:44:56
  from "/home/ubuntu/workspace/templates/info.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37d468f12693_06071480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5e7529e844120647bbcb9b61492d04d945951e9' => 
    array (
      0 => '/home/ubuntu/workspace/templates/info.tpl',
      1 => 1513586933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37d468f12693_06071480 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12193099275a37d468f072f1_04868253', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12001334845a37d468f0d3e5_41805242', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_12193099275a37d468f072f1_04868253 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_12193099275a37d468f072f1_04868253',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Information
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_12001334845a37d468f0d3e5_41805242 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_12001334845a37d468f0d3e5_41805242',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
	    <h2 class="text-center">Nos informations</h2>
	    <p class="text-center">
	    	Pour toute réclamation ou information sur l'achat ou l'apres vente d'un produit vous pouvez 
	    	nous contacter  :
		    <ul>
		    	<li>par mail :<a href="mailto:julien.groll@gmail.com">contact@biere-export.fr</a></li>
		    	<li>par notre formulaire : <a href="/utils/contact.html">ici</a></li>
		    	<li>par téléphone : 01.23.45.67.89</li>
		    	<li>par courrier : BiereExport - 28 rue de la Fleur - Breuschwickersheim - 67112 </li>
	    </ul>
	    </p>
    </div>
</div>
<?php
}
}
/* {/block "zone_travail"} */
}
