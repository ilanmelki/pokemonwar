<?php
/**
 *
 */
class Attaque
{

  private $nom; //nom table attaques
  private $intensite;//intensité de l'attaque
  private $defense;//defense pokemon attaqué
  private $point_vie;
  private $experience;//expperience pokemon attaquant
  private $niveau;//niveau pokemon attaquant
  private $degats;


  function __construct( $Intensite, $Defense,$Experience,$Niveau)

  {

 $this->setIntensite($Intensite)
 $this->setExperience($Experience);
 $this->setDefense($Defense);
 $this->setNiveau($Niveau);

}
  public function degat (){ // fonction qui permet de calculer le nombre de degat subit par le pokemon attaqué

  $degat = (($this->niveau *0.4+2)*$this->intensite*$this->experience) /($this->defense*50 )+2;

  return ceil ($degat);
  }

  /*public function subirAttaque() { // fonction qui incremente et montre le niveau de degats au cours du combat
          $this->degats += degat();

          //  les dégats superieur ou egal au point de vie => le personnage est tué
          if ($this->degats >= $this->point_vie) {
              return 'pokemon vaincu';
          }

          // Le personnage reçoit un coup
          return 'pokemon frappé';
      }*/
    /*   public function memeattaque(){
         if ($attack1 = $attack2){
           $this->$degats = degat()/2;
         }

       }*/
  public function setNom($nom){
    $this->nom= $nom;
  }

   public function setPuissance($puissance){
     $this->puissance = $puissance;
   }
   public function setPoint_vie($point_vie){
     $this->point_vie=$point_vie;
   }  /*  public function frapper(Personnage $perso)
 {
   if ($perso->id() == $this->id)
   {
     return "it's me";
   }
 }*/

   public function setIntensite($intensite){
     $this->intensite=$intensite;

   }
   public function setDefense($defense){
     $this->defense=$defense;
   }
   public function setNiveau($niveau){
     $this->niveau = $niveau;
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
