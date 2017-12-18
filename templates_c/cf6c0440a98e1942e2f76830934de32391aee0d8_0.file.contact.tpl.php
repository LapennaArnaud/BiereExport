<?php
/* Smarty version 3.1.31, created on 2017-12-18 14:45:01
  from "/home/ubuntu/workspace/templates/contact.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37d46e00e162_10763031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf6c0440a98e1942e2f76830934de32391aee0d8' => 
    array (
      0 => '/home/ubuntu/workspace/templates/contact.tpl',
      1 => 1513586845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37d46e00e162_10763031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10810717255a37d46e003d50_30055282', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6864587315a37d46e008552_13293336', "zone_travail");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_10810717255a37d46e003d50_30055282 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_10810717255a37d46e003d50_30055282',
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
class Block_6864587315a37d46e008552_13293336 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_6864587315a37d46e008552_13293336',
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
