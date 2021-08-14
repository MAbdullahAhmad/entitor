<?php
  // Libs
  require "config/main.php";
  require "includes/auth.php";

  // Auth & Verif Data
  if(!array_key_exists('entity', $_GET))
  header('location: index.php');
  elseif(!$auth) header("location: welcome.php");

  // Assets
  $JS_FILES = ['assets/js/tinkerbox.js'];
  $CSS_FILES = [
    "assets/lib/material-design-iconic-font/css/materialdesignicons.min.css",
    "assets/css/tinkerbox.css",
  ];

  // - Fetch
  $errors = [];
  $entity = null;
  $properties = [];

  if($qry = mysqli_query($connection, "SELECT * FROM entities WHERE id=".$_GET['entity'])){
    if(mysqli_num_rows($qry)==1){
      $entity = mysqli_fetch_assoc($qry);
    } else {
      $errors []= "Entity Not Found";
      echo "Entity Not Found! Redirecting to Sandbox ...";
      header("refresh:3,url=sandbox.php");
    }
  } else $errors []= [
    "no" => mysqli_errno($connection),
    "error" => mysqli_error($connection)
  ];
  if($entity){
    if($qry = mysqli_query($connection, "SELECT * FROM entity_properties WHERE entity_id=".$entity['id']))
      while($property = mysqli_fetch_assoc($qry))
        $properties []= $property;
    else $errors []= [
      "no" => mysqli_errno($connection),
      "error" => mysqli_error($connection)
    ];
  }

  // Layout
  $LAYOUT_COMPONENT = "tinkerbox.php";
  $subtitle = "TinkerBox";
  include "layouts/basic.php";
?>