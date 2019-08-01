<?php
/**
 *
 pke1=*/

class Attaque
{


  private $intensite;
  private $defense;
  private $experience;
  private $niveau;



  function __construct( $Intensite, $Defense,$Experience,$Niveau)

  {

 $this->intensite=$Intensite;
 $this->experience=$Experience;
 $this->defense=$Defense;
 $this->niveau=$Niveau;

}
  public function degat(){

  $degat = (($this->niveau *0.4+2)*$this->intensite*$this->experience) /($this->defense*50 )+2;

  return ceil ($degat);
  }


}

 ?>
