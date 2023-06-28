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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="img-box">
              <img src="images/cap1.jpg" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box">
              <img src="images/cap4.jpg" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="img-box">
              <img src="images/cap5.jpg" alt="">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                  <a class="nav-link" href="session.php">Connexion</a>
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

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="box">
        <div class="detail-box">
          <h2>
            <?php
            echo ($conf['conf_nom']);
            ?>
          </h2>
          <p>
            <?php
            echo ($conf['conf_mot']);
            ?>
          </p>
          <?php
          $requete = "SELECT * FROM t_actualite_act WHERE act_etat = 'P' ORDER BY act_date DESC LIMIT 5;";
          //Affichage de la requête préparée
          //echo ($requete);
          $result2 = $mysqli->query($requete);
          if ($result2 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
          } else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
            echo "<br />";
            //echo($result2->num_rows); //Donne le bon nombre de lignes récupérées
            echo "<br />";
            echo ('<br>');
            echo('<div class="table-responsive">');
            echo ('<table class="table table-striped table-bordered"><tr><th>Titre</th><th>Texte</th><th>Pseudo</th><th>Date</th></tr>');
            while ($actu = $result2->fetch_assoc()) {
              echo ('<tr>');
              echo ('<td>' . $actu['act_titre'] . '</td><td> ' . $actu['act_texte'] . '</td>');
              echo ('<td>' . $actu['cpt_pseudo'] . '</td><td>' . $actu['act_date'] . '</td>');
              echo ('</tr>');
            }
            echo ('</table>');
            echo('</div>');
          }
          ?>
          <br>
        </div>
        <br>
        <br>
        <div class="img-box">
          <img src="images/cap8.jpg" alt="">
        </div>
        <div class="btn-box">
          <a href="https://www.athle.fr/">
            FFA
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="images/logo.png" alt="">
          </div>
        </div>
        <div class="col-md-5">
          <div class="detail-box">
            <div class="heading_container">
              <hr>
              <h2>
                Informations
              </h2>
            </div>
            <p>
              <?php
              echo ($conf['conf_description']);
              ?>
            </p>
            <a href="about.html">
              Voir plus
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <?php
  $rows_pad = array();
  $requete = "SELECT pad_intitule FROM t_pad_pad;";

  $result3 = $mysqli->query($requete);

  if ($result3 == false) //Erreur lors de l’exécution de la requête
  { // La requête a echoué
    echo "Error: La requête a echoué \n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit();
  }
  while ($pad = $result3->fetch_array(MYSQLI_NUM)) {
    $rows_pad[] =  $pad[0];
  }
  ?>

  <!-- fruit section -->

  <section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
          Activités
        </h2>
      </div>
    </div>
    <div class="container-fluid">

      <div class="fruit_container">
        <div class="box">
          <img src="images/cap7.jpg" alt="">
          <div class="link_box">
            <h5>
              <?php
              echo ($rows_pad[0]);
              ?>
            </h5>
            <a href="activite.php">
              Voir plus
            </a>
          </div>
        </div>
        <div class="box">
          <img src="images/cap3.jpg" alt="">
          <div class="link_box">
            <h5>
              <?php
              echo ($rows_pad[1]);
              ?>
            </h5>
            <a href="activite.php">
              Voir plus
            </a>
          </div>
        </div>
        <div class="box">
          <img src="images/cap2.jpg">
          <div class="link_box">
            <h5>
              <?php
              echo ($rows_pad[2]);
              ?>
            </h5>
            <a href="activite.php">
              Voir plus
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end fruit section -->

  <?php
  $rows_pfl = array();
  $requete = "SELECT pfl_prenom, pfl_nom FROM t_profil_pfl;";

  $result3 = $mysqli->query($requete);

  if ($result3 == false) //Erreur lors de l’exécution de la requête
  { // La requête a echoué
    echo "Error: La requête a echoué \n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit();
  }
  while ($pad = $result3->fetch_assoc()) {
    $rows_pfl[] =  $pad['pfl_nom'] . " " . $pad['pfl_prenom'];
  }
  ?>

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container ">
      <div class="heading_container">
        <h2>
          Entraineurs
        </h2>
        <hr>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding-top">
              <div class="img-box">
                <img src="images/coach1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  <?php
                  echo ($rows_pfl[0]);
                  ?>
                </h5>
                <p>
                  <img src="images/left-quote.png" alt="">
                  <span>
                    Sensibilisé dés mes débuts en course à pied aux fondamentaux régissant l'entraînement en
                    course à pied j'ai immédiatement ressenti le désir, le besoin de comprendre,
                    d'analyser les différents processus physiologiques et mécaniques menant le coureur à la
                    performance.
                  </span>
                  <img src="images/right-quote.png" alt=""> <br>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding-top">
              <div class="img-box">
                <img src="images/coach2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  <?php
                  echo ($rows_pfl[1]);
                  ?>
                </h5>
                <p>
                  <img src="images/left-quote.png" alt="">
                  <span>
                    Diplômé d'un Master STAPS Entraînement sportif et titulaire des diplômes de la Fédération française
                    d'athlétisme et de triathlon, passionné de biomécanique.
                    Entraineurs au BCAP depuis 2 ans j'interviens lors des séances trail.
                  </span>
                  <img src="images/right-quote.png" alt=""> <br>
                </p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
  </section>

  <!-- end client section -->

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
  <section class="container-fluid footer_section ">
    <p>
      &copy; <span id="displayYear"></span> <a href="licence.md">Licence MIT. Concu par Erwan Le Bras</a>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <?php
  exit();
  ?>
</body>

</html>