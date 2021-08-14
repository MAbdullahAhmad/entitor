<?php
  if(!isset($conf))
  require "conf/main.php";

  $connected=false;
  $connection = mysqli_connect(
    $conf['database']['host'],
    $conf['database']['user'],
    $conf['database']['password'],
  );

  if($connection && !mysqli_query($connection, "USE `".$conf['database']['database']."`")){
    if(strpos(mysqli_error($connection), 'Unknown database')===0){
      include "includes/init.php";
    }
  } elseif($connection) $connected = true;

  if(!$connected)
  die("Unable to Initialize");

  if(!$connection)
  die("Unable To Connect");
?>