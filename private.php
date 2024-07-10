<?php
  // apro la sessione solo se non è già aperta
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
require_once __DIR__ . "/data/conn.php";
require_once __DIR__ . "/data/middleware.php";
checkLoggedIn();

require_once __DIR__ . "/views/layout/head.php";
require_once __DIR__ . "/views/layout/header.php";

// Prendo la view di studenti
require_once __DIR__ . "/views/pages/private.php";

require_once __DIR__ . "/views/layout/footer.php";

$conn->close();
?>