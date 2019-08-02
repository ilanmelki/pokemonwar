<?php
//recuprer les dimensions de l'image dans un fichier image.txt
$counter = fopen('compteur.txt', 'r+');
$tab_counter = explode(" ", fgets($counter));
//fputs($counter, "200");

$compteur = intval($tab_counter[0]);//premiere valeur sera le compteur

fclose($counter);
require_once('mypokemon.php');
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

}
//recuperer les attaques du pokemons
if(isset($pokemonline['id_pokemon'])){
  //requete recuperer les id des attaque de ce pokemon
      $reqattaque = $bdd->prepare('SELECT fk_id_attaque FROM pokemonattaque WHERE fk_id_pokemon=?');

      $reqattaque->execute(array($pokemonline['id_pokemon']));
      //un tableau pour recuperer les nom des 4 attaques
      $attacks=[];
      $intensite=[];
      while ($pokemonattaque = $reqattaque->fetch()){
//REQUETE RECUPRER LE NOM DE L ATTAQUE ET LE STOCKER DANS UN TABLEAU
            $reqname = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');

            $reqname->execute(array($pokemonattaque['fk_id_attaque']));

            $attaquename = $reqname->fetch();
            $intensite[]=$attaquename['intensite'];
            //table qui stocke les noms des attaque des pokemon.
            $attacks[]=$attaquename['nom'];
        }
      $pokemonselected= new Pokemon($pokemonline['id_pokemon'], $pokemonline['nom'], $pokemonline['defense'], $attacks, $pokemonline['niveau'], $pokemonline['point_vie'], $pokemonline['image_devant'], $pokemonline['image_derriere']);
}





//requete dresseur
if(isset($_POST['dresseur'])){
      $reqdresseur = $bdd->prepare('SELECT * FROM dresseur WHERE nom=?');

      $reqdresseur->execute(array($_POST['dresseur']));

      $datadresseur=$reqdresseur->fetch();
}






if((isset($_POST['dresseur']))AND($_POST['dresseur']=="sacha")) {

      $reqopponent = $bdd->query('SELECT * FROM dresseur WHERE nom="Barbara"');
      $dataopponent=$reqopponent->fetch();

      if($compteur==0){//condition pour garder le pok opp

            $pokopp = array(6, 8, 12);
            $rand_keys = array_rand($pokopp, 1);
            $id_pokopp=$pokopp[$rand_keys];
            $compteur++;
            //apres random on enregistre le id du pokemon dans le fichier text
            $counter = fopen('compteur.txt', 'r+');
            $tab_idpok= array($compteur,$id_pokopp);
            //un nouveau tableau contenant les nouvelles valeur
            $newvalue = implode(" ", $tab_idpok);
            fseek($counter, 0);
            fputs($counter, $newvalue);
            fclose($counter);
      }
      //au prochain appel recuperer le id du fichier text et eviter le random
      $counter = fopen('compteur.txt', 'r+');
      $tab_counter = explode(" ", fgets($counter));
      //fputs($counter, "200");
      $id_pokopp= intval($tab_counter[1]);//

      fseek($counter, 0);
      fclose($counter);
//il me reste a reinitialiser les valeurs du compteur et id a la fin du combat.
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
            $intensiteOpp=[];
            while ($pokemonattackopp = $reqattackopp->fetch()){
          //REQUETE RECUPRER LE NOM DE L echo "test";ATTAQUE ET LE STOCKER DANS UN TABLEAU
                  $reqnameopp = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');

                  $reqnameopp->execute(array($pokemonattackopp['fk_id_attaque']));
                  $attaquenameopp = $reqnameopp->fetch();
                  //table qui stocke les noms des attaque des pokemon adverse.
                  $attacksopp[]=$attaquenameopp['nom'];
                  $intensiteOpp[]=$attaquenameopp['intensite'];
                }
              }
      $pokemonopponent= new Pokemon($poklineopp['id_pokemon'], $poklineopp['nom'], $poklineopp['defense'], $attacksopp, $poklineopp['niveau'], $poklineopp['point_vie'], $poklineopp['image_devant'], $poklineopp['image_derriere']);
}









else if((isset($_POST['dresseur']))AND($_POST['dresseur']=="barbara")){
      $reqopponent = $bdd->query('SELECT * FROM dresseur WHERE nom="Sacha"');

      $dataopponent=$reqopponent->fetch();
      if($compteur==0){//condition pour garder le pok opp

            $pokopp = array(1, 4, 10);
            $rand_keys = array_rand($pokopp, 1);
            $id_pokopp=$pokopp[$rand_keys];
            $compteur++;
            //apres random on enregistre le id du pokemon dans le fichier text
            $counter = fopen('compteur.txt', 'r+');
            $tab_idpok= array($compteur,$id_pokopp);
            //un nouveau tableau contenant les nouvelles valeur
            $newvalue = implode(" ", $tab_idpok);
            fseek($counter, 0);
            fputs($counter, $newvalue);
            fclose($counter);
      }
      //au prochain appel recuperer le id du fichier text et eviter le random
      $counter = fopen('compteur.txt', 'r+');
      $tab_counter = explode(" ", fgets($counter));
      //fputs($counter, "200");
      $id_pokopp= intval($tab_counter[1]);//

      fseek($counter, 0);
      fclose($counter);


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
            $intensiteOpp=[];
            while ($pokemonattackopp = $reqattackopp->fetch()){
              //REQUETE RECUPRER LE NOM DE L ATTAQUE ET LE STOCKER DANS UN TABLEAU
                  $reqnameopp = $bdd->prepare('SELECT * FROM attaques WHERE id_attaque=?');

                  $reqnameopp->execute(array($pokemonattackopp['fk_id_attaque']));

                  $attaquenameopp = $reqnameopp->fetch();
                  //table qui stocke les nomsecho "test"; des attaque des pokemon adverse.
                  $attacksopp[]=$attaquenameopp['nom'];
                  $intensiteOpp[]=$attaquenameopp['intensite'];
                }
              }
      $pokemonopponent= new Pokemon($poklineopp['id_pokemon'], $poklineopp['nom'], $poklineopp['defense'], $attacksopp, $poklineopp['niveau'], $poklineopp['point_vie'], $poklineopp['image_devant'], $poklineopp['image_derriere']);
}






require_once('arene.php');
require_once('combat_post.php');

 ?>
