<?php
  // Libs
  require "config/main.php";
  require "includes/auth.php";

  // Auth
  if(isset($_POST['nick'])){
    $reg=register($_POST['nick']);
    if(!$reg['status'])
    error_redirect($reg['error']);
  }
  elseif(!$auth)
  header("location: welcome.php");

  // Layout
  $active='home';
  $LAYOUT_COMPONENT = "home.php";
  $subtitle = "Home";
  include "layouts/master.php";
?>