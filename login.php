<?php

require_once __DIR__ . "/data/conn.php";
require_once __DIR__ . "/data/regex.php";
// apro la sessione
if(session_status() === PHP_SESSION_NONE){
  session_start();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST['email']) && isset($_POST['password'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users where email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if(!isValidEmail($email)){
      $error = "L'indirizzo email inserito non è valido.";
      exit;
    }

    // controllo utente
    if($stmt->num_rows > 0){
      $stmt->bind_result($id, $username, $passwordHash);
      $stmt->fetch();


      // verifica psw
      if(password_verify($password, $passwordHash)){

        // Variabili di sessione
        $_SESSION['userID'] = $id;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
      }else{
        $error = "Password non corretta.";
      }
    }else{
      $error = "Email errata... nessun utente registrato con $email";
    }
    
    $stmt->close();
  }else{
    $error = "Riempi tutti i campi obbligatori";
  }



  $_SESSION['error'] = $error;
  header('Location: login.php');
  exit;
}else{
}

require_once __DIR__ . "/views/layout/head.php";
require_once __DIR__ . "/views/layout/header.php";

require_once __DIR__ . "/views/pages/login.php";

require_once __DIR__ . "/views/layout/footer.php";


$conn->close();
?>