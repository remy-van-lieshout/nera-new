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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/neraIcon.ico">
</head>

<body>
    <main class="main">
    <?php include '../helpers/NavBar.php';?>
        <div class="content">
            <div class="container pt-5 fontNormal">
                <h3>Welkom op de website van Nera van Lieshout!</h3>
                <p>Graag zouden wij jullie willen uitnodigen voor een gezellige barbeque op <a class="url">14-07-2024</a> vanaf <a class="url">16:00</a> uur. Er is een zwembadje aanwezig voor de kleintjes, dus vergeet de zwembroek of badpak niet!</p>
                <p>Kijk vooral ook eens op de <a class="url" href="Wishlist.php">wensenlijst pagina</a> om ideeën op te doen en dubbele cadeau's te voorkomen.</p>
            </div>
        </div>
    </main>
</body>

</html>