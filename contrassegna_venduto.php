<?php
session_start();
// Connessione al database
$dbconn = pg_connect("host=localhost port=5432 dbname=utenti user=postgres password=Lukakuinter9") or die('Could not connect: ' . pg_last_error());

// Verifica se la connessione è avvenuta con successo
if ($dbconn) {
    // Recupera l'ID dell'annuncio dalla richiesta POST
    $annuncioId = isset($_POST['id']) ? $_POST['id'] : null;
    $nascosto = isset($_POST['nascosto']) ? $_POST['nascosto'] : null;

    // Verifica se l'ID dell'annuncio è stato fornito correttamente
    if ($annuncioId) {
        // Esegui l'aggiornamento dello stato dell'annuncio nel database
        if ($nascosto == 't') {
            $query = "UPDATE annuncio SET nascosto = true WHERE id = $1";
            $result = pg_query_params($dbconn, $query, array($annuncioId));

            // Verifica se l'aggiornamento è stato eseguito con successo
            if ($result) {
                // Invia una risposta di conferma
                echo "L'annuncio è stato contrassegnato come venduto con successo.";
            } else {
                // Gestisci eventuali errori nell'aggiornamento
                echo "Errore durante l'aggiornamento dello stato dell'annuncio: " . pg_last_error($dbconn);
            }
        }
        else {
            $query = "UPDATE annuncio SET nascosto = false WHERE id = $1";
            $result = pg_query_params($dbconn, $query, array($annuncioId));

            // Verifica se l'aggiornamento è stato eseguito con successo
            if ($result) {
                // Invia una risposta di conferma
                echo "L'annuncio è di nuovo visibile.";
            } else {
                // Gestisci eventuali errori nell'aggiornamento
                echo "Errore durante l'aggiornamento dello stato dell'annuncio: " . pg_last_error($dbconn);
            }
        }
    } else {
        // Gestisci il caso in cui l'ID dell'annuncio non è stato fornito correttamente
        echo "ID dell'annuncio non valido.";
    }

    // Chiudi la connessione al database
    pg_close($dbconn);
} else {
    // Gestisci eventuali errori nella connessione al database
    echo "Connessione al database non riuscita.";
}
?>
