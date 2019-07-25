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
    <form method="post" action="choixpokemon.php" >
      <p>choisissez un dresseur :</p>
      <div class="form">
        <div class="choix" id="sacha"><label>SACHA</label><input type="radio" name= "dresseur" value="sacha" /> <img src="https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/images/sacha.png" alt="sacha"/></div>
        <div class="choix"><label>BARBARA</label><input type="radio" name= "dresseur" value="barbara"/> <img src="https://raw.githubusercontent.com/ilanmelki/pokemonwar/developpement/images/barbara.png" alt="barbara"/></div>
      </div>
      <input type="submit" value="valider" class="submit"/>

    </form>
  </div>
</body>
</html>
