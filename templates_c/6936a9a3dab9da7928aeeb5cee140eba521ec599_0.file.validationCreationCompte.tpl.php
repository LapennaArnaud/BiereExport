<?php
/* Smarty version 3.1.31, created on 2017-12-18 14:13:22
  from "/home/ubuntu/workspace/templates/validationCreationCompte.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37cd02614ec2_54087906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6936a9a3dab9da7928aeeb5cee140eba521ec599' => 
    array (
      0 => '/home/ubuntu/workspace/templates/validationCreationCompte.tpl',
      1 => 1513606253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37cd02614ec2_54087906 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5706389905a37cd02601053_77198187', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13748847245a37cd02605dc4_75520570', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_5706389905a37cd02601053_77198187 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_5706389905a37cd02601053_77198187',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Création de l'utilisateur
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_13748847245a37cd02605dc4_75520570 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_13748847245a37cd02605dc4_75520570',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="col-md-offset-2 col-md-8">
	<?php if (!empty($_smarty_tpl->tpl_vars['clientList']->value)) {?>
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">Votre compte a bien été créé</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="../index.php">l'accueil</a>
			</div>
		</div>
	<?php } else { ?>
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">L'utilisateur existe déjà</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/sign_up.html">ce lien</a>
			</div>
		</div>
	<?php }?>
</div>
<?php
}
}
/* {/block "zone_travail"} */
}
