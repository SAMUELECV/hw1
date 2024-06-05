<?php
require_once 'config.php';
session_start();
header('Content-Type: application/json');

// Funzione per aggiungere ai preferiti
function aggiungiAiPreferiti($connessione, $id_utente, $id_prodotto) {
    $response = [];

    // Sanitize input
    $id_utente = $connessione->real_escape_string($id_utente);
    $id_prodotto = $connessione->real_escape_string($id_prodotto);

    // Controlla se il prodotto esiste
    $sql = "SELECT * FROM prodotto WHERE id = '$id_prodotto'";
    $result = $connessione->query($sql);

    if ($result->num_rows > 0) {
        // Controlla se il prodotto è già nei preferiti
        $sql = "SELECT * FROM preferiti WHERE id_utente = '$id_utente' AND id_prodotto = '$id_prodotto'";
        $result = $connessione->query($sql);

        if ($result->num_rows == 0) {
            // Aggiungi ai preferiti
            $sql = "INSERT INTO preferiti (id_utente, id_prodotto) VALUES ('$id_utente', '$id_prodotto')";
            if ($connessione->query($sql) === TRUE) {
                $response['success'] = true;
                $response['message'] = "Prodotto aggiunto ai preferiti!";
            } else {
                $response['success'] = false;
                $response['message'] = "Errore nell'aggiunta ai preferiti: " . $connessione->error;
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Il prodotto è già nei tuoi preferiti.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Prodotto non trovato.";
    }

    return $response;
}

// Verifica se l'utente è loggato
if (isset($_SESSION['id'])) { 
    $id_utente = $_SESSION['id']; 

    // Decodifica i dati JSON dal corpo della richiesta
    $input = json_decode(file_get_contents('php://input'), true);

    // Verifica se è stato passato l'ID del prodotto
    if (isset($input['id_prodotto'])) {
        $id_prodotto = intval($input['id_prodotto']);
        $response = aggiungiAiPreferiti($connessione, $id_utente, $id_prodotto);
        echo json_encode($response);
    } else {
        echo json_encode(['success' => false, 'message' => 'ID prodotto non fornito.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Devi essere loggato per aggiungere ai preferiti.']);
}

$connessione->close();

?>
