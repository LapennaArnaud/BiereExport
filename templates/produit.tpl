{extends file="../templates/masterPage.tpl"}

{block name="titre"}
Recherche
{/block}

{block name="zone_travail"}
    {if !empty($productList)}
        <h1 class="col-md-offset-2"><u>Catalogue</u></h1>
        </br>
        <!-- http://formvalidation.io/examples/bootstrap-combobox/ -->
        {if !empty($lesCategories)}
        <div class="form-group col-md-12">
            <!--<label style="color: white" class="col-md-offset-7 col-md-1 control-label">Catégorie :</label>-->
            <div class="col-md-offset-8 col-md-2 selectContainer">
                <select class="form-control" name="size"  onchange="hiddenCategorie(this.value)">
                    <option value="">Toutes</option>
                    {foreach $lesCategories as $categorie}
                        <option value="{$categorie->getLibelle()}">{$categorie->getLibelle()}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        {/if}
        
        {foreach $productList as $product}        
            <div class="col-md-12 article-container c_{$product->getCategorie()->getLibelle()}" id="">
                <div class="col-md-offset-2 col-md-3">
                    <img class="logo-article img-rounded" src="{$product->getImage()}" alt="{$product->getLibelle()}">
                </div>
                <div class="col-md-5 text-article">
                    <h2>{$product->getLibelle()|upper}</h2>
                    
                    <ul class="list-group">
                        <li class="list-group-item"><b>Description : </b>{$product->getDescription()}</li>
                        <li class="list-group-item"><b>Categorie : </b>{$product->getCategorie()->getLibelle()}</li>
                        <li class="list-group-item"><b>Prix HT : </b>{round($product->getPrixHT(), 3)} €</li>
                        <li class="list-group-item"><b>Prix TTC : </b> {round($product->getTauxTVA()->getTaux()*$product->getPrixHT(),3)} €</li>
                        <li class="list-group-item"><b>Référence : </b>{$product->getReference()}</li>
                    </ul>
                    {if $product->getQuantiteStock() < 10}
                        <b style="color: red;">Plus que {$product->getQuantiteStock()} disponible !</b>
                    {else}
                        <b>{$product->getQuantiteStock()} produits disponible.</b>
                    {/if}
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{$product->getQuantiteStock()}" aria-valuemin="0" aria-valuemax="100" style="width: {$product->getQuantiteStock()}%">
                            <span class="sr-only">{$product->getQuantiteStock()}% Complete (success)</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary popup" onclick="ajoutPanier({$product->getIdArticle()})">Ajouter au panier</button>
                </div>
            </div>
        {/foreach}
        
    {else}
        <h3 class="text-center bigText">Désolé nous n'avons pas pu trouver l'article recherché</h3>
        <img class="img col-md-offset-3 img-rounded" style="max-width: 50%;" src="https://static.tumblr.com/836c445b33bfd896cc7e282085a6f6b9/lh7qkh1/b68oqkr7f/tumblr_static_4a4jdjgdnda800sk80gok0cs0.jpg">
    {/if}
{/block}


{block name="javascript"}
<script>
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
</script>
{/block}

