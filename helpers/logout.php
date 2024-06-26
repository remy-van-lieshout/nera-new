<?php
include 'db_connection.php';

session_start();
CreateLog('logout', $_SESSION['user'], true, '');
unset($_SESSION["user"]);

session_unset();
session_destroy();
header('Refresh: 2; URL = ../index.php');
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title><?php echo str_contains($_SERVER['SERVER_NAME'], "nera") ? "Nera" : "Familie van Lieshout";?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/icon.ico">
</head>

<body>
    <main class="main">
        <div id='star1'></div>
        <div id='star2'></div>
        <div id='star3'></div>
        <div id='star4'></div>
        <div id='star5'></div>
        <div id='star6'></div>
        <div id='star7'></div>
        <div id='star8'></div>
        <div id='star9'></div>
        <div id='star10'></div>
        <div class="content">
            <div class="container pt-5">
                <div class="d-flex justify-content-center h-150">
                    <h4 class="fontTitle">De sessie is opgeruimd, uitloggen was succesvol.</h4>
                </div>
                <div class="d-flex justify-content-center h-150">
                    <h3 class="fontTitle">Fijne dag gewenst, en tot de volgende keer!</h3>
                </div>
            </div>
        </div>
    </main>
</body>

</html>