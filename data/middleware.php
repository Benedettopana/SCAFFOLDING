<?php

function checkLoggedIn(){
  if(!isset($_SESSION['userID'])){
    header('Location: index.php');
  }
}

?>