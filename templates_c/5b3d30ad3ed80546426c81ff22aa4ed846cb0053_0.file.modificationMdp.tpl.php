<?php
/* Smarty version 3.1.31, created on 2017-12-19 13:45:17
  from "/home/ubuntu/workspace/templates/modificationMdp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3917edccc8a9_67067874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b3d30ad3ed80546426c81ff22aa4ed846cb0053' => 
    array (
      0 => '/home/ubuntu/workspace/templates/modificationMdp.tpl',
      1 => 1513690917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3917edccc8a9_67067874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13295697995a3917edcaa4e3_97865393', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8658481825a3917edcae8a9_97297893', "zone_travail");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17244191335a3917edcc8898_59372073', "javascript");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_13295697995a3917edcaa4e3_97865393 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_13295697995a3917edcaa4e3_97865393',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Modification mot de passe
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_8658481825a3917edcae8a9_97297893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_8658481825a3917edcae8a9_97297893',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
   	<div>
    	<h2 class="text-center">Changement mot de passe du compte : <?php echo $_SESSION['login'];?>
</h2>
	</div>
	<?php if (empty($_smarty_tpl->tpl_vars['flagList']->value)) {?>
		<div class="col-md-1"></div>
		<form method="post" class="form-horizontal col-md-9" id="form-mdp" role="form" action="/utilisateur/editMdpCompte">
				<div class="form-group col-md-12">
					
					<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Ancien Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password_old" id="password_old">
	    				</div>
	    			</div>
					
					<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Nouveau Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password" id="password" pwcheck="pwcheck">
	    				</div>
	    			</div>
	    			
	    			<div class="form-group col-md-12">
	    				<label class="control-label col-md-3" >Confirmation Mot de passe :</label>
	    				<div class="col-md-9">
	    					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >
	    				</div>
	    			</div>
					<div class="form col-md-offset-6 col-xs-6">
						<button type="submit" class="btn btn-default" >Valider</button>
					</div>
				</div>
		</form>
	<?php } else { ?>
		<?php if (($_smarty_tpl->tpl_vars['flagList']->value) == 1) {?>
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">Changement de mot de passe effectué !</h2>
				</div>
				<div>
					<h3 class="text-center">Vous pouvez retourner maintenant retourner à <a href="../index.php">l'accueil</a>
				</div>
			</div>
		<?php } elseif (($_smarty_tpl->tpl_vars['flagList']->value) == 2) {?>
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">Champ ancient mot de passe erroné</h2>
				</div>
				<div>
					<h3 class="text-center">Vous pouvez réessayer en suivant <a href="/utilisateur/modificationMdp">ce lien</a>
				</div>
			</div>
		<?php } else { ?>
			<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
				<div>
					<h2 class="text-center">ERROR</h2>
				</div>
			</div>
		<?php }?>
	<?php }?>
</div>
<?php
}
}
/* {/block "zone_travail"} */
/* {block "javascript"} */
class Block_17244191335a3917edcc8898_59372073 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_17244191335a3917edcc8898_59372073',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        //Ajout de regle du force du password 
        $.validator.addMethod("pwcheck", function(value) {
           return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // Doit contenir seulement ces caratères
           && /[a-z]/.test(value) // au moins une minuscule
           && /[A-Z]/.test(value) // au moins une majuscule
           && /\d/.test(value) // au moins un nombre
        });
        
    	$('#form-mdp').validate({
    		rules: validateRules
    	})
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "javascript"} */
}
