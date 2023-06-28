<?php
session_start();
    if ($_POST["pseudo"] && $_POST["mdp"]){
        $id=$_POST["pseudo"];
        $motdepasse=$_POST["mdp"];
    }else{
        echo "Pseudo/mot de passe manquant";
    }
    $mysqli = new mysqli('localhost', 'root', '', 'padlet');
    if ($mysqli->connect_errno) {
        echo "Error: Problème de connexion à la BDD \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        // Arrêt du chargement de la page
        exit();
    }

    $sql="SELECT cpt_pseudo,cpt_mot_de_passe FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_pseudo) WHERE cpt_pseudo='" . $id . "' AND cpt_mot_de_passe=MD5('" . $motdepasse . "') AND pfl_validite = 'A';";
    echo($sql);

    $resultat = $mysqli->query($sql);
    if ($resultat==false) {
        echo "Error: Problème d'accès à la base \n";
        exit();
    }
    if($resultat->num_rows == 1) {
        //Mise à jour des données de la session
        $_SESSION['login']=$id;
        $user = $resultat->fetch_assoc();
        header("Location:admin_accueil.php");
    }
    else{
        // aucune ligne retournée
        // => le compte n'existe pas ou n'est pas valide
        header("Location:session.php");
    }
    //Fermeture de la communication avec la base MariaDB
    $mysqli->close();
?>