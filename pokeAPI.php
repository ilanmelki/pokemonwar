<?php
//se connecter a la BDD
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=pokemonwar;charset=utf8', 'root', 'ADRAR1112');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
//url de l'API
$url= 'https://pokeapi.co/api/v2/pokemon/';



for($id=16; $id<=28; $id++){
  //selectionner les pokemon dont id entre 16 et 28
  $data= file_get_contents($url.$id.'/');
  $viewjson= json_decode($data);
  //recuperer le nom du pokemon
  $pokemonname=$viewjson->name;
  //recuperer les point de vie du pokemon
  $pokemonhf=$viewjson->stats[5]->base_stat;
  //recuperer les l'experience
  $pokemonexp=$viewjson->base_experience;
  //verifier que le nom du pokemon n'existe pas dans la BDD
  $req = $bdd->prepare('SELECT nom FROM pokemon WHERE nom=?');
  $req->execute(array($pokemonname));
  $resultatpokemon=$req->fetch();

  if(!$resultatpokemon){
    //si le nom n'existe pas on l'ajoute au tableau pokemon
    $req = $bdd->prepare('INSERT INTO pokemon (nom, experience, point_vie) VALUES(?,?,?)');
    $req->execute(array($pokemonname,$pokemonexp, $pokemonhf));
  }

  for($i=1; $i<=4; $i++){
    //recuperer 4 attaques par pokemon
    $attack= $viewjson->moves[$i]->move->name;
    //recuperer id des pok et attaques
    $req = $bdd->prepare('SELECT id_pokemon FROM pokemon WHERE nom=?');
    $req->execute(array($pokemonname));
    $resultatidpokemon=$req->fetch();
    $req = $bdd->prepare('SELECT id_attaque FROM attaques WHERE nom=?');
    $req->execute(array($attack));
    $resultatidattack=$req->fetch();
    $resultatidpokemon['id_pokemon'];
    $resultatidattack['id_attaque'];
    //recuperer les clés etrangeres du pokemonattaque
    $req = $bdd->prepare('SELECT fk_id_pokemon, fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=? AND fk_id_attaque=? ' );
    $req->execute(array($resultatidpokemon['id_pokemon'], $resultatidattack['id_attaque']));
    $resultatfkexist=$req->fetch();
    if(!$resultatfkexist){
      $req = $bdd->prepare('INSERT INTO pokemonattaque (fk_id_pokemon, fk_id_attaque) VALUES(?,?)');
      $req->execute(array($resultatidpokemon['id_pokemon'], $resultatidattack['id_attaque']));
    }

    //verifier si le nom de l'attaque existe dans le tableau attaque
    $req = $bdd->prepare('SELECT nom FROM attaques WHERE nom=?');
    $req->execute(array($attack));
    $resultatattack=$req->fetch();
    if(!$resultatattack){
      //ajouter l'attque si elle n'existe pas dans le tableau attaques
      $req = $bdd->prepare('INSERT INTO attaques (nom) VALUES(?)');
      $req->execute(array($attack));
    }

  }


}
?>
