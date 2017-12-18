<?php
/* Smarty version 3.1.31, created on 2017-12-18 16:39:16
  from "/home/ubuntu/workspace/templates/produit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a37ef3457bf73_16210556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba760550809cff7db31190bf3f3906ce1d9e3ee9' => 
    array (
      0 => '/home/ubuntu/workspace/templates/produit.tpl',
      1 => 1513615149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a37ef3457bf73_16210556 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5103931835a37ef3450cf93_65514762', "titre");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3688249125a37ef34511a67_67076138', "zone_travail");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_978289405a37ef3456cda9_02361456', "javascript");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/masterPage.tpl");
}
/* {block "titre"} */
class Block_5103931835a37ef3450cf93_65514762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre' => 
  array (
    0 => 'Block_5103931835a37ef3450cf93_65514762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Recherche
<?php
}
}
/* {/block "titre"} */
/* {block "zone_travail"} */
class Block_3688249125a37ef34511a67_67076138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'zone_travail' => 
  array (
    0 => 'Block_3688249125a37ef34511a67_67076138',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if (!empty($_smarty_tpl->tpl_vars['productList']->value)) {?>
        <h1 class="col-md-offset-2"><u>Catalogue</u></h1>
        </br>
        <!-- http://formvalidation.io/examples/bootstrap-combobox/ -->
        <?php if (!empty($_smarty_tpl->tpl_vars['lesCategories']->value)) {?>
        <div class="form-group col-md-12">
            <!--<label style="color: white" class="col-md-offset-7 col-md-1 control-label">Catégorie :</label>-->
            <div class="col-md-offset-8 col-md-2 selectContainer">
                <select class="form-control" name="size"  onchange="hiddenCategorie(this.value)">
                    <option value="">Toutes</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lesCategories']->value, 'categorie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categorie']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['categorie']->value->getLibelle();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value->getLibelle();?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </select>
            </div>
        </div>
        <?php }?>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>        
            <div class="col-md-12 article-container c_<?php echo $_smarty_tpl->tpl_vars['product']->value->getCategorie()->getLibelle();?>
" id="">
                <div class="col-md-offset-2 col-md-3">
                    <img class="logo-article img-rounded" src="<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value->getLibelle();?>
">
                </div>
                <div class="col-md-5 text-article">
                    <h2><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['product']->value->getLibelle(), 'UTF-8');?>
</h2>
                    
                    <ul class="list-group">
                        <li class="list-group-item"><b>Description : </b><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</li>
                        <li class="list-group-item"><b>Categorie : </b><?php echo $_smarty_tpl->tpl_vars['product']->value->getCategorie()->getLibelle();?>
</li>
                        <li class="list-group-item"><b>Prix HT : </b><?php echo round($_smarty_tpl->tpl_vars['product']->value->getPrixHT(),3);?>
 €</li>
                        <li class="list-group-item"><b>Prix TTC : </b> <?php echo round($_smarty_tpl->tpl_vars['product']->value->getTauxTVA()->getTaux()*$_smarty_tpl->tpl_vars['product']->value->getPrixHT(),3);?>
 €</li>
                        <li class="list-group-item"><b>Référence : </b><?php echo $_smarty_tpl->tpl_vars['product']->value->getReference();?>
</li>
                    </ul>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getQuantiteStock() < 10) {?>
                        <b style="color: red;">Plus que <?php echo $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock();?>
 disponible !</b>
                    <?php } else { ?>
                        <b><?php echo $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock();?>
 produits disponible.</b>
                    <?php }?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock();?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock();?>
%">
                            <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['product']->value->getQuantiteStock();?>
