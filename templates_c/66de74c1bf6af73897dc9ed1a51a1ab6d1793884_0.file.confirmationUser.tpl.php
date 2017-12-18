<?php
/* Smarty version 3.1.31, created on 2017-12-07 20:47:03
  from "/home/ubuntu/workspace/templates/confirmationUser.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a29a8c7295bb0_73250299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66de74c1bf6af73897dc9ed1a51a1ab6d1793884' => 
    array (
      0 => '/home/ubuntu/workspace/templates/confirmationUser.tpl',
      1 => 1512679615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a29a8c7295bb0_73250299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10230865765a29a8c7282658_62049717', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8898330795a29a8c7286c73_35943085', "zone_travail");
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5154961895a29a8c7292818_36933548', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_10230865765a29a8c7282658_62049717 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_10230865765a29a8c7282658_62049717',
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
class Block_8898330795a29a8c7286c73_35943085 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_8898330795a29a8c7286c73_35943085',
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
				<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="https://met02-2017-juliengroll-jgroll.c9users.io/index.php">l'accueil</a>
			</div>
		</div>
	<?php } else { ?>
		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div>
				<h2 class="text-center">L'utilisateur existe déjà</h2>
			</div>
			<div>
				<h3 class="text-center">Vous pouvez réessayer en suivant <a href="https://met02-2017-juliengroll-jgroll.c9users.io/?page=clientController&action=sign_up">ce lien</a>
			</div>
		</div>
	<?php }?>
	
</div>

<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_5154961895a29a8c7292818_36933548 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5154961895a29a8c7292818_36933548',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/jquery.validate.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/validate-rules.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/messages_fr.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
