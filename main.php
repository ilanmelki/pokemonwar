<?php
require_once('mypokemon.php');
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=pokemonwar;charset=utf8', 'root', 'ADRAR1112');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
echo $_POST['dresseur'];
if(isset($_POST['pokemon'])){
  //requete obtenir la ligne de tableau pokemon
  $req = $bdd->prepare('SELECT * FROM pokemon WHERE nom=?');
  $req->execute(array($_POST['pokemon']));
  $pokemonline=$req->fetch();

}
//recuperer les attaques du pokemons
if(isset($pokemonline['id_pokemon'])){
  //requete recuperer les id des attaque de ce pokemon
  $reqattaque = $bdd->prepare('SELECT fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=?');
  $reqattaque->execute(array($pokemonline['id_pokemon']));
  //un tableau pour recuperer les nom des 4 attaques
  $attacks=[];
  while ($pokemonattaque = $reqattaque->fetch()){
//REQUETE RECUPRER LE NOM DE L ATTAQUE ET LE STOCKER DANS UN TABLEAU
    $reqname = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');
    $reqname->execute(array($pokemonattaque['fk_id_attaque']));
    $attaquename = $reqname->fetch();
    //table qui stocke les noms des attaque des pokemon.
    $attacks[]=$attaquename['nom'];
}
}
//requete dresseur
$reqdresseur = $bdd->prepare('SELECT * FROM dresseur WHERE nom=?');
$reqdresseur->execute(array($_POST['dresseur']));
$datadresseur=$reqdresseur->fetch();
if($_POST['dresseur']=="sacha"){
  $reqopponent = $bdd->query('SELECT * FROM dresseur WHERE nom="Barbara"');
  $dataopponent=$reqopponent->fetch();
  $pokopp = array(6, 8, 12);
  $rand_keys = array_rand($pokopp, 1);
  $id_pokopp=$pokopp[$rand_keys];
  $reqpokopp=$bdd->prepare('SELECT * FROM pokemon WHERE id_pokemon=?');
  $reqpokopp->execute(array($id_pokopp));
  $poklineopp=$reqpokopp->fetch();
  //gerer les attaques
  if(isset($poklineopp['id_pokemon'])){
    //requete recuperer les id des attaque de ce pokemon auto
    $reqattackopp = $bdd->prepare('SELECT fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=?');
    $reqattackopp->execute(array($poklineopp['id_pokemon']));
    //un tableau pour recuperer les nom des 4 attaques du pokemon auto
    $attacksopp=[];
    while ($pokemonattackopp = $reqattackopp->fetch()){
  //REQUETE RECUPRER LE NOM DE L echo "test";ATTAQUE ET LE STOCKER DANS UN TABLEAU
      $reqnameopp = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');
      $reqnameopp->execute(array($pokemonattackopp['fk_id_attaque']));
      $attaquenameopp = $reqnameopp->fetch();
      //table qui stocke les noms des attaque des pokemon adverse.
      $attacksopp[]=$attaquenameopp['nom'];
}
}
}
else if($_POST['dresseur']=="barbara"){
  $reqopponent = $bdd->query('SELECT * FROM dresseur WHERE nom="Sacha"');
  $dataopponent=$reqopponent->fetch();
  $pokopp = array(1, 4, 10);
  $rand_keys = array_rand($pokopp, 1);
  $id_pokopp=$pokopp[$rand_keys];
  $reqpokopp=$bdd->prepare('SELECT * FROM pokemon WHERE id_pokemon=?');
  $reqpokopp->execute(array($id_pokopp));
  $poklineopp=$reqpokopp->fetch();
  //gerer les attaques
  if(isset($poklineopp['id_pokemon'])){
    //requete recuperer les id des attaque de ce pokemon auto
    $reqattackopp = $bdd->prepare('SELECT fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=?');
    $reqattackopp->execute(array($poklineopp['id_pokemon']));
    //un tableau pour recuperer les nom des 4 attaques du pokemon auto
    $attacksopp=[];
    while ($pokemonattackopp = $reqattackopp->fetch()){
  //REQUETE RECUPRER LE NOM DE L ATTAQUE ET LE STOCKER DANS UN TABLEAU
      $reqnameopp = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');
      $reqnameopp->execute(array($pokemonattackopp['fk_id_attaque']));
      $attaquenameopp = $reqnameopp->fetch();
      //table qui stocke les nomsecho "test"; des attaque des pokemon adverse.
      $attacksopp[]=$attaquenameopp['nom'];
}
}
}
$pokemonselected= new Pokemon($pokemonline['id_pokemon'], $pokemonline['nom'], $pokemonline['defense'], $attacks, $pokemonline['niveau'], $pokemonline['point_vie'], $pokemonline['image_devant'], $pokemonline['image_derriere']);
$pokemonopponent= new Pokemon($poklineopp['id_pokemon'], $poklineopp['nom'], $poklineopp['defense'], $attacksopp, $poklineopp['niveau'], $poklineopp['point_vie'], $poklineopp['image_devant'], $poklineopp['image_derriere']);;
echo $pokemonselected->getBackimg();
echo $pokemonopponent->getFrontimg();
header('Location: arene.php');
 ?>
