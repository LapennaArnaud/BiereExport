<?php
/* Smarty version 3.1.31, created on 2017-11-20 10:10:41
  from "/home/ubuntu/workspace/templates/mdpOublie.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a12aa21ba23f3_40249964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a44c2355aad9bd6dee217fd47f9f329d6272c8e' => 
    array (
      0 => '/home/ubuntu/workspace/templates/mdpOublie.tpl',
      1 => 1511172640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12aa21ba23f3_40249964 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6278545035a12aa21b8d703_43848863', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2231971225a12aa21b94916_68506510', "zone_travail");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10594720145a12aa21b9d914_77522057', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_6278545035a12aa21b8d703_43848863 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_6278545035a12aa21b8d703_43848863',
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
class Block_2231971225a12aa21b94916_68506510 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_2231971225a12aa21b94916_68506510',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
   	<div>
    	<h2 class="text-center">Mot de passe oublié</h2>
	</div>
	<div class="col-md-1"></div>
	<form class="form-horizontal col-md-9" id="form-mdp" role="form">
			<div class="form-group col-md-12">
				<div class="form-group col-md-12">
					<label class="control-label col-md-3" >Mot de passe :</label>
					<div class="col-md-9">
						<input class="form-control" type="email" name="email" id="email" >
					</div>
				</div>
				<div class="form col-xs-6">
					<button type="submit" class="btn btn-default" >Valider</button>
				</div>
			</div>
		</form>

</div>

<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_10594720145a12aa21b9d914_77522057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10594720145a12aa21b9d914_77522057',
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
