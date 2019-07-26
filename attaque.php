<?php
/**
 *
 */
class Attaque
{
  private $id_attaque;
  private $nom; //nom table attaques
  private $intensite;
  private $defense;
  private $point_vie;
  private $experience;
  private $niveau;


  function __construct( $intensite, $defense,$experience,$niveau)

  {

 $this-> $intesite;
 $this->$experience;
 $this->$defense;
 $this->$niveau;

}
  public function degat (){

  $degat = (($niveau *0.4+2)*$intensite*$puissance) /($defense*50 )+2;

  return ceil ($degat);
  }

  public function subirAttaque() {
          $this->degats += degat();

          //  les dégats superieur ou egal au point de vie => le personnage est tué
          if ($this->degats >= $point_vie) {
              return 'pokemon vaincu';
          }

          // Le personnage reçoit un coup
          return 'pokemon frappé';
      }
    /*  public function frapper(Personnage $perso)
 {
   if ($perso->id() == $this->id)
   {
     return "it's me";
   }
 }*/
 public function setId_attaque(){
   $this->id_attaque=$id_attaque;
 }
  public function setNom($nom){
    $this->nom= $nom;
  }

   public function setPuissance($puissance){
     $this->puissance = $puissance;
   }
   public function setPoint_vie(){
     $this->point_vie=$point_vie;
   }
   public function setIntensite(){
     $this->intensite=$intensite;

   }
   public function setDefense(){
     $this->defense=$defense;
   }
   public function setNiveau(){
     $this->niveau = $niveau;
   }
   public function getId_attaque(){
     return $this->id_attaque;
   }
   public function getName(){
     return $this->name;
   }
   public function getPuissance(){
     return $this->puissance;
   }
   public function getIntensite(){
     return $this->intensite;
   }
   public function getNiveau(){
     return $this->niveau;
   }
   public function getDefense(){
     return $this->defense;
   }
   public function getPoint_vie(){
     return $this->point_vie;
   }
 }

 ?>
