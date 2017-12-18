<?php
/* Smarty version 3.1.31, created on 2017-12-11 13:48:15
  from "/home/ubuntu/workspace/templates/test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2e8c9fceb8c7_10068078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8d89ce2667ca6fb299a40074ba54a7fee7bd206' => 
    array (
      0 => '/home/ubuntu/workspace/templates/test.tpl',
      1 => 1513000090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2e8c9fceb8c7_10068078 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18462881345a2e8c9fce4e78_30944212', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7556128465a2e8c9fce9082_17962212', "zone_travail");
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_18462881345a2e8c9fce4e78_30944212 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_18462881345a2e8c9fce4e78_30944212',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Page de test
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_7556128465a2e8c9fce9082_17962212 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_7556128465a2e8c9fce9082_17962212',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "zone_travail"} */
}
