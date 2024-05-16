<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
} else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=utenti user=postgres password=Lukakuinter9")
        or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php
    if ($dbconn) {
        $email = $_POST['inputEmail'];
        $q1 = "SELECT * FROM utente WHERE email=$1";
        $result = pg_query_params($dbconn, $q1, array($email));
        if ($tuple = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "<h1> Spiacente, l'indirizzo email non è disponibile </h1>
            Se vuoi, <a href='../login'> clicca qui per loggarti </a>";
        } else {
            $nome = $_POST['inputName'];
            $cognome = $_POST['inputSurname'];
            $password = ($_POST['inputPassword']);
            $q2 = "INSERT INTO utente VALUES ($1, $2, $3, $4)";
            $data = pg_query_params($dbconn, $q2, array($email, $password, $nome, $cognome));
            if ($data) {
                echo "<h1> Registrazione completata. Puoi iniziare ad usare il sito <br/></h1>";
                echo "<a href='../login/index.html'> Clicca qui </a> per loggarti!";
            }
        }
    }
    ?>
</body>
</html>
