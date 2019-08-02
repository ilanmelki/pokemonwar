<?php
class Pokemon
{
  private  $id;
  private  $name;
  private  $defense;
  private  $attaques;
  private  $level;
  private  $evolution;
  private  $hp;
  private  $frontimg;
  private  $backimg;
  public function __construct(  $Id,  $Name,  $Defense, $Attaques,  $Level,  $Hp,  $Frontimg,  $Backimg){
    $this->setId( $Id);
    $this->setName($Name);
    $this->setDefense($Defense);
    $this->setLevel($Level);
    $this->setHp($Hp);
    $this->setAttaque($Attaques);
    $this->setFrontimg($Frontimg);
    $this->setBackimg($Backimg);
  }
  public function getId(){
    return $this->id;
  }
  public function getName(){
    return $this->name;
  }

  public function getDefense(){
    return $this->defense;
  }

  public function getlevel(){
    return $this->level;
  }
  public function getAttaques($i){
    if (($i>0)&&($i<5)){
      return $this->attaque[$i-1];
    }
  }
  public function getHp(){
    return $this->hp;
  }
  public function getFrontimg(){
    return $this->frontimg='<img src=\''.$this->frontimg.'\'/>';

  }
  public function getBackimg(){
    return $this->backimg='<img src=\''.$this->backimg.'\'/>';

  }
  public function setId($Id){
    $this->id=$Id;

  }
  public function setName( $Name){
    $this->name=$Name;
  }
  public function setDefense( $Defense){
    $this->defense=$Defense;
  }
  public function setLevel( $Level){
    $this->level=$Level;
  }
  public function setEvolution( $Evolution){
    $this->evolution=$Evolution;
  }
  public function setHp($Hp){
    $this->hp=$Hp;
  }
  public function setAttaque( $Attaques){
    $this->attaques=$Attaques;
  }
  public function setFrontimg($Frontimg){
    $this->frontimg=$Frontimg;
  }
  public function setBackimg($Backimg){
    $this->backimg=$Backimg;

  }
}
 ?>
