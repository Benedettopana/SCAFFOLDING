<?php

// Connessione al DB
define('DB_SERVERNAME','localhost:3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','db_logreg');

// inizializzo la connessione
try{
  $conn = new mysqli(
    DB_SERVERNAME,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME);
}catch(Exception $e){
  // errore
  echo "<h1>Error 500! " . $e->getMessage() . "</h1>";
}

?>