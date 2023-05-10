<?php
    $at_id = $_POST["at_id"];
    $mysqli = new mysqli('localhost', 'zle_braer', '2hs33ki6', 'zfl2-zle_braer_2');
    if ($mysqli->connect_errno) {
      // Affichage d'un message d'erreur
      echo "Error: Problème de connexion à la BDD \n";
      echo "Errno: " . $mysqli->connect_errno . "\n";
      echo "Error: " . $mysqli->connect_error . "\n";
      // Arrêt du chargement de la page
      exit();
    }
    if (!$mysqli->set_charset("utf8")) {
      printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
      exit();
    }
    $requete = 'DELETE FROM t_ressource_rsc WHERE at_id="'.$at_id.'"';
    $requete2 = 'DELETE FROM t_atelier_at WHERE at_id="'.$at_id.'"';
    $result = $mysqli->query($requete);
    $result2 = $mysqli->query($requete2);
    if ($result == false or $result2 == false) //Erreur lors de l’exécution de la requête
    { // La requête a echoué
      echo "Error: La requête a echoué \n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit();
    } else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
    {
      header("Location:admin_atelier.php");
    }
?>