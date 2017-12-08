<?php
/* Smarty version 3.1.31, created on 2017-12-08 10:08:44
  from "/home/ubuntu/workspace/templates/masterPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2a64ac2bc640_22756648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abefa864862466fa283a3da79ef2a9f7f356bf6b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/masterPage.tpl',
      1 => 1512727721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2a64ac2bc640_22756648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15674307925a2a64ac2a27d1_88754858', "titre");
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
				<a class="navbar-brand" href="index.php" >
					<img src=../public/img/icon-beer.png height=75 >
				</a>
				<?php if (isset($_SESSION['login'])) {?>
				Bienvenue : <?php echo $_SESSION['login'];?>

				<?php }?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../?page=articleController&action=catalogue"><span class="glyphicon glyphicon-book"></span> Catalogue</a></li>
					<li><a href="../?page=articleController&action=panier"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
					<li><a href="../?page=clientController&action=sign_up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="../?page=clientController&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
				<form class="navbar-form navbar-right" method="post" action="?page=articleController&action=produit">
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1421377045a2a64ac2b1940_39462159', "zone_travail");
?>

	</div>

	<footer>
		<p>© 2017Développé par <a style="color:#0a93a6; text-decoration:none;" href="https://giphy.com/gifs/l2Jhx6TQ6P3WAnv8c/html5"> Julien Groll</a> et <a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Arnaud LAPENNA</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="../?page=utilsController&action=info">Contactez-nous</a></p>
	</footer>
</body>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8161176325a2a64ac2b5588_40357984', "script");
?>

</html>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2354370195a2a64ac2b89f2_24786493', "javascript");
}
/* {block "titre"} */
class Block_15674307925a2a64ac2a27d1_88754858 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_15674307925a2a64ac2a27d1_88754858',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_1421377045a2a64ac2b1940_39462159 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_1421377045a2a64ac2b1940_39462159',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_8161176325a2a64ac2b5588_40357984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_8161176325a2a64ac2b5588_40357984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
/* {block "javascript"} */
class Block_2354370195a2a64ac2b89f2_24786493 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_2354370195a2a64ac2b89f2_24786493',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "javascript"} */
}
