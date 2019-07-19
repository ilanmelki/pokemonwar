<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=pokemonwar;charset=utf8', 'root', 'ADRAR1112');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
$url= 'https://pokeapi.co/api/v2/pokemon/';



for($id=16; $id<=28; $id++){
  $data= file_get_contents($url.$id.'/');
  $viewjson= json_decode($data);
  $pokemonname=$viewjson->name;
  $pokemonhf=$viewjson->stats[5]->base_stat;
  $pokemonexp=$viewjson->base_experience;
  $req = $bdd->prepare('SELECT nom FROM pokemon WHERE nom=?');
  $req->execute(array($pokemonname));
  $resultatpokemon=$req->fetch();
  if(!$resultatpokemon){
    $req = $bdd->prepare('INSERT INTO pokemon (nom, experience, point_vie) VALUES(?,?,?)');
    $req->execute(array($pokemonname,$pokemonexp, $pokemonhf));
  }

  for($i=1; $i<=4; $i++){
    $attack= $viewjson->moves[$i]->move->name;
    echo $i.'<strong>e------ attaque</strong>:'.$attack. '<br>';
    $req = $bdd->prepare('SELECT nom FROM attaques WHERE nom=?');
    $req->execute(array($attack));
    $resultatattack=$req->fetch();
    if(!$resultatattack){
      $req = $bdd->prepare('INSERT INTO attaques (nom) VALUES(?)');
      $req->execute(array($attack));
    }
  }
}
?>
