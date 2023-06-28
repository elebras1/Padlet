<?php
session_start();
// Vérifiez si le lien de déconnexion a été cliqué
  // destruction de la session
  session_destroy();
  // libération des variables globales associées à la session
  unset($_SESSION['login']);
header("Location:index.php");
?>