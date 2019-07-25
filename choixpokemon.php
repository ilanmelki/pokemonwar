<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="dresseur.css">
        <title>Titre</title>
    </head>

    <body>
        <div class="container">
<?php

if(isset($_POST['dresseur'])AND($_POST['dresseur']=="sacha")){
echo ' <form method="post" action="main.php">
   <p> vous avez choisi '.$_POST['dresseur'] .' choisissez un de ses pokemons pour commencer:</p>
       <div class="form">
       <div class="none"><input type="text" name="dresseur" value='.$_POST['dresseur']. '></div>
         <div class="choix"><input type="radio" name="pokemon" value="pikachu"/><label>Pikachu</label><img src="images/pikachu.png" alt="pikachu"/> </div>
         <div class="choix"><input type="radio" name="pokemon"value="pidgey"/><label>Pidgey</label><img src="images/pidgey.png" alt="pidgey"/> </div>
         <div class="choix"><input type="radio" name="pokemon"value="rattata"/><label>Rattata</label> <img src="images/rattata.png" alt="rattata"/></div>
       </div>
       <input type="submit" value="valider" class="submit envoyer"/>

</form>';
}
if(isset($_POST['dresseur'])AND($_POST['dresseur']=="barbara")){
echo '<form method="post" action="main.php">
   <p> vous avez choisi '.$_POST['dresseur'] .' choisissez un de ses pokemons pour commencer :</p>
       <div class="form">
       <div class="none"><input type="text" name="dresseur" value='.$_POST['dresseur']. '></div>
         <div class="choix"><input type="radio" name="pokemon" value="Spearow"/><label>Spearow</label> <img src="images/spearow.png" alt="spearow"/></div>
         <div class="choix"><input type="radio" name="pokemon" value="ekans"/><label>Ekans</label><img src="images/ekans.png" alt="ekans"/> </div>
         <div class="choix"><input type="radio" name="pokemon" value="sandshrew"/><label>Sandshrew</label><img src="images/sandshrew.png" alt="sandshrow"/> </div>
       </div>
       <input type="submit" value="valider" class="submit envoyer"/>

</form>';
}
 ?>
</div>
</body>
</html>
