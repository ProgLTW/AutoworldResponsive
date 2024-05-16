<!DOCTYPE html>
<html lang="it">
<head>
    <title>AutoWorld - Pagina di login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sign-in.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="./rememberMe.js" type="application/javascript"></script>
    <style> 
        body {
            background-image: url(../immagini/sfondologin.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Formula1 Display';
            color: orange;
        }

        .box{
            background-color: orange;
            color: black;
            border-radius: 30px;
            margin: auto;
            width: 70%;
            
            height: 400px;
            display: flex; /* Usa un layout flessibile */
            flex-direction: column; /* Colonna per disporre gli elementi verticalmente */
            justify-content: space-evenly; /* Distribuisce gli elementi verticalmente in modo uniforme */
            align-items: center; /* Centra gli elementi orizzontalmente */
            padding: 20px; /* Aggiungi spazio intorno al contenuto */
        }
        .box form{
            width: 60%; /* Occupa tutta la larghezza del box */
            display: flex; /* Usa un layout flessibile */
            flex-direction: column; /* Colonna per disporre gli elementi verticalmente */
            align-items: center; /* Centra gli elementi orizzontalmente */
        }
        .box input[type="password"] {
            width: 100%; /* Occupa tutta la larghezza del form */
            margin-bottom: 20px; /* Aggiunge spazio tra i campi di input */
        }
        
        h1 {
            font-size: x-large;
        }
        
        h2 {
            margin-top: 20px;
            font-size: xx-large;
            margin-bottom: 200px;
        }
        table {
            background-color: orange;
            color: black;
            border-radius: 30px;
            margin: auto;
            width: 80%;
            height: 400px;
        }
        a {
            text-decoration: none; /* Rimuove la sottolineatura */
            color: black; /* Cambia il colore del testo */
        }
        .logo-container a {
            color: orange; /* Cambia il colore del testo all'interno dell'ancora */
        }
    </style>
</head>
<body class="text-center">
    <div class="logo-container">
        <h2><a href="../index.php">AUTOWORLD</a></h2>
    </div>
        <div class="box">
            <h1>Modifica Password</h1>
            <form name="myForm" action="new-password.php" method="POST" class="form-signin m-auto" onsubmit="alertRmb()">
                <input type="password" placeholder="Vecchia Password" name="inputOldPassword" class="form-control" required>
                <input type="password" name="inputNewPassword" class="form-control" placeholder="Nuova Password" required />
                <input type="password" name="inputConfermaPassword" class="form-control" placeholder="Conferma Nuova Password" required />

                <button type="submit" class="btn btn-primary">Conferma!</button>
            </form>
        </div>

        <script>
        function alertRmb() {
            // Funzione di alert personalizzata se necessario
        }
    </script>
</body>
</html>
