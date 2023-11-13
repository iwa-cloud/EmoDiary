<?php
session_start();
$_SESSION['input_mail'] = $_POST['mail'];
$_SESSION['input_pass'] = $_POST['pass'];

require_once './DBManager.php';
$dbmng = new DBManager();

// ユーザーが存在するかチェック
$user = $dbmng -> userExist($_SESSION['input_mail'], $_SESSION['input_pass']);

if($user == "error") {
    $_SESSION['error'] = "メールアドレスまたはパスワードが違います。";
    header('Location:login_input.php');
}else{
    // エラー文を消去
    $_SESSION['error'] = "";
    $_SESSION['user_id'] = $user;
    header('Location:top.php');
}
?>