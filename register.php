<?php
require_once __DIR__ . "/data/conn.php";
require_once __DIR__ . "/data/regex.php";
require_once __DIR__ . "/data/emailUnicity.php";

if(session_status() === PHP_SESSION_NONE){
  session_start();
}

// Memorizzazione degli errori
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // prendo i valori in POST
  $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
  $confPassword = $_POST['confPassword'];

  if(empty($username)){
    $errors['username'] = "Il nome utente è obbligatorio";
  }

  if(empty($email)){
    $errors['email'] = "L'email è obbligatoria";
  }

  if(empty($password)){
    $errors['password'] = "La password è obbligatoria";
  }



  // ||  || empty($password)

  // Controllo validità email
  if(!isValidEmail($email)){
    $errors['email'] =  "Indirizzo email non valido";
  }

  // Controllo validità username
  if(strlen($username) < 3 || strlen($username) > 20){
    $errors['username'] =  "Il nome utente deve avere almeno 3 caratteri e meno di 20";
  }

  // Controllo validità password
  if(strlen($password) <6){
    $errors['password'] =  "La password deve avere almeno 6 caratteri";
  }elseif($confPassword != $password){
    $errors['confPassword'] =  "Le password devono conincidere";
  }

  // controllo unicità email
  $emailUni = emailUnicity($email, $conn);
  if(strlen($emailUni) !== 0){
    $errors['email'] = $emailUni;
  }

  if(empty($errors)){
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


    // Query di inserimento
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $passwordHash);
  
    if($stmt->execute()){
      $_SESSION['success_message'] = "Registrazione avvenuta con successo!";
      // redirect
    }else{
      $errors['general'] = "Errore durante la registrazione: " . $stmt->error;
    }
    $conn->close();
    $stmt->close();
  }

}else{
  // $errors['general'] = "Richiesta non valida";
}




require_once __DIR__ . "/views/layout/head.php";
require_once __DIR__ . "/views/layout/header.php";

require_once __DIR__ . "/views/pages/register.php";

require_once __DIR__ . "/views/layout/footer.php";



?>