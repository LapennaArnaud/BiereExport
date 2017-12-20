<?php
/* Smarty version 3.1.31, created on 2017-12-20 15:12:22
  from "/home/ubuntu/workspace/templates/confirmationAchat.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3a7dd6ab6e64_38963696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8a4eb862438105a887d86030b3c03b8810c400b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/confirmationAchat.tpl',
      1 => 1513782740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3a7dd6ab6e64_38963696 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20717509875a3a7dd6aac647_74427587', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10686857635a3a7dd6ab0a42_75787715', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_20717509875a3a7dd6aac647_74427587 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_20717509875a3a7dd6aac647_74427587',
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
class Block_10686857635a3a7dd6ab0a42_75787715 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_10686857635a3a7dd6ab0a42_75787715',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
		<h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</h2>
	</div>
	<div class="col-md-12 text-center">
	    <a href="../index.php"><button type="button" class="btn btn-success">Retour à l'accueil</button></a>
	    <a href="/produit&action=catalogue"><button type="button" class="col-md-offset-1 btn btn-danger ">Retour au catalogue</button></a>
	</div>
<?php
}
}
/* {/block "zone_travail"} */
}
