<?php
//Recuperation variables form-login
$login = $_POST['login'];
$password = $_POST['password'];


$nb=4;
$selClient = ClientQuery::create()
    ->find();
//Pour chaque Client getLogin
foreach($selClient as $selClient) {
	$temp_login = $selClient->getLogin();
	echo $temp_login;
	$temp_pass = $selClient->getPass();
	echo $temp_pass;
	if ($login==$temp_login AND $password==$temp_pass){
		$nb=1;
		break;
	}else{
		$nb=0;
	}
}

echo $nb;


$smarty->assign ("nb",$nb);
$smarty->display('../templates/accueil.tpl');	

?>