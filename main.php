<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=pokemonwar;charset=utf8', 'root', 'ADRAR1112');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
if(isset($_POST['pokemon'])){
  //requete obtenir la ligne de tableau pokemon
  $req = $bdd->prepare('SELECT * FROM pokemon WHERE nom=?');
  $req->execute(array($_POST['pokemon']));
  $pokemonline=$req->fetch();
  echo 'les caracteristiques du pokemon: '. '<br>';
  echo 'nom :'. $pokemonline['nom'].'<br>' ;
  echo 'vie :'.$pokemonline['point_vie'].'<br>' ;
  echo 'defense :'.$pokemonline['defense'].'<br>' ;
  echo 'experience :'.$pokemonline['experience'].'<br>' ;
  echo 'niveau :'.$pokemonline['niveau'].'<br>' ;
}
if(isset($pokemonline['id_pokemon'])){
  //requete recuperer les id des attaque de ce pokemon
  $reqattaque = $bdd->prepare('SELECT fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=?');
  $reqattaque->execute(array($pokemonline['id_pokemon']));
echo 'les attaques du pokemon:' .'<br>';
  while ($pokemonattaque = $reqattaque->fetch()){

    $reqname = $bdd->prepare('SELECT nom, intensite FROM attaques WHERE id_attaque=?');
    $reqname->execute(array($pokemonattaque['fk_id_attaque']));
    $attaquename = $reqname->fetch();
    echo $pokemonattaque['fk_id_attaque'].' ' . $attaquename['nom'].' '.$attaquename['intensite'].'<br>';
}
}

 ?>
