<?php
  $initialized=false;

  if(!isset($connection))
  die("connection required!");
  if(!isset($conf))
  die("configuration required!");

  // Reading SQL
  $sql_file = fopen("includes/bag/init.sql", "r") or die("Unable to read file!");
  $sql = str_replace("\n", " ", str_replace("__database_name__", $conf['database']['database'], fread($sql_file, 10000)));
  fclose($sql_file);

  // Running Query
  foreach(explode(";", $sql) as $qry)
  if($qry){
    if(mysqli_query($connection, $qry))
    $initialized=true;
    // else die(mysqli_error($connection) . "$qry");
  }

  if($initialized && isset($connected) && !$connected)
  $connected = true;
?>