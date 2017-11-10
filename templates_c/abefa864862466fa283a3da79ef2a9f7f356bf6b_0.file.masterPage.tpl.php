<?php
/* Smarty version 3.1.31, created on 2017-11-09 14:50:11
  from "/home/ubuntu/workspace/templates/masterPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a046b23730112_12839981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abefa864862466fa283a3da79ef2a9f7f356bf6b' => 
    array (
      0 => '/home/ubuntu/workspace/templates/masterPage.tpl',
      1 => 1510239009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a046b23730112_12839981 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1142875315a046b2371bb57_87609560', "titre");
?>
</title>
	<link rel="icon" href="../public/img/beer.ico" />
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
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
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
					<li><a href="../?page=createUser"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="../?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
				<form class="navbar-form navbar-right">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18932117195a046b23722a28_85439413', "zone_travail");
?>

	</div>

		<footer>
			<p>© 2017<a style="color:#0a93a6; text-decoration:none;" href="https://media.tenor.com/images/b2e51e8b2ba5770d97650ae5aa4959b1/tenor.gif"> Développé par Julien Groll et Arnaud LAPENNA (lol)</a>, All rights reserved 2016-2017.   <a style="color:#0a93a6; text-decoration:none;" href="#">Contactez-nous</a></p>
		</footer>
	</body>
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21253855705a046b237281f9_93681693', "script");
?>

</html>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8060409945a046b2372bfe1_32968605', "javascript");
}
/* {block "titre"} */
class Block_1142875315a046b2371bb57_87609560 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_1142875315a046b2371bb57_87609560',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_18932117195a046b23722a28_85439413 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_18932117195a046b23722a28_85439413',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block "zone_travail"} */
/* {block "script"} */
class Block_21253855705a046b237281f9_93681693 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_21253855705a046b237281f9_93681693',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block "script"} */
/* {block "javascript"} */
class Block_8060409945a046b2372bfe1_32968605 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_8060409945a046b2372bfe1_32968605',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "javascript"} */
}
