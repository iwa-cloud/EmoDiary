<?php
session_start();

require_once './DBManager.php';
$dbmng = new DBManager();

// ユーザー情報変更
$user = $dbmng -> updateUserInfo($_SESSION ['user_id'], $_SESSION ['input_name'], $_SESSION ['input_pass']);

// エラー文を消去
$_SESSION['error'] = "";
// $_SESSION['user_name'] = $_SESSION ['input_user_name'];
header('Location:usr_inf_chg_com.php');
?>