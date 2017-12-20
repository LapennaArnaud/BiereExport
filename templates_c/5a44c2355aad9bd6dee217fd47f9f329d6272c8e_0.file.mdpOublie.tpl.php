<?php
/* Smarty version 3.1.31, created on 2017-12-19 13:44:56
  from "/home/ubuntu/workspace/templates/mdpOublie.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3917d8358e53_96419025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a44c2355aad9bd6dee217fd47f9f329d6272c8e' => 
    array (
      0 => '/home/ubuntu/workspace/templates/mdpOublie.tpl',
      1 => 1513690896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3917d8358e53_96419025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15371735705a3917d8350046_44147506', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20325957425a3917d8354648_15447310', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_15371735705a3917d8350046_44147506 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_15371735705a3917d8350046_44147506',
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
class Block_20325957425a3917d8354648_15447310 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_20325957425a3917d8354648_15447310',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
   	<div>
    	<h2 class="text-center">Mot de passe oublié</h2>
	</div>
	<div class="col-md-1"></div>
	<form method="post" class="form-horizontal col-md-9" id="form-mdp" role="form" action="/utilisateur/validationMdpOublie">
			<div class="form-group col-md-12">
				<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Login:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="login" id="login" >
    				</div>
    			</div>
    			<div class="form-group col-md-12">
					<label class="control-label col-md-3" >Adresse email :</label>
					<div class="col-md-9">
						<input class="form-control" type="email" name="email" id="email" placeholder="Veuillez rentrer l'adresse email lié au compte ..." >
					</div>
				</div>
				<div class="form col-md-offset-6 col-xs-6">
					<button type="submit" class="btn btn-default" >Valider</button>
				</div>
			</div>
	</form>

</div>
<?php
}
}
/* {/block "zone_travail"} */
}
