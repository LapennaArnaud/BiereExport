<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$emailPersonne = $_POST['email'];
$sujet = $_POST['titre'];
$message = $_POST['message'];

$mailDestinataire ="julien.groll@gmail.com";



echo $nom;

mail("$mailDestinataire","$sujet","$message");
?>