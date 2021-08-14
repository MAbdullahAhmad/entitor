<?php
  // Libs
  require "config/main.php";
  require "includes/auth.php";

  // Auth
  if(!$auth) header("location: welcome.php");

  // Assets
  $JS_FILES = ['assets/js/sandbox.js'];
  $CSS_FILES = [
    "assets/lib/material-design-iconic-font/css/materialdesignicons.min.css",
    "assets/css/sandbox.css",
  ];

  // Data
  $toasts = [];

  // - Fetch
  $errors = [];
  $entities = [];
  if($qry = mysqli_query($connection, "SELECT * FROM entities;"))
    while($entity = mysqli_fetch_assoc($qry))
      $entities []= $entity;
  else $errors []= [
    "no" => mysqli_errno($connection),
    "error" => mysqli_error($connection)
  ];

  // Layout
  $LAYOUT_COMPONENT = "sandbox.php";
  $subtitle = "Sandbox";
  include "layouts/basic.php";
?>