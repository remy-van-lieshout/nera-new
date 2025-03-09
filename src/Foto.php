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
    <title><?php echo str_contains($_SERVER['SERVER_NAME'], "nera") ? "Nera" : "Familie van Lieshout"; ?></title>
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
                <h1>Upload foto's</h1>
                <form action="" method="post" enctype="multipart/form-data" class="mb-4">
                    <input type="file" name="photos[]" multiple class="form-control mb-2">
                    <input type="submit" name="upload" value="Upload" class="btn btn-primary">
                </form>

                <?php if (isset($_POST['upload'])): ?>
                    <?php
                    $uploadDir = 'uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

                    foreach ($_FILES['photos']['tmp_name'] as $key => $tmpName) {
                        $fileName = basename($_FILES['photos']['name'][$key]);
                        $targetFilePath = $uploadDir . $fileName;
                        $fileMimeType = mime_content_type($tmpName);

                        if (in_array($fileMimeType, $allowedMimeTypes)) {
                            if (move_uploaded_file($tmpName, $targetFilePath)): ?>
                                <p class="text-success">Uploaded: <?= htmlspecialchars($fileName) ?></p>
                            <?php else: ?>
                                <p class="text-danger">Failed to upload: <?= htmlspecialchars($fileName) ?></p>
                            <?php endif; ?>
                        <?php } else { ?>
                            <p class="text-danger">Invalid file type: <?= htmlspecialchars($fileName) ?></p>
                        <?php }
                    }
                    ?>
                <?php endif; ?>

                <?php
                // Display uploaded photos
                $uploadedPhotos = glob('uploads/*');
                if (!empty($uploadedPhotos)):
                ?>
                    <h2>Foto's</h2>
                    <div class="row">
                        <?php foreach ($uploadedPhotos as $photo): ?>
                            <div class="col-md-3">
                                <img src="<?= htmlspecialchars($photo) ?>" alt="<?= htmlspecialchars(basename($photo)) ?>" class="img-thumbnail mb-2">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>