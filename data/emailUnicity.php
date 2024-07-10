<?php

// Controllo unicità dell'email
function emailUnicity($email, $conn){


  
  $sql = "SELECT id FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->close();
    $conn->close();
    return "L'email è già utilizzata.";
  }
  $stmt->close();
  return '';
}


?>