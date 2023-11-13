<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();
// $userNameDouble = $dbmng->userDoubleCheck($_POST['name']);
$userMailDouble = $dbmng->mailDoubleCheck($_POST['mail']);


if(count($userMailDouble) >= 1){
    $_SESSION['error'] = "メールアドレスが重複しています。";
    header('Location: sign_up.php');
}else if($_POST['pass'] != $_POST['confirmpass']){
    $_SESSION['error'] = "パスワードが一致していませんs";
    header('Location: sign_up.php');
}else{
    // エラー文を消去
    $_SESSION['error'] = "";
    $_SESSION['input_user_name'] = $_POST['name'];
    $_SESSION['input_pass'] = $_POST['pass'];
    $_SESSION['input_mail'] = $_POST['mail'];
    header('Location: sign_up_chk.php');
}
?>