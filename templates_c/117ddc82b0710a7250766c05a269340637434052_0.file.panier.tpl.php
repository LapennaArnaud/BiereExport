<?php
/* Smarty version 3.1.31, created on 2017-12-18 15:15:01
  from "/home/ubuntu/workspace/templates/panier.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37db75b12ac6_35203244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '117ddc82b0710a7250766c05a269340637434052' => 
    array (
      0 => '/home/ubuntu/workspace/templates/panier.tpl',
      1 => 1513609449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37db75b12ac6_35203244 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3476580385a37db75a8d104_31885312', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10262284845a37db75a944e2_63997277', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6334279395a37db75b0d697_26513203', "javascript");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_3476580385a37db75a8d104_31885312 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_3476580385a37db75a8d104_31885312',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Panier
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_10262284845a37db75a944e2_63997277 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_10262284845a37db75a944e2_63997277',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if (!empty($_smarty_tpl->tpl_vars['productList']->value)) {?>
        <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1 text-article">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix unitaire TTC</th>
                        <th class="text-center">Prix total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>   
    
    <!--    <div class="col-md-12 article-container">
            <div class="col-md-offset-2 col-md-2" >
                <img class="logo-panier img-rounded" src="<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value->getLibelle();?>
">
            </div>
            <div class="text-article">
                <h2 class="col-md-2"><?php echo $_smarty_tpl->tpl_vars['product']->value->getLibelle();?>
</h2>
            
                <h4 class="col-md-2"><b>Prix TTC : </b><?php echo round($_smarty_tpl->tpl_vars['product']->value->getTauxTVA()->getTaux()*$_smarty_tpl->tpl_vars['product']->value->getPrixHT(),3);?>
 €</h4>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger " onclick="/produit/transaction.html">x</button>
                </div>
                
            </div>
        </div>-->
        
        
        

                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['product']->value->getLibelle();?>
</h4>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() >= 20) {?>
                                    <span>Status: </span><span class="text-success"><strong>En Stock</strong></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() < 20 && $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() > 5) {?>
                                    <span>Status: </span><span class="text-warning"><strong>Moins de 20 produits</strong></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() < 5 && $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() >= 1) {?>
                                    <span>Status: </span><span class="text-danger"><strong>Moins de 5 articles faites vite !</strong></span>
                                <?php }?>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input disabled="disabled" type="text" class="form-control" id="number" value="<?php echo $_smarty_tpl->tpl_vars['panier']->value[$_smarty_tpl->tpl_vars['product']->value->getIdArticle()];?>
">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo round($_smarty_tpl->tpl_vars['product']->value->getTauxTVA()->getTaux()*$_smarty_tpl->tpl_vars['product']->value->getPrixHT(),3);?>
 €</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo round($_smarty_tpl->tpl_vars['product']->value->getTauxTVA()->getTaux()*$_smarty_tpl->tpl_vars['product']->value->getPrixHT(),3)*$_smarty_tpl->tpl_vars['panier']->value[$_smarty_tpl->tpl_vars['product']->value->getIdArticle()];?>
 €</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger" id="removeProd" onclick="removePanier(<?php echo $_smarty_tpl->tpl_vars['product']->value->getIdArticle();?>
)">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>




                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right" name="totalCommande"><h3><strong><?php echo $_SESSION['totalPanier'];?>
 €</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                         <a href="/produit/catalogue.html"><button type="button" class="btn btn-default" href="">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></a></td>
                        <td>
                        <form method="post" action="/produit/paiement.html"id="form-panier" role="form">
                            <button type="submit" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
         <h3 class="text-center bigText">Pas de produit</h3>
         <h4 class="text-center"><a href="/produit&action=catalogue.html">Pour ajouter des produits cliquez ici</a></h4>
<?php }?>


<?php
}
}
/* {/block "zone_travail"} */
/* {block "javascript"} */
class Block_6334279395a37db75b0d697_26513203 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_6334279395a37db75b0d697_26513203',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
    function removePanier(id){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'index.php',
            data: { page: "produit", action: "removePanier", "id" : id },
            success: function (data){
                $("#nbPanier").text(data.nb);
                window.location.reload();
            },
            error: function(){
                alert('bug');
            }
        });
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "javascript"} */
}
