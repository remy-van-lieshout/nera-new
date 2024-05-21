<?php
session_start();
include '../helpers/db_connection.php';


if ($_SESSION['user'] == null || $_SESSION['user'] != 'admin'){
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
                <?php
                echo ("<p class='fontTitle'> Hallo " . "{$_SESSION['user']}" . ", bewerk het wensenlijstje hier</p>");
                ?>
                <ul class="list-group list-group-flush">
                    <?php
                    $result = GetWishList();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item py-1'>
                                <form action='../helpers/deleteWish.php' method='post'>
                                    <div class='row'>
                                        <div class='col-1'>
                                            <label class='control-label' for='weId'>" . $row["weId"] . ".</label>
                                            <input type='hidden' name='weId' id='weId' value=" . $row["weId"] . ">
                                        </div>
                                        <div class='col'>
                                            <label class='control-label' for='weBeschrijving'></label>
                                            <a class='url' href=" . $row["weUrl"] . " target='_blank'>" . $row["weBeschrijving"] . "</a>
                                        </div>
                                        <div class='col-1'>
                                            <label class='control-label' for='weMax'></label>
                                            <a name='weMax' id='weMax' value=" . $row["weMax"] . ">" . $row["weMax"] . "</a>
                                        </div>
                                        <div class='col-1'>
                                            <button type='submit' class='btn btn-success btn-sm'>Delete</button>
                                       </div>
                                    </div>
                                </form>
                            </li>";
                    };
                    ?>
                    <li class="list-group-item py-1">
                        <form action="../helpers/addWish.php" method="post">
                            <div class='row'>
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" id="beschrijving" name="beschrijving" placeholder="Beschrijving">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" id="url" name="url" placeholder="Url beginnend met https://">
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control form-control-sm" id="max" name="max" placeholder="Max.">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>