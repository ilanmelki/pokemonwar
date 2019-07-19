<?php
  // creation class du combat
 class Combat
 {
   private $_idCombat;
   private $_idDresseur1;
   private $_idDresseur2;
   private $_pokemon1;
   private $_pokemon2;
   private $_degatPokemon1;
   private $_degatPokemon2;
   private $_expPokemon1;
   private $_expPokemon2;


  public function __construct()


  public function gagnerExperience()
  {
    /
    $this->_expPokemon1++;
    $this->_expPokemon2++;

  }


  public function idCombat()
  {
    return $this->_idCombat;
  }


  public function idDresseur1()
  {
    return $this->_idDresseur1;
  }

  public function idDresseur2()
  {
    return $this->_idDresseur2;
  }


  public function experience()
  {
    return $this->_experience;
  }

 }


 ?>
