<?php 
session_start();
include '../helpers/db_connection.php';

$boxValue = isset($_POST['weId']) && isset($_POST['checked'. $_POST['weId']])? '0' : '1';

SetWishChecked($_POST['weId'], $_SESSION['user'], $boxValue);

header('Refresh: 0; URL =../src/Wishlist.php');
?>