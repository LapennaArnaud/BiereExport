<?php
/* Smarty version 3.1.31, created on 2017-12-18 13:00:35
  from "/home/ubuntu/workspace/templates/createUser.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37bbf3a89741_12364881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '008f98428d2fe357817d46159aae9b1b629f336b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/createUser.tpl',
      1 => 1513594715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37bbf3a89741_12364881 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7949092985a37bbf3a642c4_33732265', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21340482145a37bbf3a6e911_93014437', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20976816355a37bbf3a7fc41_85748024', "javascript");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_7949092985a37bbf3a642c4_33732265 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_7949092985a37bbf3a642c4_33732265',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Création de l'utilisateur
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_21340482145a37bbf3a6e911_93014437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_21340482145a37bbf3a6e911_93014437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
    	<div id="form-title-div">
    		<h2 class="text-center">Création Utilisateur</h2>
    	</div>
    	
    	<div class="col-md-1"></div>
    		<form method="POST" action="/utilisateur/validationCreationCompte.html" class="form-horizontal col-md-9" id="form-user" role="form">
    			<div class="row">
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3">Nom :</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="nom" id="nom" >
    				</div>
    			</div>
    
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Prenom:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="prenom" id="prenom" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Adresse:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="adresse" id="adresse" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Code Postal:</label>
    				<div class="col-md-9">
    					<input class="form-control" name="cp" id="cp" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Ville:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="ville" id="ville" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Pays:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="pays" id="pays" >
    				</div>
    			</div>
    			
     			<div class="form-group col-md-12 ">
    				<label class="control-label col-md-3" >Date de naissance:</label>
    				<div class="col-md-9 ">
    					<div class="input-group date datepicker datepicker-input" id='datepicker'>
    						<input class="form-control" name="date" id="date"/>
    						<span class="input-group-addon">
    							<span class="glyphicon glyphicon-calendar "></span>
    						</span>
    					</div>
    				</div>
    			</div>
    		
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Email :</label>
    				<div class="col-md-9">
    					<input class="form-control" type="email" name="email" id="email" >
    				</div>
    			</div>
    			
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Login:</label>
    				<div class="col-md-9">
    					<input class="form-control" type="text" name="login" id="login" >
    				</div>
    			</div>
    				
    			<div class="form-group col-md-12">
    				<label class="control-label col-md-3" >Mot de passe :</label>
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
    									
    				<div class="form col-md-offset-6 col-xs-offset-5">
    					<button type="submit" class="btn btn-default" >Valider</button>
    				</div>
    			</div>
    	</form>
    </div>
<?php
}
}
/* {/block "zone_travail"} */
/* {block "javascript"} */
class Block_20976816355a37bbf3a7fc41_85748024 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_20976816355a37bbf3a7fc41_85748024',
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
        
    	$('#form-user').validate({
    		rules: validateRules
    	})
    	
    	$(".datepicker").datepicker({
    		format : "dd/mm/yyyy",
    		language : "fr",
    	})
    	
    	$('#datepicker').datepicker('setDate', new Date(1990, 0, 1));
    	$('#datepicker').datepicker('update'); 
    
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "javascript"} */
}
