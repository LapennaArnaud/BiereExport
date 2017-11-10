<?php
/* Smarty version 3.1.31, created on 2017-11-06 10:02:03
  from "/home/ubuntu/workspace/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a00331bc01b00_59510512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00eaf1e9bc6df2a0fb7d9699ea253565ec185f21' => 
    array (
      0 => '/home/ubuntu/workspace/templates/login.tpl',
      1 => 1509962356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a00331bc01b00_59510512 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8432823335a00331bbee427_14963777', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9333015955a00331bbf28d2_19894044', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5738613155a00331bbfe618_69926339', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_8432823335a00331bbee427_14963777 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_8432823335a00331bbee427_14963777',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Login
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_9333015955a00331bbf28d2_19894044 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_9333015955a00331bbf28d2_19894044',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<div class="col-md-1"></div>
			<form class="form-horizontal col-md-9" id="form-login" role="form">
				<div class="form-group col-md-12">
					<div class="form-group col-md-12">
						<label class="control-label col-md-3" >Login :</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="login" id="login" >
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<label class="control-label col-md-3" >Mot de passe :</label>
						<div class="col-md-9">
							<input class="form-control" type="password" name="password" id="password" >
						</div>
					</div>
					<div class="form col-xs-6">
						<button type="submit" class="btn btn-default" >Valider</button>
					</div>
				</div>
			</form>
<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_5738613155a00331bbfe618_69926339 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5738613155a00331bbfe618_69926339',
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
<?php
}
}
/* {/block "script"} */
}
