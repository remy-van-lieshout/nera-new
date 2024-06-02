<?php
ob_start();
session_start();

include 'helpers/db_connection.php';
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title><?php echo str_contains($_SERVER['SERVER_NAME'], "nera") ? "Nera" : "Familie van Lieshout";?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/icon.ico">
</head>

<body>
    <?php
    $msg = '';
    $code = 'jrjn430';
    $adminCode = '616760';

    if (
        isset($_POST['login']) && !empty($_POST['user'])
        && !empty($_POST['code'])
    ) {
        if ($_POST['code'] == $code || $_POST['code'] == $adminCode) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['user'] = $_POST['user'];
            if ($_POST['user'] == 'admin' && $_POST['code'] == $adminCode) {
                CreateLog('login admin', $_POST['user'], true, '');
                header('Location: src/Admin.php');
            } else {
                CreateLog('login user', $_POST['user'], true, '');
                header('Location: src/Home.php');
            }
        } else {
            $msg = "De code is niet correct!";
            CreateLog('login', $_POST['user'], false, $msg);
        }
    }
    ?>

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
        <div class="content">
            <div class="container pt-5">
                <div class="d-flex justify-content-center h-150">
                    <div class="card">
                        <div class="card-header">
                            <h3>Welkom op de pagina van <?php echo str_contains($_SERVER['SERVER_NAME'], "nera") ? "Nera " : "Familie ";?>van Lieshout!</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" class="form-control" name="user" placeholder="Naam">
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" class="form-control" name="code" placeholder="Code">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" class="btn btn-success">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p style="color:red;"><?php echo $msg; ?></p>
                            <div class="d-flex justify-content-center">
                                Je hoeft niet geregistreerd te zijn om te kunnen inloggen, enkel de juiste code geeft toegang
                                tot deze website. Mocht je hier meer informatie over wensen, neem dan contact op met een van
                                de ouders.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>