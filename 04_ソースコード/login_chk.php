<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

// ログインしているか
if ($_SESSION['user_id'] == "") {
    header('Location: login.php');
} else {
    $page = "Location: " . $_SESSION['page'] . ".php";
    header($page);
}
?>