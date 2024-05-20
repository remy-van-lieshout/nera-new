<?php 
session_start();
include '../helpers/db_connection.php';

DeleteWish($_POST['weId'], $_SESSION['user']);

header('Refresh: 0; URL =../src/Admin.php');
?>