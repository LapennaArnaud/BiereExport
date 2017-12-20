<?php
/* Smarty version 3.1.31, created on 2017-12-19 13:45:03
  from "/home/ubuntu/workspace/templates/validationMdpOublie.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3917dfb0d4e0_85242191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bd255fd39cd0025e790d9679af54ba662f27c79' => 
    array (
      0 => '/home/ubuntu/workspace/templates/validationMdpOublie.tpl',
      1 => 1513690984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3917dfb0d4e0_85242191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4940011715a3917dfafe393_11135144', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18834685745a3917dfb032e7_67602400', "zone_travail");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_4940011715a3917dfafe393_11135144 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_4940011715a3917dfafe393_11135144',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Mot de passe oublié
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_18834685745a3917dfb032e7_67602400 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_18834685745a3917dfb032e7_67602400',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="col-md-offset-2 col-md-8">
	<?php if (!empty($_smarty_tpl->tpl_vars['clientList']->value)) {?>
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Un email récapitulatif de vos informations personnelles a été envoyé.</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="../index.php">l'accueil</a>
			</div>
		</div>
	<?php } else { ?>
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Le login et/ou l'email renseigné est incorect</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/mdpOublie">ce lien</a>
			</div>
		</div>
	<?php }?>
</div>
<?php
}
}
/* {/block "zone_travail"} */
}
