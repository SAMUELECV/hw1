<?php
require_once 'config.php';
session_start();

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $connessione->real_escape_string($_POST['email']);
        $password = $connessione->real_escape_string($_POST['password']);

        error_log("Login attempt with email: $email");

        $sql_select = "SELECT * FROM utente WHERE email = '$email'";
        $result = $connessione->query($sql_select);

        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

                if (password_verify($password, $row['password'])) {
                    // Salvataggio dell'ID utente nella sessione
                    $_SESSION['id'] = $row['id'];

                    // Impostazione di altre variabili di sessione se necessario
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['nome'] = $row['nome'];

                    error_log("Login successful for email: $email");

                    // Risposta di successo
                    $response['success'] = true;
                    $response['message'] = "Login successful";
                } else {
                    error_log("Password incorrect for email: $email");
                    $response['success'] = false;
                    $response['message'] = "La password non è corretta";
                }
            } else {
                error_log("No account found with email: $email");
                $response['success'] = false;
                $response['message'] = "Non ci sono account con questa e-mail";
            }
        } else {
            error_log("Database error during login attempt for email: $email");
            $response['success'] = false;
            $response['message'] = "Errore in fase di login";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Per favore, inserisci sia l'email che la password";
    }
}

$connessione->close();
echo json_encode($response);

?>
