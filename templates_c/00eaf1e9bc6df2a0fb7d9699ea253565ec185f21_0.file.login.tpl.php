<?php
/* Smarty version 3.1.31, created on 2017-12-08 09:04:31
  from "/home/ubuntu/workspace/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2a559fb09727_31259369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00eaf1e9bc6df2a0fb7d9699ea253565ec185f21' => 
    array (
      0 => '/home/ubuntu/workspace/templates/login.tpl',
      1 => 1512723867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2a559fb09727_31259369 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21395721545a2a559fafd3e8_16137244', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16271505725a2a559fb01042_76504114', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11181114015a2a559fb06b40_18486891', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_21395721545a2a559fafd3e8_16137244 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_21395721545a2a559fafd3e8_16137244',
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
class Block_16271505725a2a559fb01042_76504114 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_16271505725a2a559fb01042_76504114',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<form method="post" action="?page=clientController&action=validationLogin" class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-login" role="form">
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
						<div class="form col-md-offset-6">
							<button type="submit" class="btn btn-default" >Valider</button>
						</div>
						<div class="form col-md-offset-8">
							<a href"https://met02-2017-juliengroll-jgroll.c9users.io/?page=mdpOublie">Mot de passe oublié</a>
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
class Block_11181114015a2a559fb06b40_18486891 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11181114015a2a559fb06b40_18486891',
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
