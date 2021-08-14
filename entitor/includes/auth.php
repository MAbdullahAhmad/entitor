<?php
  if(!isset($connection))
  require "includes/connection.php";
  session_start();

  if(!function_exists("clean"))
  require "includes/clean.php";

  function error_redirect(string $error, string $loc="welcome.php#nick"){
    global $_SESSION;
    $_SESSION['_error'] = $error;
    header("location: $loc");
  }

  function register(string $nick, $loc="index.php"){
    $nick = ucfirst(strtolower($nick));
    global $connection;
    if(strlen($nick)<254){
      if(strlen($nick)>0){
        if(clean($nick)){
          if(!isset($auth['id']) || !isse($auth['nick'])){
            if(mysqli_query($connection, "INSERT INTO users(nick) VALUES ('$nick');")){
              global $auth, $_SESSION;
              $auth = [
                "id" => $_SESSION['aid'] = mysqli_insert_id($connection),
                "nick" => $_SESSION['nick'] = $nick
              ];
              setcookie(
                "aid", $_SESSION['aid'],
                time() + 2592000 // One Month
              );
              return [
                "status" => true
              ];
            }
            return [
              "status" => false,
              "error" => "Unable to Register!"
            ];;
          }
          return [
            "status" => false,
            "error" => "Already Registered!"
          ];
        }
        return [
          "status" => false,
          "error" => "Symbols Not Allowed!"
        ];
      }
      return [
        "status" => false,
        "error" => "Empty Nick!"
      ];
    }
    return [
      "status" => false,
      "error" => "Very Long Nick!"
    ];
  }

  $auth = false;
  if(isset($_SESSION['aid'])){ // Session Auth
    $auth = [
      "id" => $_SESSION['aid']
    ];
    if(isset($_SESSION['nick']))
    $auth['nick'] = $_SESSION['nick'];
    if(!isset($_COOKIE['aid']))
    setcookie(
      "aid", $_SESSION['aid'],
      time() + 2592000 // One Month
    );
  }
  elseif(isset($_COOKIE['aid'])) // Cookie Auth
  $auth = [
    "id" => $_SESSION['aid'] = $_COOKIE['aid']
  ];
  elseif(($qry=mysqli_query($connection, "SELECT id, nick FROM users;")) && mysqli_num_rows($qry)>0){ // DB Auth
    $user = mysqli_fetch_assoc($qry);
    $auth = [
      "id" => $_SESSION['aid'] = $user['id'],
      "nick" => $_SESSION['aid'] = $user['nick']
    ];
    setcookie(
      "aid", $_SESSION['aid'],
      time() + 2592000 // One Month
    );
  }
  else $auth=false;
  
  // Fetch Name if Absent (In case of cookie)
  if(!isset($auth['nick']) && isset($auth['id']) && ($qry=mysqli_query($connection, "SELECT nick FROM users WHERE id='".$auth['id']."';"))){
    if(mysqli_num_rows($qry)>0)
    $auth['nick'] = mysqli_fetch_assoc($qry)['nick'];
    elseif(($qry=mysqli_query($connection, "SELECT id, nick FROM users;")) && mysqli_num_rows($qry)>0){ // Correct if Wrong auth (old id)
      $user = mysqli_fetch_assoc($qry);
      $auth = [
        "id" => $_SESSION['aid'] = $user['id'],
        "nick" => $_SESSION['aid'] = $user['nick']
      ];
      setcookie(
        "aid", $_SESSION['aid'],
        time() + 2592000 // One Month
      );
    } else $auth = false; // If nick not found (wrong cookie) and user not in DB
  }
?>