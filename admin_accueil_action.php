<?php
    $cpt_pseudo = $_POST["cpt_pseudo"];
    $mysqli = new mysqli('localhost', 'root', '', 'padlet');
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
    $requete = "SELECT pfl_validite FROM t_profil_pfl WHERE cpt_pseudo = '" .$cpt_pseudo. "';";
    $result = $mysqli->query($requete);
    if ($result == false) //Erreur lors de l’exécution de la requête
    { // La requête a echoué
      echo "Error: La requête a echoué \n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit();
    } else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
    {
      $pfl = $result->fetch_assoc();
      if($pfl['pfl_validite']=='A'){
        $requete2 = "UPDATE t_profil_pfl SET pfl_validite = 'D' WHERE cpt_pseudo = '" .$cpt_pseudo. "';";
        if ($result == false) //Erreur lors de l’exécution de la requête
        { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
        }else{$mysqli->query($requete2);}
      }else{
        $requete2 = "UPDATE t_profil_pfl SET pfl_validite = 'A' WHERE cpt_pseudo = '" .$cpt_pseudo. "';";
        if ($result == false) //Erreur lors de l’exécution de la requête
        { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
        }else{$mysqli->query($requete2);}
      }
      header("Location:admin_accueil.php");
    }
?>