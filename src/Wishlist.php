<?php
session_start();
include '../helpers/db_connection.php';


if ($_SESSION['user'] == null){
    header('Location: ../index.php');
}

function IsNullOrEmptyString($str){
    return ($str === null || trim($str) === '');
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
                <p> In onderstaande lijst staan wat tips voor een kraamcadeau. Zet een vinkje om dubbele cadeau's te voorkomen.</p>
                <ul class="list-group list-group-flush">
                    <?php
                    $result = GetWishList();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item py-1'>
                                <form action='../helpers/checkWish.php' method='post'>
                                <div class='row'>
                                    <div class='d-none'>
                                        <input type='hidden' name='weId' value=" . $row["weId"] . ">
                                    </div>
                                    <div class='d-none'>
                                        <input type='hidden' name='weMax' value=" . $row["weMax"] . ">
                                    </div>";
                        if(IsNullOrEmptyString($row['weUser']) || $row['weUser'] == $_SESSION['user']) {
                            echo "<div class='col-1'>
                                        <input type='checkbox' value=" . $row["weChecked"] . " name=checked" . $row["weId"] . " onchange='this.form.submit()' " . ($row['weChecked']==1 ? 'checked' : '') . ">
                                  </div>
                                  <div class='col'>
                                    <a class='url' href=" . $row["weUrl"] . " target='_blank'>" . $row["weBeschrijving"] . "</a>
                                  </div>"
                                  ;
                        } else if ($row["weChecked"]){
                            echo "<div class='col-1'>
                                        <input type='checkbox' value=" . $row["weChecked"] . " name=checked" . $row["weId"] . " onchange='this.form.submit()' " . ($row['weChecked']==1 ? 'checked' : '') . " disabled>
                                  </div>
                                  <div class='col'>
                                    <s class='disabledItem'>" . $row["weBeschrijving"] . "</s>
                                  </div>";
                        } else {
                            echo "<div class='col-1'>
                                    <input type='checkbox' value=" . $row["weChecked"] . " name=checked" . $row["weId"] . " onchange='this.form.submit()' " . ($row['weChecked']==1 ? 'checked' : '') . " disabled>
                                  </div>
                                  <div class='col'>
                                    <a class='url' href=" . $row["weUrl"] . " target='_blank'>" . $row["weBeschrijving"] . "</a>
                                  </div>";
                        }
                            echo "</form>
                            </li>";
                    };
                    ?>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>