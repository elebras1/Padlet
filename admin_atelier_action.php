<?php
session_start();
if(!isset($_SESSION['login']))
{
  header("Location:session.php");
}
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
//echo ("Connexion BDD réussie !");
$requete = "SELECT * FROM t_configuration_conf;";
$result1 = $mysqli->query($requete);
    if ($result1 == false) {
      //Erreur lors de l’exécution de la requête
      // La requête a echoué
      echo "Error: La requête a echoué \n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit();
    }
    $conf = $result1->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Brest course à pied</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="css/stylelog.scss" rel="stylesheet" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="index.php">
        <span>
          BCAP
        </span>
      </a>
    </div>
    <!-- end header section -->
  </div>
  <!-- nav section -->
  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link">ESPACE ADMINISTRATION</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="admin_accueil.php">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="admin_atelier.php">Gestion ateliers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->
  <section class="contact_section layout_padding">
    <div class="heading_container">
      <hr>
      <h2>
        Gestion atelier
      </h2>
    </div>
    <div class="container">
      </br>
      
      <?php
          // LISTE ATELIER
          $requete = "SELECT pad_intitule, at_id, at_intitule, GROUP_CONCAT( DISTINCT rsc_titre SEPARATOR ', ') as rsc_titre, GROUP_CONCAT( DISTINCT cpt_pseudo SEPARATOR ', ') as animateurs FROM t_ressource_rsc RIGHT JOIN t_atelier_at USING(at_id) RIGHT JOIN t_pad_pad USING(pad_id) LEFT JOIN t_animation_an USING(pad_id) JOIN t_compte_cpt USING(cpt_pseudo) JOIN t_profil_pfl USING(cpt_pseudo) GROUP BY at_id ORDER BY at_date DESC;";
          //$requete = "SELECT pad_intitule, at_id, at_intitule, rsc_titre, GROUP_CONCAT( DISTINCT cpt_pseudo SEPARATOR ', ') as animateurs FROM t_ressource_rsc RIGHT JOIN t_atelier_at USING(at_id) RIGHT JOIN t_pad_pad USING(pad_id) JOIN t_animation_an USING(pad_id) JOIN t_compte_cpt USING(cpt_pseudo) JOIN t_profil_pfl USING(cpt_pseudo) GROUP BY at_id, rsc_id  ORDER BY at_date DESC;";
          //echo($requete);
          $result = $mysqli->query($requete);
          if ($result == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
              echo "Error: La requête a echoué \n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit();
              } else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
              {
              echo('<div class="table-responsive">');
              echo ('<table class="table table-striped table-bordered"><tr><th>Pad</th><th>Animateurs</th><th>Atelier</th><th>Ressources</th><th>Supprimer atelier</th></tr>');
              while ($res = $result->fetch_assoc()) {
                  echo ('<tr>');
                  echo ('<td>' . $res['pad_intitule'] . '</td><td>'.$res['animateurs'].'</td><td>'.$res['at_intitule'].'</td><td>'.$res['rsc_titre'].'</td>');
                  echo('<td><form action="admin_atelier_action_dlt.php" method="post">');
                  echo('<input name="at_id" type="hidden" value="'.$res['at_id'].'"/>');
                  echo('<input type="submit" value="Supprimer"/></form></td>');
                  echo ('</tr>');
          }
              echo ('</table>');
              echo('</div>');
            }
        ?>
      </br>
    </div class="container">
    <section class="contact_section layout_padding">
      <div class="heading_container">
        <hr>
        <h2>
          Ajouter un atelier
        </h2>
      </div>
      <form action="admin_atelier_action.php" method="post" class="form">
        <?php
        $probleme = 0;
        $msg_erreur = "";
        if ($_POST['pad_id'] != "Choisir un pad"){
            $pad_id=$_POST['pad_id'];
        }else{
            $probleme++;
            $msg_erreur = $msg_erreur . "pad_id non selectionné ";
        }
        if ($_POST['intitule']){
            $intitule=htmlspecialchars(addslashes($_POST['intitule']));
        }else{
            $probleme++;
            $msg_erreur = $msg_erreur . "prenom vide ";
        }
        if ($_POST['description']){
            $description=htmlspecialchars(addslashes($_POST['description']));
        }else{
            $probleme++;
            $msg_erreur = $msg_erreur . "prenom vide ";
        }
        if ($_POST['etat']){
            $etat=htmlspecialchars(addslashes($_POST['etat']));
        }else{
            $probleme++;
            $msg_erreur = $msg_erreur . "etat vide ";
        }
        if($probleme > 0){
            if ($_POST['pad_id'] != "Choisir un pad"){
                echo '<input id="pad_id" name="pad_id" value="'.$pad_id.'" type="text" readonly>';
            }else{
                $requete = "SELECT pad_id, pad_intitule FROM t_pad_pad WHERE pad_etat = 'P';";
                $result2 = $mysqli->query($requete);
                if ($result2 == false) {
                //Erreur lors de l’exécution de la requête
                // La requête a echoué
                echo "Error: La requête a echoué \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
                }
                echo '<select id="pad_id" name="pad_id" class="form-select">';
                echo '<option selected>Choisir un pad</option>';
                while ($pad = $result2->fetch_assoc()) {
                    echo '<option value="'.$pad['pad_id'].'">'.$pad['pad_intitule'].'</option>';
                }
            }
            if ($_POST['intitule']){
                echo'<input id="intitule" name="intitule" value="'.$intitule.'" type="text" placeholder="INTITULE">';
            }else{
                echo'<input id="intitule" name="intitule" value="" type="text" placeholder="INTITULE">';
            }
            if ($_POST['description']){
                echo'<input id="description" name="description" value="'.$description.'" type="text" placeholder="DESCRIPTION">';
            }else{
                echo'<input id="description" name="description" value="" type="text" placeholder="DESCRIPTION">';
            }
            if ($_POST['etat']){
              echo'<input id="etat" name="etat" value="'.$etat.'" type="text" placeholder="ETAT">';
            }else{
              echo'<input id="etat" name="etat" value="" type="text" placeholder="ETAT">';
            }
            echo'<input id="submit" type="submit" value="ENVOYER">';
        }else{
            if (!$mysqli->set_charset("utf8")) {
                printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                exit();
              }
              $sql = "INSERT INTO t_atelier_at VALUES(NULL,'" .$intitule. "',NOW(),'" .$description. "','" .$etat. "','" .$pad_id. "')";
    
              $result2 = $mysqli->query($sql);
              if ($result == false or $result2 == false) //Erreur lors de l’exécution de la requête
              {
                // La requête a echoué
                echo "Error: La requête a échoué \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
              }
              else //Requête réussie
              {
                echo "<br />";
                echo "Nouvel atelier ajouté !" . "\n";
                echo('<a href="admin_atelier.php">Menu</a>');
              } 
        }  
        ?>
      </form>
    </section>
  </section>
  <!-- info section -->

  <section class="info_section layout_padding">
  <div class="offset-lg-2 col-md-10 offset-md-1">
    <div class="container">
      <div class="info_logo">
        <h2>
          <?php
          echo ($conf['conf_nom']);
          ?>
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                <?php
                echo ($conf['conf_numero_telephone']);
                ?>
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>
                <?php
                echo ($conf['conf_mail']);
                ?>
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                <?php
                echo ($conf['conf_adresse_postale']);
                ?>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Entrez votre email">
              <button>
                Inscription
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> <a href="licence.md">Licence MIT. Concu par Erwan Le Bras</a>
    </p>
  </section>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <?php
  $mysqli->close();
  ?>
</body>

</html>