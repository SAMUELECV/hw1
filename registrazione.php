<?php

require_once('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $connessione->real_escape_string($_POST['nome']);
  $cognome = $connessione->real_escape_string($_POST['cognome']);
  $email = $connessione->real_escape_string($_POST['email']);
  $password = $connessione->real_escape_string($_POST['password']);
  $conferma_password = $connessione->real_escape_string($_POST['conferma_password']);
  $telefono = $connessione->real_escape_string($_POST['telefono']);

    if (empty($nome) || empty($cognome) || empty($email) || empty($password) || empty($conferma_password) || empty($telefono)) {
      $_SESSION['error'] = "Tutti i campi sono obbligatori";
      header("Location: registrazione.php");
      exit();
  }

  $duplicate_query = ("SELECT * FROM utente WHERE email = '$email'");
  $result = $connessione->query($duplicate_query);

  if ($result && $result->num_rows > 0) {
      $_SESSION['error'] = "Email già utilizzata";
      header("Location: registrazione.php");
      exit();
  }

  if ($password !== $conferma_password) {
    $_SESSION['error'] = "Le password sono diverse";
    header("Location: registrazione.php");
    exit();
  }

  if (!preg_match('/^\d{10}$/', $telefono)) {
    $_SESSION['error'] = "Il numero di telefono deve avere 10 numeri";
    header("Location: registrazione.php");
    exit();
  }

  $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/';
  if (!preg_match($password_pattern, $password)) {
      $_SESSION['error'] = "La password deve essere di minimo 6 caratteri e deve contenere almeno una lettera maiuscola, una minuscola e un carattere speciale";
      header("Location: registrazione.php");
      exit();
  }

$duplicate_phone_query = "SELECT * FROM utente WHERE telefono = '$telefono'";
$result = $connessione->query($duplicate_phone_query);

if ($result && $result->num_rows > 0) {
    $_SESSION['error'] = "Numero di telefono già utilizzato";
    header("Location: registrazione.php");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_confpass = password_hash($conferma_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO utente (nome, cognome, email, password, conferma_password, telefono) 
        VALUES ('$nome', '$cognome', '$email', '$hashed_password', '$hashed_confpass', '$telefono')";
        
if ($connessione->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    $_SESSION['error'] = "Errore durante la registrazione utente: " . $connessione->error;
}
header("Location: index.php");
exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="registrazione.css">
    <script src="registrazione.js" defer></script>
  </head>
  <body>
    <nav id="navLogin">
      <h2>REGISTRATI</h2>
    </nav>
    <form id="regForm" action="registrazione.php" method="POST">
      <h2>REGISTRATI CON LA TUA E-MAIL</h2>
      <input type = "text" name= "nome" id="nome" class= "loginBar" placeholder="NOME">
      <input type = "text" name= "cognome" id="cognome" class= "loginBar" placeholder="COGNOME">
      <input type = "email" name= "email" id="email" class= "loginBar" placeholder="INDIRIZZO E-MAIL">
      <input type= "password" name= "password" id="password" class= "loginBar" placeholder="PASSWORD">
      <img src="IMG/nascondi_password.png" id="pass_nascosta">
      <input type= "password" name= "conferma_password" id="conferma_password" class= "loginBar" placeholder="CONFERMA PASSWORD">
      <img src="IMG/nascondi_password.png" id="pass_nascosta2">
      <input type = "text" name= "telefono" id="telefono" class= "loginBar" placeholder="TELEFONO">
      <input type= "submit" id="RegBtn" value= "REGISTRATI">
    </form>
    <footer id="footerLogin">
      <p>Hai già un'account? <a href="index.php">ACCEDI</a></p>
    </footer>
  </body>
</html>
