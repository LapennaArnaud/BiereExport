{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Panier
{/block}

{block name="zone_travail"}

{if !empty($productList)}
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
                {foreach $productList as $product}  
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{$product->getImage()}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">{$product->getLibelle()}</h4>
                                {if $product->getQuantiteStock() >= 20}
                                    <span>Status: </span><span class="text-success"><strong>En Stock</strong></span>
                                {elseif $product->getQuantiteStock() < 20 && $product->getQuantiteStock() >5}
                                    <span>Status: </span><span class="text-warning"><strong>Moins de 20 produits</strong></span>
                                {elseif $product->getQuantiteStock() < 5 && $product->getQuantiteStock() >=1}
                                    <span>Status: </span><span class="text-danger"><strong>Moins de 5 articles faites vite !</strong></span>
                                {/if}
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input disabled="disabled" type="text" class="form-control" id="number" value="{$panier[$product->getIdArticle()]}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{round($product->getTauxTVA()->getTaux()*$product->getPrixHT(),3)} €</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{round($product->getTauxTVA()->getTaux()*$product->getPrixHT(),3) * $panier[$product->getIdArticle()]} €</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger" id="removeProd" onclick="removePanier({$product->getIdArticle()})">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
    {/foreach}

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right" name="totalCommande"><h3><strong>{$smarty.session.totalPanier} €</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                         <a href="/produit/catalogue"><button type="button" class="btn btn-default" href="">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></a></td>
                        <td>
                        <form action="/produit/paiement" id="form-panier" role="form">
                            <button type="submit" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
{else}
         <h3 class="text-center bigText">Pas de produit</h3>
         <h4 class="text-center"><a href="/produit&action=catalogue">Pour ajouter des produits cliquez ici</a></h4>
{/if}


{/block}


{block name="javascript"}
<script>
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
    
    
    function plusPanier(id, value){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'index.php',
            data: { page: "produit" ,action: "plusPanier", "id" : id, "value" : value },
            success: function (data){
    
            },
            error: function(){
                
            }
        });
    }
</script>
{/block}