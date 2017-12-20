<?php
/* Smarty version 3.1.31, created on 2017-12-19 19:27:30
  from "/home/ubuntu/workspace/templates/masterPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a396822e1bbe0_77406463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abefa864862466fa283a3da79ef2a9f7f356bf6b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/masterPage.tpl',
      1 => 1513711646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a396822e1bbe0_77406463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14117627065a396822def5e5_30999268', "titre");
?>
</title>
	<link rel="icon" href="../public/img/beer.ico" />
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/carousel.css" >
	<link rel="stylesheet" type="text/css" href="../public/css/style.css" >
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-datepicker.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<a class="navbar-brand hidden-xs" href="/index.php">
					<img src=../public/img/icon-beer.png height=75 >
				</a>
				<ul class="nav navbar-nav navbar-right" id="menuBar">
					<li><a href="/produit&action=catalogue"><span class="glyphicon glyphicon-book"></span> Catalogue</a></li>
					<li><a href="/produit&action=panier"><span class="glyphicon glyphicon-shopping-cart"></span> Panier<span class = "badge" id="nbPanier"><?php echo $_SESSION['nbArticle'];?>
</span></a></li>
					
					<?php if (isset($_SESSION['login'])) {?>
						<li><a href="/utilisateur/infoClient"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login'];?>
</a></li>
						<li><a href="/utilisateur/logOut" id="logout"><span class="glyphicon glyphicon-remove"></span> Log out</a></li>
					<?php } else { ?>
						<li><a href="/utilisateur/sign_up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="/utilisateur/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php }?>
				</ul>
				<!--<form class="navbar-form navbar-right" method="post" action="?page=articleController&action=produit">-->
				<form class="navbar-form navbar-right" method="post" action="/produit/produit">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="recherche" id="recherche">
						<div class="input-group-btn">
				  			<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
				  			</button>
						</div>
			  		</div>
				</form>
			</div>
		</nav>
	</header>
	<div>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10508045065a396822e08aa5_03459295', "zone_travail");
?>

	</div>

	<footer>
		<p>© 2017Développé par <a style="color:#0a93a6; text-decoration:none;" href="https://giphy.com/gifs/l2Jhx6TQ6P3WAnv8c/html5"> Julien Groll</a> et <a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Arnaud LAPENNA</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="/utils/info">Contactez-nous</a></p>
	</footer>
</body>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8948813285a396822e0cde2_15779844', "script");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3107971325a396822e12235_03601313', "masterScript");
?>


</html>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17412088265a396822e17158_26124795', "javascript");
}
/* {block "titre"} */
class Block_14117627065a396822def5e5_30999268 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_14117627065a396822def5e5_30999268',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_10508045065a396822e08aa5_03459295 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_10508045065a396822e08aa5_03459295',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_8948813285a396822e0cde2_15779844 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_8948813285a396822e0cde2_15779844',
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
	<?php echo '<script'; ?>
 type="text/javascript" src="../public/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
/* {block "masterScript"} */
class Block_3107971325a396822e12235_03601313 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'masterScript' => 
  array (
    0 => 'Block_3107971325a396822e12235_03601313',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
//script liée à la masterpage si besoin d'execution
//exemple utilisation de requette sur le menubar
    $(function() {
        $('#logout').click(function() {
        	
        });
      });
      
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "masterScript"} */
/* {block "javascript"} */
class Block_17412088265a396822e17158_26124795 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_17412088265a396822e17158_26124795',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "javascript"} */
}
