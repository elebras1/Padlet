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
  <?php
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
  //Affichage de la requête préparée
  //echo ($requete);
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
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">À propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="activite.php">Nos activités </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inscription.php">Inscription</a>
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
          <div class="offset-lg-2 col-md-10 offset-md-1">
            <div class="heading_container">
              <hr>
              <h2>
                Inscription
              </h2>
            </div>
          </div>
        </div>
        <?php
          $probleme = 0;
          $msg_erreur = "";
            if ($_POST['mail']){
              $id=htmlspecialchars(addslashes($_POST['mail']));
            }else{
              $probleme++;
              $msg_erreur = $msg_erreur . "mail vide ";
            }
            if ($_POST['prenom']){
              $prenom=htmlspecialchars(addslashes($_POST['prenom']));
            }else{
              $probleme++;
              $msg_erreur = $msg_erreur . "prenom vide ";
            }
            if ($_POST['nom']){
              $nom=htmlspecialchars(addslashes($_POST['nom']));
            }else{
              $probleme++;
              $msg_erreur = $msg_erreur . "nom vide ";
            }
            if (strcmp($_POST['mdp'], $_POST['mdp2']) == 0){
              $mdp=htmlspecialchars(addslashes($_POST['mdp']));
            }else{
              $probleme++;
              $msg_erreur = $msg_erreur . "La confirmation n'est pas identique";
            }
            if($probleme > 0){
              //echo('<a href="connexion.php">Inscription</a>');
              //echo("nombre de probleme :".$probleme);
              echo '<form action="action.php" method="post" class="form">';
              if($_POST['mail']){
                echo '<input id="prenom" name="prenom" type="text" placeholder="PRENOM" value="'.stripslashes($prenom).'">';
              }
              else{
                echo '<input id="prenom" name="prenom" type="text" placeholder="PRENOM" value="">';
              }
              if($_POST['prenom']){
                echo '<input id="nom" name="nom" type="text" placeholder="NOM" value="'.stripslashes($nom).'" >';
              }
              else{
                echo '<input id="nom" name="nom" type="text" placeholder="NOM" value="" >';
              }
              if($_POST['mail']){
                echo '<input id="mail" name="mail" type="mail" placeholder="E-MAIL" value="'.stripslashes($id).'" >';
              }
              else{
                echo '<input id="mail" name="mail" type="mail" placeholder="E-MAIL" value="" >';
              }
              echo '<input id="mdp" name="mdp" type="password" placeholder="MOT DE PASSE">';
              echo '<input id="mdp2" name="mdp2" type="password" placeholder="CONFIRMATION MOT DE PASSE">';
              echo '<input id="val" name="val" value="1" type="hidden">';
              echo '<input id="submit" type="submit" value="ENVOYER">';
              echo '<label>"'.$msg_erreur.'"</label>';
              echo '</form>';
              exit();
            }

          // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
          if (!$mysqli->set_charset("utf8")) {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit();
          }
          $sql="INSERT INTO t_compte_cpt VALUES('" .$id. "','".MD5($mdp)."');";
          $sql2 = "INSERT INTO t_profil_pfl VALUES('" .$prenom. "','" .$nom. "','D','A',NOW(),'" .$id. "')";

          $result = $mysqli->query($sql);
          $result2 = $mysqli->query($sql2);
          if ($result == false or $result2 == false) //Erreur lors de l’exécution de la requête
          {
            // La requête a echoué
            echo "Error: La requête a échoué \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            if($result == false){
              $sql3 = "DELETE FROM t_compte_cpt WHERE cpt_pseudo  = '".$id."';";
              $result = $mysqli->query($sql3);
            }
            exit();
          }
          else //Requête réussie
          {
            echo "<br />";
            echo "Inscription réussie !" . "\n";
            echo('<a href="index.php">Menu</a>');
          } 
        ?>
  </section>
  <!-- info section -->

  <section class="info_section layout_padding">
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
