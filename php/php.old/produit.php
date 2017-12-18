<?php

$recherche = $_POST['recherche'];

$selectedArticle = ArticleQuery::create()
	->find();
$selectedCategorie = CategorieQuery::create()
    ->find();
    
$nb=1;

foreach($selectedArticle as $selectedArticle) {
    $temp = $selectedArticle->getLibelle();
    if (strtolower($recherche)== strtolower($temp)){
        $description = $selectedArticle->getDescription();
        $image = $selectedArticle->getImage();
        $prix = $selectedArticle->getPrixHT();
        
        //Pour arrondir le nombre number_format
        $prix = number_format($prix, 2, ',', ' ');
        $nb=0;
        break;
    }else{
        $nb=1;
    }
}

foreach($selectedCategorie as $selectedCategorie) {
    $temp = $selectedCategorie->getLibelle();
    if (strtolower($recherche)== strtolower($temp)){
        
    }else{
        
    }
}

$smarty->assign ("prix", $prix);
$smarty->assign ("image", $image);
$smarty->assign ("description", $description);
$smarty->assign ("recherche", $recherche);
$smarty->assign ("nb",$nb);
$smarty->display('../templates/produit.tpl');
?>