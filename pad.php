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

  <!-- about section -->
  <section class="contact_section layout_padding">
    <div class="offset-lg-2 col-md-10 offset-md-1">
      <div class="heading_container">
        <hr>
        <h2>
          <?php
            if(isset($_GET['code'])){
              $pad_code = $_GET['code'];
              $requete_pad = 'SELECT pad_intitule, pad_fichier_image FROM t_pad_pad WHERE pad_code ='.'"'.$pad_code.'"'.';';
              $requete = "SELECT pad_intitule, at_intitule, rsc_chemin, at_date, GROUP_CONCAT(DISTINCT cpt_pseudo SEPARATOR ', ') as cpt_pseudo FROM t_animation_an JOIN t_pad_pad USING(pad_id) JOIN t_atelier_at USING(pad_id) JOIN t_ressource_rsc USING(at_id) WHERE pad_code="."'$pad_code'"." AND pad_etat = 'P' GROUP BY rsc_id;";
              //echo $requete;
              #$requete2 = "SELECT pfl_nom pfl_prenom FROM t_pad_pad JOIN t_animation_an USING(pad_id) JOIN t_compte_cpt USING(cpt_pseudo) JOIN t_profil_pfl USING(cpt_pseudo) WHEREpad_id='".$id."';";
              $result = $mysqli->query($requete);
              $result_pad = $mysqli->query($requete_pad);
              if ($result == false) //Erreur lors de l’exécution de la requête
              { // La requête a echoué
                echo "Error: La requête a echoué \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
                } else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                {
                  $pad_code = $result_pad->fetch_assoc();
                  echo($pad_code['pad_intitule']);
                }
                }
                else {
                  echo ("Vous avez oublié le paramètre !");
                  exit();
                }
			    ?>
        </h2>
      </div>
    </div>
    <div class="container">
      <?php
        echo('<div class="table-responsive">');
        echo ('<table class="table table-striped table-bordered"><tr><th>Titre</th><th>Texte</th><th>Pseudo</th><th>Date</th></tr>');
        while ($atelier = $result->fetch_assoc()) {
          echo ('<tr>');
          echo ('<td>' . $atelier['at_intitule'] . '</td><td><a class="nav-link" href='.$atelier['rsc_chemin'].' target="_blank">'.$atelier['rsc_chemin'].' </a></td><td>'.$atelier['cpt_pseudo'].'</td><td>'.$atelier['at_date'].'</td>');
          echo ('</tr>');
        }
        echo ('</table>');
        echo('</div>');
			?>
    </div>
  </section>
  <!-- end about section -->

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
  exit();
  ?>
</body>

</html>