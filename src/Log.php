<?php
session_start();
include '../helpers/db_connection.php';


if ($_SESSION['user'] == null || $_SESSION['user'] != 'admin') {
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
                <p> Logs</p>
                <ul style="max-height: 60vh !important; overflow: auto; padding: 15px;">
                    <?php
                    $result = GetLogs();
                    echo "<li class='list-group-item py-1'>";
                    echo "<div class='row url'>
                                <div class='col-1'>Id</div>
                                <div class='col-4'>Actie</div>
                                <div class='col'>Gebruiker</div>
                                <div class='col'>Timestamp</div>
                                <div class='col-1'>Succes</div>
                                <div class='col-1'>Error</div>
                            </div>";
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row'>
                                <div class='col-1'>" . $row["LoId"] . "</div>
                                <div class='col-4'>" . $row["LoActie"] . "</div>
                                <div class='col'>" . $row["LoUser"] . "</div>
                                <div class='col'>" . $row["LoTimestamp"] . "</div>
                                <div class='col-1'>" . $row["LoSucces"] . "</div>
                                <div class='col-1'>" . $row["LoError"] . "</div>
                            </div>";
                    };
                    echo "</li>";
                    ?>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>