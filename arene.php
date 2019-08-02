
<html>
  <head>
    <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="arenestyle.css">
  </head>
    <body>
    <div class="pokewar" > <img src="pokewar-1.png" alt=""> </div>
    <div class="container">
      <div class="pokeicon1" > <img src="pokeicon.png" alt=""> </div>
      <div class="pokeicon2" > <img src="pokeicon.png" alt=""> </div>
       <div class="arene"> <img src="arene_psy-1.png" alt="arene">
      </div>


      <div id="pokemonback"><?php echo $pokemonselected->getBackimg(); ?><div class="none" id="attack1"><img src="attacks/attack1.gif"></div></div>



      <div id="pokemonface"><?php echo $pokemonopponent->getFrontimg(); ?><div class="none" id="attack2"><img src="attacks/attack2.gif"></div></div>


      <div class="cadreattack"> <img src="combatpokemon.gif" alt="">

            <div class="button">

                <form action="exitcombat.php"  method="post">
                        <div class="exit"><input type="submit" class="btn1" name="exit" value="sortir du combat">
                        </form></div>

                <form method="post" action="main.php">

                  <div class="none">
                  <input type="text" name="pokemon" value='<?php echo $_POST['pokemon']; ?> '>
                  <input type="text" name="dresseur" value='<?php echo $_POST['dresseur'];?>'></div>

                   <div ><input type="submit" class="btn1" name="attackbutton" value="<?php echo $attacks[0]; ?>" >
                   <input type="submit" class="btn1" name="attackbutton" value="<?php echo $attacks[1]; ?>"></div>
                   <div ><input type="submit" class="btn1" name="attackbutton" value="<?php echo $attacks[2]; ?>">
                   <input type="submit" class="btn1" name="attackbutton" value="<?php echo $attacks[3]; ?>"></div>
                </form>
            </div>
      </div>

   </div>



    </body>

</html>
