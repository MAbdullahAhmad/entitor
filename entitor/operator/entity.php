<?php
  require "../config/main.php";
  require "../includes/connection.php";
  require "../includes/clean.php";

  $ret = [
    "status" => 0
  ];

  if(isset($_POST['operation']))
  switch($_POST['operation']) {
    // Create
    case 'create':
      if(isset($_POST['entity'])){
        if(!empty($_POST['entity'])){
          if(clean($_POST['entity'])){
            if(mysqli_query($connection, "INSERT INTO entities(name) VALUES('".$_POST['entity']."');"))
            $ret['status'] = 1;
            else $ret['error'] = 'Unable to Create Entity!';
          } else $ret['error'] = 'Symbols Not Allowed!';
        } else $ret['error'] = 'Empty Entity Name!';
      } else $ret['error'] = 'Entity Name Required!';
      break;

    // Delete
    case 'delete':
      if(
        isset($_POST['id'])
        && !empty($_POST['id'])
        && mysqli_query($connection, "DELETE FROM entities WHERE id=".$_POST['id'])
      ) $ret['status'] = 1;
      break;

    // Delete Multiple
    case 'delete_multiple':
      if(
        isset($_POST['ids'])
        && (gettype($_POST['ids']) == 'array')
        && (count($_POST['ids']) > 0)
        && mysqli_query($connection, "DELETE FROM entities WHERE id IN (".implode($_POST['ids'], ', ').")")
      ) $ret['status'] = 1;
      break;
    
    case 'edit':
      if(
        isset($_POST['id'])
        && !empty($_POST['id'])
        && isset($_POST['entity'])
        && !empty($_POST['entity'])
      ) {
        if(mysqli_query($connection, "UPDATE entities SET name='".$_POST['entity']."', m_date=CURRENT_DATE, m_time=CURRENT_TIME WHERE id = ".$_POST['id']))
        $ret['status'] = 1;
        else $ret['error'] = 'Unable to Edit record in Database!';
      }
      else $ret['error'] = 'Invalid Data!';
  }

  // Fetch
  if(
    isset($_POST['fetch']) &&
    ($qry = mysqli_query($connection, "SELECT * FROM entities;"))
  ){
    $ret['data'] = [];
    while($row=mysqli_fetch_assoc($qry))
    $ret['data'] []= $row;
  }

  echo json_encode($ret);
?>