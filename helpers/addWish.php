<?php 
session_start();
include '../helpers/db_connection.php';

AddWish($_SESSION['user'], $_POST['beschrijving'], $_POST['url'], $_POST['max']);	

header('Refresh: 0; URL =../src/Admin.php');
?>