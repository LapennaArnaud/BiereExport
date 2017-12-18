<?php
/* Smarty version 3.1.31, created on 2017-12-16 08:46:13
  from "/home/ubuntu/workspace/templates/masterPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a34dd5521efc5_38082672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abefa864862466fa283a3da79ef2a9f7f356bf6b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/masterPage.tpl',
      1 => 1513413876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a34dd5521efc5_38082672 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13777597535a34dd551ee123_32564727', "titre");
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
					<li><a href="/produit&action=catalogue.html"><span class="glyphicon glyphicon-book"></span> Catalogue</a></li>
					<li><a href="/produit&action=panier.html"><span class="glyphicon glyphicon-shopping-cart"></span> Panier<span class = "badge" id="nbPanier"><?php echo $_SESSION['nbArticle'];?>
</span></a></li>
					
					<?php if (isset($_SESSION['login'])) {?>
						<li><a href="/utilisateur/infoClient.html"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['login'];?>
</a></li>
						<li><a href="/utilisateur/logOut.html" id="logout"><span class="glyphicon glyphicon-remove"></span> Log out</a></li>
					<?php } else { ?>
						<li><a href="/utilisateur/sign_up.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="/utilisateur/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php }?>
				</ul>
				<!--<form class="navbar-form navbar-right" method="post" action="?page=articleController&action=produit">-->
				<form class="navbar-form navbar-right" method="post" action="/produit/produit.html">
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20352394345a34dd5520a893_04397527', "zone_travail");
?>

	</div>

	<footer>
		<p>© 2017Développé par <a style="color:#0a93a6; text-decoration:none;" href="https://giphy.com/gifs/l2Jhx6TQ6P3WAnv8c/html5"> Julien Groll</a> et <a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Arnaud LAPENNA</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="/utils/info.html">Contactez-nous</a></p>
	</footer>
</body>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3576061415a34dd5520ee77_03363211', "script");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8888766415a34dd55214143_93624695', "masterScript");
?>


</html>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8007071295a34dd55219d17_47245961', "javascript");
}
/* {block "titre"} */
class Block_13777597535a34dd551ee123_32564727 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_13777597535a34dd551ee123_32564727',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_20352394345a34dd5520a893_04397527 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_20352394345a34dd5520a893_04397527',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_3576061415a34dd5520ee77_03363211 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3576061415a34dd5520ee77_03363211',
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
class Block_8888766415a34dd55214143_93624695 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'masterScript' => 
  array (
    0 => 'Block_8888766415a34dd55214143_93624695',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>

    $(function() {

        $('#logout').click(function() {
        	$('#menuBar').load('maj2.html', function() {
      		});
        });  
      });
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "masterScript"} */
/* {block "javascript"} */
class Block_8007071295a34dd55219d17_47245961 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_8007071295a34dd55219d17_47245961',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "javascript"} */
}
