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
        $payload = $_POST['payload'];
        if(isset($payload['name'])){
          if(!empty($payload['name'])){
            if(clean($payload['name'])){
              if(isset($payload['type']) && in_array($payload['type'], [
                'VARCHAR',
                'INT',
                'FLOAT',
                'PASSWORD',
                'LARGE_TEXT',
                'DATE',
                'TIME',
                'CHOICES',
                'RAW',
              ])){
                $data = json_encode([
                  "nullable" => isset($payload["nullable"])?$payload["nullable"]:'',
                  "unique" => isset($payload["unique"])?$payload["unique"]:'',
                  "size" => isset($payload["size"])?$payload["size"]:'',
                  "default_enable" => isset($payload["default_enable"])?$payload["default_enable"]:'',
                  "default_value" => isset($payload["default_value"])?$payload["default_value"]:'',
                ]);
                if(mysqli_query($connection, "INSERT INTO entity_properties(entity_id, name, type, data) VALUES('".$_POST['entity']."', '".$payload['name']."', '".$payload['type'][0]."', '$data');"))
                $ret['status'] = 1;
                else $ret['error'] = 'Unable to Create Property! ' . mysqli_error($connection);
              } else $ret['error'] = 'Invalid Type!';
            } else $ret['error'] = 'Symbols Not Allowed!';
          } else $ret['error'] = 'Empty Property Name!';
        } else $ret['error'] = 'Property Name Required!';
      } else $ret['error'] = 'Entity Required!';
      break;
  }

  // Fetch
  if(
    isset($_POST['fetch']) &&
    isset($_POST['entity']) &&
    ($qry = mysqli_query($connection, "SELECT * FROM entity_properties WHERE entity_id=".$_POST['entity'].";"))
  ){
    $ret['data'] = [];
    while($row=mysqli_fetch_assoc($qry))
    $ret['data'] []= $row;
  }

  echo json_encode($ret);
?>