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
    <title>Nera</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/neraIcon.ico">
</head>

<body>
    <main class="main">
        <div class="content">
            <div class="container pt-5 fontNormal">
                <?php
                echo ("<p class='fontTitle'> Welkom " . "{$_SESSION['user']}" . "</p>");
                ?>
                <form action="../helpers/checkWish.php" method="post">
                    <ul class="list-group list-group-flush">
                        <?php
                        $result = GetWishList();
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class='list-group-item'> <form action='../helpers/deleteWish.php' method='post'>
                        <input type='checkbox' value=" . $row["weId"] . " name=" . $row["weId"] . " 
                        id=" . $row["weId"] . " " . ($row['weChecked'] == 1 ? 'checked' : '') . "> 
                        <a class='url' href=" . $row["weUrl"] . ">" . $row["weBeschrijving"] . "</a>
                        <button type='submit' class='btn btn-success' style='float:right'>Delete</button>
                        </form></li>";
                        };
                        ?>
                        <li class="list-group-item">
                        <form action="../helpers/addWish.php" method="post" class="inline">
                            <input type="checkbox" value="" name="checked" id="checked">
                            <input type="text" class="form-control" id="beschrijving" name="beschrijving" placeholder="Beschrijving">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </li>
                    </ul>
                </form>

                <form action="../helpers/logout.php" method="post">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>