<?php
session_start();
include '../helpers/db_connection.php';


if ($_SESSION['user'] == null){
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Nera</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/neraIcon.ico">
</head>

<body>
    <main class="main">
    <?php include '../helpers/NavBar.php';?>
        <div class="content">
            <div class="container pt-5 fontNormal" style="max-height: 30vh !important;">
                <h3>Welkom op de website van Nera van Lieshout!</h3>
                <p>Graag zouden wij jullie willen uitnodigen voor een gezellige barbeque op <a class="url">14-07-2024</a> vanaf <a class="url">16:00</a> uur. Er is een zwembadje aanwezig voor de kleintjes, dus vergeet de zwembroek of badpak niet!</p>
                <p>Kijk vooral ook eens op de <a class="url" href="Wishlist.php">wensenlijst pagina</a> om ideeën op te doen en dubbele cadeau's te voorkomen.</p>
                </br>
                <p>Mocht je op 14-07 verhinderd zijn en toch graag op bezoek komen, neem dan contact op met Jennis voor een afspraak.</p>
            </div>
        </div>
    </main>
</body>

</html>