<?php
/* Smarty version 3.1.31, created on 2017-12-12 07:45:48
  from "/home/ubuntu/workspace/templates/infoClient.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2f892c5e0a80_49426561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62b6d9c382f93adca020ea8282f9ae0c9bbefdcb' => 
    array (
      0 => '/home/ubuntu/workspace/templates/infoClient.tpl',
      1 => 1513032646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2f892c5e0a80_49426561 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5049226515a2f892c5b8575_61836888', "titre");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_68378815a2f892c5bd9e1_84190008', "zone_travail");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_5049226515a2f892c5b8575_61836888 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_5049226515a2f892c5b8575_61836888',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Vos informations
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_68378815a2f892c5bd9e1_84190008 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_68378815a2f892c5bd9e1_84190008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


		<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
			<div id="form-title-div">
				<h2 class="text-center">Vos informations</h2>
			</div>
			<div class="row">
	            <div class="col-md-6">
	            	<form method="post" action="/utilisateur/editCompte.html" id="form-editCompte" role="form">
		        	    <div class="form-group col-md-12 col-xs-12">
		    				<label class="control-label col-md-3 col-xs-3" >Nom :</label>
		    				<div class="col-md-8 col-xs-8">
		    					<input class="form-control" type="text" name="nom" id="nom" value=<?php echo $_SESSION['nom'];?>
>
		    				</div>
		    			</div>
		    			
		        	    <div class="form-group col-md-12 col-xs-12">
		    				<label class="control-label col-md-3 col-xs-3" >Email :</label>
		    				<div class="col-md-8 col-xs-8">
		    					<input class="form-control" type="email" name="email" id="email" value=<?php echo $_SESSION['email'];?>
>
		    				</div>
		    			</div>
		    			
		    			<div class="form-group col-md-12 col-xs-12">
		    				<label class="control-label col-md-3 col-xs-3" >Login :</label>
		    				<div class="col-md-8 col-xs-8">
		    					<input class="form-control" type="text" name="login" id="login" value=<?php echo $_SESSION['login'];?>
>
		    				</div>
		    			</div>
		    			
		    			<div class="form-group col-md-12 col-xs-12">
		    				<div class="form col-md-offset-8">
		    					<button type="submit" class="btn btn-default" >Modifier</button>
		    				</div>
		    			</div>
	    			</form>
	            </div>
	            
	            <div class="col-md-6">
	            	<label class="control-label" >Historique des achats :</label>
					<ul>
						<a href="REF PRODUIT ?"><li id="commande1">Commande n°5123 : 2 biere HK</li></a>
						<a href="REF PRODUIT ?"><li id="commande2">Commande n°4189 : 4 biere Hoegaarden</li></a>
						<a href="REF PRODUIT ?"><li id="commande3">Commande n°1233 : 2 biere Méteor</li></a>
					</ul>
	            </div>
            </div>
            <div class="row">
	            <div class="col-md-6">
	            	<label class="control-label col-md-offset-1" >Adresse de livraison :</label>
	            	<ul class="col-md-offset-1">
						<li>Adresse : <?php echo $_SESSION['adresse'];?>
</li>
						<li>Code postal : <?php echo $_SESSION['cp'];?>
</li>
						<li>Ville : <?php echo $_SESSION['ville'];?>
</li>
						<li>Pays : <?php echo $_SESSION['pays'];?>
</li>
					</ul>
	            </div>	
	            <div class="col-md-6">
	            	<label class="control-label col-md-offset-1" >Adresse de facturation :</label>
	            	<ul class="col-md-offset-1">
						<li>Adresse : <?php echo $_SESSION['adresse'];?>
</li>
						<li>Code postal : <?php echo $_SESSION['cp'];?>
</li>
						<li>Ville : <?php echo $_SESSION['ville'];?>
</li>
						<li>Pays : <?php echo $_SESSION['pays'];?>
</li>
					</ul>
	            </div>	
            </div>
		</div>	
<?php
}
}
/* {/block "zone_travail"} */
}
