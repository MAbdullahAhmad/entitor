<?php
  // Requirements
  require "config/main.php";
  require "includes/auth.php";

  // Auth
  if($auth) header("location: index.php");

  // Helper
  require "includes/error.php";

  // Assets
  $JS_FILES = ['assets/js/welcome.js'];
  $CSS_FILES = [
    "assets/lib/material-design-iconic-font/css/materialdesignicons.min.css",
    "assets/css/welcome.css",
  ];

  // Layout
  $LAYOUT_COMPONENT = "welcome.php";
  $subtitle = "Welcome";
  include "layouts/master.php";
?>