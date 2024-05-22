<?php
if ($_SESSION['user'] == null) {
    header('Location: ../index.php');
}
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand url">Welkom <?php echo $_SESSION['user']; ?></a>
    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navb" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navb">
        <ul class="navbar-nav" style="flex: 1; justify-content: end;">
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
    </div>
</nav>