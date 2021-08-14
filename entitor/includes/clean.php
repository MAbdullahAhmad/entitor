<?php
  function clean(string $nick){
    foreach([
      "'", '"', '/', '\\', '?', '!', '@', '#', '$',
      '%', '^', '&', '*', '(', ')', '+', '=', '{',
      '}', '[', ']', ':', ';', ',', '<', '.', '>', '?'
    ] as $ch)
    if(strpos($nick, $ch)!==false)
    return false;
    return true;
  }
?>