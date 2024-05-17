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
                <p><?php
                    session_start();
                    echo ("<p class='fontTitle'> Welkom " . "{$_SESSION['user']}" . "</p><br />");

                    include '../db_connection.php';

                    $result = GetWishList();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "id: " . $row["weId"] . " - Beschrijving: " . $row["weBeschrijving"] . " " . $row["weLink"] . "<br>";
                    };
                    ?>
                </p>

                <h3>Er word momenteel nog aan deze pagina gewerkt!</h3>

                <form action="../logout.php" method="post">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>