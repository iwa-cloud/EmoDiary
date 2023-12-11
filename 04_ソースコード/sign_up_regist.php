<?php
session_start();

require_once './DBManager.php';
$dbmng = new DBManager();

// ユーザー新規登録
$user = $dbmng -> userRegist($_SESSION ['input_user_name'], $_SESSION ['input_mail'], $_SESSION ['input_pass']);

// エラー文を消去
$_SESSION['error'] = "";
$_SESSION['user_name'] = $_SESSION ['input_user_name'];
header('Location:sign_up_comp.php');
?>