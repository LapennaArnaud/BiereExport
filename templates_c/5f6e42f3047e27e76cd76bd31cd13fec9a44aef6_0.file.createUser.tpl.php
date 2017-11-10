<?php
/* Smarty version 3.1.31, created on 2017-10-26 13:37:45
  from "/home/ubuntu/workspace/templates/createUser.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f1e5293d6f98_82638492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f6e42f3047e27e76cd76bd31cd13fec9a44aef6' => 
    array (
      0 => '/home/ubuntu/workspace/templates/createUser.tpl',
      1 => 1509025062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f1e5293d6f98_82638492 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<div id="form-container" class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="form-title-div">
		<h2 class="text-center">Création Utilisateur</h2>
	</div>
	
	<div class="col-md-1"></div>
		<form class="form-horizontal col-md-9" id="form-user" role="form">
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
				<label class="control-label col-md-3" >Mot de passe :</label>
				<div class="col-md-9">
					<input class="form-control" type="password" name="password" id="password" >
				</div>
			</div>
			
			<div class="form-group col-md-12">
				<label class="control-label col-md-3" >Confirmation Mot de passe :</label>
				<div class="col-md-9">
					<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" >
				</div>
			</div>
									
				<div class="form col-xs-6">
					<button type="submit" class="btn btn-default" >Valider</button>
				</div>
			</div>
	</form>
</div><?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "./masterPage.tpl");
}
}
