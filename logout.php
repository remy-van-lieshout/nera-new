<?php 
session_start();
unset($_SESSION["user"]);

session_unset();
session_destroy();
header('Refresh: 2; URL = index.php');
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Nera</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/neraIcon.ico">
</head>

<body>
    <main class="main">
        <div class="content">
            <div class="container pt-5">
                <div class="d-flex justify-content-center h-150">
                    <h4 class="fontTitle">You have cleaned session</h4>
                </div>
            </div>
        </div>
    </main>
</body>

</html>