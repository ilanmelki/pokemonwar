<?php
class Battle
{
  private $dresseur1;
  private $dresseur2;
  private $pokemon1;
  private $degatPokemon1;
  private $hp1;
  private $pokemon2;
  private $degatPokemon2;
    private $hp2;
  public function __construct($dress1,$dress2,$pok1,$pok2){
    $this->setDresseur1($dress1);
    $this->setDresseur2($dress2);
    $this->setPokemon($pok1);
    $this->setPokemon($pok2);
  }
  public function setDresseur1($dress)
  {
    $this->dresseur1 = $dress;
  }
  public function setDresseur2($dress)
  {
    $this->dresseur1 = $dress;
  }
  public function setPokemon1($pok1)
  {
    $this->$pokemon1 = $pok1;
  }
  public function setPokemon2(pok2)
  {
    $this->$pokemon2 = $pok2;
  }
  function lose(){
    if($this->$degatPokemon1>$hp1){
      return this->pokemon1. 'a perdu';
    }elseif ($this->$degatPokemon2>$hp2) {
      return this->pokemon2. 'a perdu';
    }
  }
  function strike($degatPokemon){
    if($this->lose()){
      echo"combat terminé";
    }else{
      this->degat += 5;
    }
  }


}
?>
