<?php
/* Smarty version 3.1.31, created on 2017-11-27 16:14:26
  from "/home/ubuntu/workspace/templates/pogin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1c39e2be88a2_42348347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c8eebd1a753ecf209870380b14cfc9c9ab21e44' => 
    array (
      0 => '/home/ubuntu/workspace/templates/pogin.tpl',
      1 => 1511799008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1c39e2be88a2_42348347 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20206585095a1c39e2bd2bd2_59946203', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9299830985a1c39e2bd9261_34027704', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18479763655a1c39e2be40f0_44863714', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_20206585095a1c39e2bd2bd2_59946203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_20206585095a1c39e2bd2bd2_59946203',
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
class Block_9299830985a1c39e2bd9261_34027704 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_9299830985a1c39e2bd9261_34027704',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<form class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-login" role="form">
				<div class="form-group col-md-12 col-xs-12">
					<div class="form-group col-md-12 col-xs-12">
						<label class="control-label col-md-3 col-xs-3" >Login :</label>
						<div class="col-md-9 col-xs-9">
							<input class="form-control" type="text" name="login" id="login" >
						</div>
					</div>
					
					<div class="form-group col-md-12 col-xs-12">
						<label class="control-label col-md-3 col-xs-3" >Mot de passe :</label>
						<div class="col-md-9 col-xs-9">
							<input class="form-control" type="password" name="password" id="password" >
						</div>
					</div>
					<div class="form-group col-md-12 col-xs-12">
						<div class="form col-md-3 col-xs-6">
							<a href"https://met02-2017-juliengroll-jgroll.c9users.io/?page=mdpOublie">Mot de passe oublié</a>
						</div>
						<div class="form col-md-2 col-xs-6">
							<button type="submit" class="btn btn-default" >Valider</button>
						</div>
					</div>
				</div>
			</form>
		</div>	
<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_18479763655a1c39e2be40f0_44863714 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_18479763655a1c39e2be40f0_44863714',
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
