<?php
  // Libs
  require "config/main.php";
  require "includes/auth.php";

  // Auth
  if(!$auth) header("location: welcome.php");

  // Layout
  $active='docs';
  $LAYOUT_COMPONENT = "docs.php";
  $subtitle = "Documentation";
  include "layouts/master.php";
?>