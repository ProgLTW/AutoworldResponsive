<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
    exit;
} else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=utenti user=postgres password=Lukakuinter9")
        or die('Could not connect: ' . pg_last_error());
}

if ($dbconn) {
    $email = $_SESSION['email'];
    $old_password = $_POST['inputOldPassword'];
    $new_password = $_POST['inputNewPassword'];
    $confirm_password = $_POST['inputConfermaPassword'];

    // Verifica se la vecchia password è corretta
    $old_password_query = "SELECT * FROM utente WHERE email = $1 AND pwd = $2";
    $old_password_result = pg_query_params($dbconn, $old_password_query, array($email, $old_password));

    if (pg_num_rows($old_password_result) == 1) {
        // Verifica se la nuova password corrisponde al controllo password
        if ($new_password === $confirm_password) {
            // Aggiorna la password nel database
            $update_query = "UPDATE utente SET pwd = $1 WHERE email = $2";
            $update_result = pg_query_params($dbconn, $update_query, array($new_password, $email));

            if ($update_result) {
                echo "<h1>Password modificata con successo!</h1>";
            } else {
                echo "<h1>Errore nella modifica della password.</h1>";
            }
        } else {
            echo "<h1>La nuova password e il controllo password non corrispondono.</h1>";
        }
    } else {
        echo "<h1>La vecchia password non è corretta.</h1>";
    }
}
?>
