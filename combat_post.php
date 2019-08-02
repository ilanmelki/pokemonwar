<?php
require_once('attaque.php');
require_once('mybattle.php');
//recuperer les valeur des degats sur le fichier text
$currentBattle = fopen('degatcombat.txt', 'r+');
$damage_tab = explode(" ", fgets($currentBattle));
$degatpok1= intval($damage_tab[0]);
$degatpok2=intval($damage_tab[1]);

fseek($currentBattle, 0);
fclose($currentBattle);
//on cree l'objet combat
$combat = new Battle($pokemonline['nom'], $degatpok1,$pokemonline['point_vie'],$pokemonline['experience'], $poklineopp['nom'], $degatpok2,$poklineopp['point_vie'],$poklineopp['experience']);

//on entame le traitement des attaques postées
$i=0;
if(isset($_POST['attackbutton'])){
      //recuperer la cle du l'attaque pour recuprer l'intensite
      while($_POST['attackbutton']!== $attacks[$i]){
            $i++;
      }
      //construire l'objet attaque choisi
      $attackpok1= new Attaque($intensite[$i], $poklineopp['defense'], $pokemonline['experience'], $pokemonline['niveau']);
      //calculer les degat de l attaque sur le pokemon adverse
      $suddenDamagepok2=$attackpok1->degat();
      //incrementer les dagats du pokemon adverse
      $combat->recevoirdegat2($suddenDamagepok2);
      ?>
              <script type="text/javascript">
                    var $imgpok1= document.getElementById('attack1');
                    $imgpok1.classList.remove('none');
                    setTimeout(function(){ $imgpok1.classList.add("none"); }, 500);
                    var $imgpok2= document.getElementById('attack2');
                    $imgpok2.classList.remove('none');
                    setTimeout(function(){ $imgpok2.classList.add("none"); }, 500);

            </script>
      <?php
      // redefinir degatpok2 qui sera stocker des .txt jusqu'a la prochaine attaque
      if($combat->getDegatpok2()!=="GAGNE"){
          $degatpok2=$combat->getDegatpok2();
      }else{
        $degatpok2=$poklineopp['point_vie'];
      }
      //choisir un numero d'attaque adverse au hasard
      $pokoppattack = array(0, 1, 2,3);
      $rand_keysAttack = array_rand($pokoppattack, 1);
      $id_attackopp=$pokoppattack[$rand_keysAttack];
      //construire l'objet attaque adverse
      $attackpok2= new Attaque($intensiteOpp[$i], $pokemonline['defense'], $poklineopp['experience'], $poklineopp['niveau']);
      //calculer les degats sur notre pokemon
      $suddenDamagepok1=$attackpok2->degat();
      //incrementer les degat de notre pokemon1
      $combat->recevoirdegat1($suddenDamagepok1);
      //redefinir  degatpok1 qui sera stocker dans .txt jusqu'a la prochaine attaque
      if($combat->getDegatpok1()!=="PERDU"){
          $degatpok1=$combat->getDegatpok1();
      }else{
          $degatpok1=$pokemonline['point_vie'];
      }



      //deux variable qui affiche l'evolution de la vie des deux pokemon lors des combats
      $suddenlife1=ceil(((intval($pokemonline['point_vie'])-intval($degatpok1))/intval($pokemonline['point_vie']))*100);
      $suddenlife2=ceil(((intval($poklineopp['point_vie'])-intval($degatpok2))/intval($poklineopp['point_vie']))*100);
      echo '<label for="file">Vie restante pokemon de ton pokemon:</label>
       <progress id="file" max="100" value="'.$suddenlife1.'">'.$suddenlife1.'%</progress>';
      echo '<label for="file">Vie restante pokemon adverse:</label>
       <progress id="file" max="100" value="'.$suddenlife2.'">'.$suddenlife2.'%</progress>';


            //si notre pokemon gagne executer JS
if($combat->getDegatpok2()=="GAGNE"){
  $qt= $bdd->prepare('INSERT INTO combat(pokemon_choisi, hp_pokemon_choisi, exp_pokemon_choisi, degat_pokemon_choisi, pokemon_adverse, hp_pokemon_adverse, exp_pokemon_adverse, degat_pokemon_adverse)
                    VALUES (?,?,?,?,?,?,?,?)');
  $qt->execute(array($pokemonline['nom'], $pokemonline['point_vie'],$pokemonline['experience'], $suddenlife1,$poklineopp['nom'], $poklineopp['point_vie'],$poklineopp['experience'],$suddenlife2));
  ?>
                      <script type="text/javascript">
                            var $container= document.getElementsByClassName('container');
                            var $body= document.getElementsByTagName('body');
                            var $arene= document.getElementsByClassName('arene');
                            var $pok2= document.getElementById('pokemonface');
                            var $pok1= document.getElementById('pokemonback');
                            var $bouton= document.getElementsByClassName('cadreattack');
                            $bouton[0].style.display="none";
                            $pok2.style.display="none";
                            $pok1.style.display="none";
                            $arene[0].style.display="none";
                            var img=document.createElement("img");
                            img.src="dance1.gif";
                            img.id="win";
                            var perdant=$body[0].appendChild(img)
                            if ( confirm( "tu as gagné" ) ) {
                              document.location.href="exitcombat.php";
                          }else{
                            document.location.href="exitcombat.php";
                          }
                      </script>
<?php
            //si notre pokemon perd executer JS

}else if($combat->getDegatpok1()=="PERDU"){
  $qt= $bdd->prepare('INSERT INTO combat(pokemon_choisi, hp_pokemon_choisi, exp_pokemon_choisi, degat_pokemon_choisi, pokemon_adverse, hp_pokemon_adverse, exp_pokemon_adverse, degat_pokemon_adverse)
                    VALUES (?,?,?,?,?,?,?,?)');
  $qt->execute(array($pokemonline['nom'], $pokemonline['point_vie'],$pokemonline['experience'], $suddenlife1,$poklineopp['nom'], $poklineopp['point_vie'],$poklineopp['experience'],$suddenlife2));
  ?>
                            <script type="text/javascript">
                            var $container= document.getElementsByClassName('container');
                            var $bouton= document.getElementsByClassName('cadreattack');
                            var $body= document.getElementsByTagName('body');
                            var $arene= document.getElementsByClassName('arene');
                            var $pok2= document.getElementById('pokemonface');
                            var $pok1= document.getElementById('pokemonback');
                            $pok2.style.display="none";
                            $pok1.style.display="none";
                            $bouton[0].style.display="none";
                            $arene[0].style.display="none";
                            var img=document.createElement("img");
                            img.src="teamrocket2.gif";
                            img.id="lose";
                            var perdant=$body[0].appendChild(img);
                            if ( confirm( "tu as perdu" ) ) {
                              document.location.href="exitcombat.php";
                          }else{
                            document.location.href="exitcombat.php";
                          }
                            </script>
  <?php
}
          //inserer les nouvelles valeur des dagat dans le fichier txt
          $damage_tabPost=array($degatpok1,$degatpok2);
          $currentBattle = fopen('degatcombat.txt', 'r+');
          $stringPost = implode(" ", $damage_tabPost);
          ftruncate($currentBattle, 0);
          fputs($currentBattle, $stringPost);
          fclose($currentBattle);

}
 ?>
