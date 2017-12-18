<?php
/* Smarty version 3.1.31, created on 2017-12-18 13:17:20
  from "/home/ubuntu/workspace/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37bfe0319224_09401602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00eaf1e9bc6df2a0fb7d9699ea253565ec185f21' => 
    array (
      0 => '/home/ubuntu/workspace/templates/login.tpl',
      1 => 1513602985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37bfe0319224_09401602 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14717363305a37bfe03085b2_08702249', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19614073245a37bfe0311109_13158915', "zone_travail");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_14717363305a37bfe03085b2_08702249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_14717363305a37bfe03085b2_08702249',
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
class Block_19614073245a37bfe0311109_13158915 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_19614073245a37bfe0311109_13158915',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Connexion</h2>
			</div>
			<form method="post" action="/utilisateur/validationLogin.html" class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-login" role="form">
				<div class="form-group col-md-12">
					<div class="form-group col-md-12">
						<label class="control-label col-md-3 col-xs-12" >Login :</label>
						<div class="col-md-9 col-xs-12">
							<input class="form-control" type="text" name="login" id="login" >
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<label class="control-label col-md-3 col-xs-12" >Mot de passe :</label>
						<div class="col-md-9 col-xs-12">
							<input class="form-control" type="password" name="password" id="password" >
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="form col-md-offset-6 col-xs-offset-4">
							<button type="submit" class="btn btn-default" >Valider</button>
						</div>
						<div class="form col-md-offset-8 col-xs-12">
							<a href="/utilisateur/mdpOublie.html">Mot de passe oublié</a>
						</div>
					</div>
				</div>
			</form>
		</div>	
<?php
}
}
/* {/block "zone_travail"} */
}
