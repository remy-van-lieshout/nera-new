<?php
if ($_SESSION['user'] == null) {
    header('Location: ../index.php');
}
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
    <a class="navbar-brand url">Welkom <?php echo $_SESSION['user']; ?></a>
    <ul class="nav navbar-nav">
        <?php
        if ($_SESSION['user'] == 'admin') {
            if (str_ends_with($_SERVER['SCRIPT_NAME'], "/Admin.php")) {
                echo "<li class='nav-item active'>
                        <a class='nav-link' href='../src/Admin.php'>Admin</a>
                      </li>";
            } else {
                echo "<li class='nav-item'>
                        <a class='nav-link' href='../src/Admin.php'>Admin</a>
                      </li>";
            }
        }
        ?>
        <li class="nav-item <?php if (str_ends_with($_SERVER['SCRIPT_NAME'], "/Home.php")) {
                                echo 'active';
                            } ?>">
            <a class="nav-link" href="../src/Home.php">Home</a>
        </li>
        <li class="nav-item <?php if (str_ends_with($_SERVER['SCRIPT_NAME'], "/Wishlist.php")) {
                                echo 'active';
                            } ?>">
            <a class="nav-link" href="../src/Wishlist.php">Wensenlijst</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../helpers/logout.php">Uitloggen</a>
        </li>
    </ul>
</nav>