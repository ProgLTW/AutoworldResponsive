<?
if ($dbconn) {
    // Recupera i dati dei filtri inviati dal client
    $marca = isset($_POST['marca']) ? pg_escape_string($_POST['marca']) : null;

    $modello = isset($_POST['modello']) ? pg_escape_string($_POST['modello']) : null;

    $prezzoDa = isset($_POST['prezzoDa']) ? intval($_POST['prezzoDa']) : null;
    $prezzoA = isset($_POST['prezzoA']) ? intval($_POST['prezzoA']) : null;
    $carrozzeria = isset($_POST['carrozzeria']) ? pg_escape_string($_POST['carrozzeria']) : null;

    $annoDa = isset($_POST['annoDa']) ? intval($_POST['annoDa']) : null;
    $annoA = isset($_POST['annoA']) ? intval($_POST['annoA']) : null;

    $chilometraggioDa = isset($_POST['chilometraggioDa']) ? intval($_POST['chilometraggioDa']) : null;
    $chilometraggioA = isset($_POST['chilometraggioA']) ? intval($_POST['chilometraggioA']) : null;

    $carburante = isset($_POST['carburante']) ? pg_escape_string($_POST['carburante']) : null;

    $cambio = isset($_POST['cambio']) ? pg_escape_string($_POST['cambio']) : null;

    $potenzaDa = isset($_POST['potenzaDa']) ? intval($_POST['potenzaDa']) : null;
    $potenzaA = isset($_POST['potenzaA']) ? intval($_POST['potenzaA']) : null;

    $trattabile = isset($_POST['trattabile']) ? ($_POST['trattabile'] === 'true' ? 'TRUE' : 'FALSE') : null;

    // Costruisci la query per filtrare gli annunci
    $query = "SELECT * FROM annuncio WHERE 1=1"; // Inizia con una condizione sempre vera




    // Aggiungi le condizioni dei filtri, se presenti
    if ($marca) {
        $query .= " AND marca = '$marca'";
    }
    if ($modello) {
        $query .= " AND modello = '$modello'";
    }
    if ($prezzoDa !== null) {
        $query .= " AND prezzo >= $prezzoDa";
    }
    if ($prezzoA !== null) {
        $query .= " AND prezzo <= $prezzoA";
    }
    if ($trattabile !== null) {
        $query .= " AND trattabile = $trattabile";
    }
    if ($carrozzeria) {
        $query .= " AND carrozzeria = '$carrozzeria'";
    }
    if ($annoDa !== null) {
        $query .= " AND anno >= $annoDa";
    }
    if ($annoA !== null) {
        $query .= " AND anno <= $annoA";
    }
    if ($chilometraggioDa !== null) {
        $query .= " AND chilometraggio >= $chilometraggioDa";
    }
    if ($chilometraggioA !== null) {
        $query .= " AND chilometraggio <= $chilometraggioA";
    }
    if ($carburante) {
        $query .= " AND carburante = '$carburante'";
    }
    if ($cambio) {
        $query .= " AND cambio = '$cambio'";
    }
    if ($potenzaDa !== null) {
        $query .= " AND potenza >= $potenzaDa";
    }
    if ($potenzaA !== null) {
        $query .= " AND potenza <= $potenzaA";
    }


    // Esegui la query
    $result = pg_query($dbconn, $query);
    // Esegui la query
    $result = pg_query($dbconn, $query);
    if ($result) {
        // Inizializza una variabile per memorizzare l'output HTML degli annunci
        $output = '';
        // Itera sui risultati della query per costruire l'HTML degli annunci
        while ($row = pg_fetch_assoc($result)) {
            // Costruisci l'HTML per ciascun annuncio (come fatto nel tuo codice PHP originale)
            $output .= "<div class='container3'>";
            // Aggiungi le informazioni dell'annuncio...
            $output .= "</div>";
        }
        // Restituisci l'HTML degli annunci filtrati al client
        echo $output;
    } else {
        // Gestisci eventuali errori nella query
        echo "Errore durante l'esecuzione della query: " . pg_last_error($dbconn);
    }
    // Rilascia la risorsa del risultato
    pg_free_result($result);
} else {
    // Gestisci eventuali errori nella connessione al database
    echo "Connessione al database non riuscita.";
}
// Chiudi la connessione al database
pg_close($dbconn);
?>