% Complete (success)</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary popup" onclick="ajoutPanier(<?php echo $_smarty_tpl->tpl_vars['product']->value->getIdArticle();?>
)">Ajouter au panier</button>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        
    <?php } else { ?>
        <h3 class="text-center bigText">Désolé nous n'avons pas pu trouver l'article recherché</h3>
        <img class="img col-md-offset-3 img-rounded" style="max-width: 50%;" src="https://static.tumblr.com/836c445b33bfd896cc7e282085a6f6b9/lh7qkh1/b68oqkr7f/tumblr_static_4a4jdjgdnda800sk80gok0cs0.jpg">
    <?php }
}
}
/* {/block "zone_travail"} */
/* {block "javascript"} */
class Block_978289405a37ef3456cda9_02361456 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_978289405a37ef3456cda9_02361456',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
    function ajoutPanier(id){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'index.php',
            data: { page: "produit" ,action: "ajoutPanier", "id" : id },
            //data: { "/produit/ajoutPanier/id" },
            success: function (data){
                $("#nbPanier").text(data.nb);
                if(window.Notification && Notification.permission !== "denied") {
                	Notification.requestPermission(function(status) {  // status is "granted", if accepted by user
                		var n = new Notification('Produit ajouté', { 
                			body: 'Votre produit a bien été ajouté à votre panier',
                			icon: '/public/img/beer.ico'
                		}); 
                	});
                }
            },
            error: function(){
                if(window.Notification && Notification.permission !== "denied") {
                	Notification.requestPermission(function(status) {  // status is "granted", if accepted by user
                		var n = new Notification('Un erreur s\'est produite', { 
                			body: 'Une erreur s\'est produite, veuillez réessayer',
                			icon: '/public/img/beer.ico'
                		}); 
                	});
                }
            }
    });
    }
    
    function hiddenCategorie(value){
        switch(value){
            case "":
                $(".c_Blonde").show();
                $(".c_Brune").show();
                $(".c_Blanche").show();
                $(".c_Ambree").show();
                $(".c_Fruitee").show();
                $(".c_Coffret").show();
                $(".c_Divers").show();
                break;
            case "Blonde":
                $(".c_Blonde").show();
                $(".c_Brune").hide();
                $(".c_Blanche").hide();
                $(".c_Ambree").hide();
                $(".c_Fruitee").hide();
                $(".c_Coffret").hide();
                $(".c_Divers").hide();
                break;
            case "Brune":
                $(".c_Blonde").hide();
                $(".c_Brune").show();
                $(".c_Blanche").hide();
                $(".c_Ambree").hide();
                $(".c_Fruitee").hide();
                $(".c_Coffret").hide();
                $(".c_Divers").hide();
                break;
            case "Blanche":
                $(".c_Blonde").hide();
                $(".c_Brune").hide();
                $(".c_Blanche").show();
                $(".c_Ambree").hide();
                $(".c_Fruitee").hide();
                $(".c_Coffret").hide();
                $(".c_Divers").hide();  
                break;
            case "Ambree":
                $(".c_Blonde").hide();
                $(".c_Brune").hide();
                $(".c_Blanche").hide();
                $(".c_Ambree").show();
                $(".c_Fruitee").hide();
                $(".c_Coffret").hide();
                $(".c_Divers").hide();
                break;
            case "Fruitee":
                $(".c_Blonde").hide();
                $(".c_Brune").hide();
                $(".c_Blanche").hide();
                $(".c_Ambree").hide();
                $(".c_Fruitee").show();
                $(".c_Coffret").hide();
                $(".c_Divers").hide();
                break;
            case "Coffret":
                $(".c_Blonde").hide();
                $(".c_Brune").hide();
                $(".c_Blanche").hide();
                $(".c_Ambree").hide();
                $(".c_Fruitee").hide();
                $(".c_Coffret").show();
                $(".c_Divers").hide();
                break;
            case "Divers":
                $(".c_Blonde").hide();
                $(".c_Brune").hide();
                $(".c_Blanche").hide();
                $(".c_Ambree").hide();
                $(".c_Fruitee").hide();
                $(".c_Coffret").hide();
                $(".c_Divers").show();
                break;
        }
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "javascript"} */
}
