<?php
session_start();
include '../helpers/db_connection.php';


if ($_SESSION['user'] == null) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title><?php echo str_contains($_SERVER['SERVER_NAME'], "nera") ? "Nera" : "Familie van Lieshout";?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
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
        <?php include '../helpers/NavBar.php'; ?>
        <div class="content">
            <div class="container pt-5 fontNormal">
                <p> Bekijk hier de foto's van het barbeque feest van 14-07-2024. Door op een foto te klikken wordt een nieuwe pagina geopend.</p>
                <div class="row overflow-auto" style="max-height: 75vh !important;">
                <?php 
                    $dir = "../images/FotosBarbeque/*.jpg";
                    //get the list of all files with .jpg extension in the directory and safe it in an array named $images
                    $images = glob( $dir );
                    
                    //extract only the name of the file without the extension and save in an array named $find
                    foreach( $images as $image ):
                        echo "<a target='_blank' href='" . $image . "' data-toggle='lightbox' data-gallery='example-gallery' class='col-lg-3 col-md-4 col-6 my-3'>
                                <img src='" . $image . "' class='img-fluid card' style='max-height: 165px; object-fit: contain; '>
                            </a>";
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>