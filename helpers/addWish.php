<?php 
session_start();
include '../helpers/db_connection.php';

AddWish($_SESSION['user'], $_POST['beschrijving'], $_POST['url']);

header('Refresh: 0; URL =../src/Admin.php');
?>