<?php
  // if(!session_status())
  // session_start();

  function is_error_message(){
    global $_SESSION;
    return isset($_SESSION['_error']);
  }

  function error_message(){
    global $_SESSION;
    if(isset($_SESSION['_error'])){
      $error = $_SESSION['_error'];
      unset($_SESSION['_error']);
      return $error;
    } return false;
  }
?>