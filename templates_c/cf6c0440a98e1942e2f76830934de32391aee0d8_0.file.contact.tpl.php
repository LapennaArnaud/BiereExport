<?php
/* Smarty version 3.1.31, created on 2017-12-12 07:46:42
  from "/home/ubuntu/workspace/templates/contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2f8962e91b96_42164170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf6c0440a98e1942e2f76830934de32391aee0d8' => 
    array (
      0 => '/home/ubuntu/workspace/templates/contact.tpl',
      1 => 1512919431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2f8962e91b96_42164170 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4305181435a2f8962e88b11_90856095', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11646686395a2f8962e8c7a4_80046755', "zone_travail");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_4305181435a2f8962e88b11_90856095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_4305181435a2f8962e88b11_90856095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Contact
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_11646686395a2f8962e8c7a4_80046755 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_11646686395a2f8962e8c7a4_80046755',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
	    <h2 class="text-center">Contactez-nous</h2>
        <form method="POST" action="?page=mail" class="form-horizontal col-md-offset-1 col-xs-offset-1 col-md-9 col-xs-9" id="form-contact" role="form">
			<div class="form-group col-md-12">
				<label class="control-label col-md-3">Nom :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="nom" id="nom" >
				</div>
			</div>

			<div class="form-group col-md-12">
				<label class="control-label col-md-3" >Prenom :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="prenom" id="prenom" >
				</div>
		    </div>
		    
		    <div class="form-group col-md-12">
    			<label class="control-label col-md-3" >Email :</label>
    			<div class="col-md-9">
    				<input class="form-control" type="email" name="email" id="email" >
    			</div>
    		</div>
    		
		    <div class="form-group col-md-12">
				<label class="control-label col-md-3" >Titre :</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="titre" id="titre" >
				</div>
		    </div>
    		
    		<div class="form-group col-md-12">
    			<label class="control-label col-md-3" >Message :</label>
    			<div class="col-md-9">
    				<textarea class="form-control" type="text" rows="5" name="message" id="message"></textarea>
    			</div>
    		</div>
    		
	    	<div class="form col-md-offset-6">
				<button type="submit" class="btn btn-default" >Envoyer</button>
			</div>
    		
        </form>
    </div>
</div>


<?php
}
}
/* {/block "zone_travail"} */
}
