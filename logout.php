<?php

require_once __DIR__ . "/data/conn.php";

// apro la sessione solo se non è già aperta
if(session_status() === PHP_SESSION_NONE){
  session_start();
}

// Cancello la sessione
session_destroy();

// Reindirizzo alla home
header('Location: index.php');



require_once __DIR__ . "/views/layout/head.php";
require_once __DIR__ . "/views/layout/header.php";

// Prendo la view di logout
require_once __DIR__ . "/views/pages/logout.php";

require_once __DIR__ . "/views/layout/footer.php";

$conn->close();
?>