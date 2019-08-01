<?php
$counter = fopen('compteur.txt', 'r+');//
ftruncate($counter, 0);

fputs($counter, "0");
fclose($counter);
$battleend = fopen('degatcombat.txt', 'r+');//
ftruncate($battleend, 0);

fputs($battleend, "0 0");
fclose($battleend);
require_once('choixdresseurs.php');
?>
