<?php

session_start(); 
$nom = $_SESSION['u.nom'];
if(isset($_SESSION['u.nom']))
{
    echo '<p>'.'Bienvenue a vous '.$nom.'<p>';
    
}
else
{
     echo '<p>'.'ca marche pas '.'<p>';
}


?>