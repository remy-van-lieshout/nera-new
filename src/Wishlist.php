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
        <div class="content">
            <div class="container pt-5 fontNormal">
                <?php
                echo ("<p class='fontTitle'> Welkom " . "{$_SESSION['user']}" . "</p>");
                ?>
                <ul class="list-group list-group-flush">
                    <?php
                    $result = GetWishList();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'><form action='../helpers/checkWish.php' method='post'><input type='hidden' name='weId' value=" . $row["weId"] . ">
                        <input type='checkbox' value=" . $row["weChecked"] . " name=checked" . $row["weId"] . " onchange='this.form.submit()' " . ($row['weChecked']==1 ? 'checked' : '') . "> 
                        <a class='url' href=" . $row["weUrl"] . ">" . $row["weBeschrijving"] . "</a></form></li>";
                    };
                    ?>
                </ul>

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