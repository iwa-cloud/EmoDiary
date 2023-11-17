<?php
session_start();
$_SESSION['input_name'] = $_POST['name'];
$_SESSION['input_pass'] = $_POST['pass'];
$_SESSION['input_cpass'] = $_POST['cpass'];

require_once './DBManager.php';
$dbmng = new DBManager();


// 入力したパスワードが一致しているか
if(strcmp($_SESSION['input_pass'], $_SESSION['input_cpass']) != 0) {
    $_SESSION['error'] = "パスワードが一致していません。";
    header('Location:usr_inf_chg_input.php');
}else{
    // // エラー文を消去
    // $_SESSION['error'] = "";
    // // ユーザー情報変更処理
    // $user = $dbmng -> updateUserInfo($_SESSION['user_id'], $_SESSION['input_name'], $_SESSION['input_pass']);

    header('Location:usr_inf_chg_chk.php');
}
?>