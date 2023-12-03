<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();
$_SESSION['test'] = "";

// photoテーブルの最後のid+1の値を取得
$photoMaxId = $dbmng->getPhotoNextId();

$data_id;
if($_SESSION['newData'] == true) {
    // 登録するデータidを取得
    $data_id = $dbmng->getMaxDataId();
    $data_id = $dbmng->nextId($data_id);
}else{
    $data_id = $_SESSION['data_id'];
}

// 画像の名前を格納
$photoName;

//FTPサーバとアカウント情報
$server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
$user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
$pass = "Pass0219"; //送り先のFTPパスワード
$remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
$localDir = './tmpImg/'; //一時アップロードディレクトリ

    // 画像ファイルが送られれば処理を開始
if( $_FILES['file']['size'] > 0 ){
    // 写真の名前と拡張子を設定
    $photoName = $photoMaxId . strstr($_FILES['file']['name'], '.');
    
    // 写真のパス
    $photoPass = "./img/" . $photoName;


    $errorPlace = "";

    do{
        // 処理が全て実行されれば「true」になる
        $flg = false;

        //FTPサーバに接続
        $ftp = ftp_connect($server);
        if( !$ftp ) break;

        //ログイン
        if( !ftp_login($ftp, $user, $pass) ) break;
        
        //PASVモードへ変更
	    ftp_pasv($ftp, true);

        //アップロード
        $local = $localDir . $_FILES['file']['name']; //アップロードするファイル
        
        $remote = $remoteDir . $photoName; //アップロード時の名前

        //一時フォルダに一度アップロード
        if( !move_uploaded_file($_FILES['file']["tmp_name"], $local) ) break;

        // 一時フォルダから送り先ディレクトリにアップロード
        if( !ftp_put($ftp, $remote, $local, FTP_BINARY) ) break;

        //ローカル側のファイルを削除
        unlink( $localDir . $_FILES['file']['name'] );

        //接続を閉じる
        ftp_close($ftp);
        $flg = true;

    }while(0);

    if( $flg ){
        // alertの文字を格納
        $alert = "成功";
    }else{
        // alertの文字を格納
        $alert = "失敗";
    }
}else{
    $photoPass = "none";
}


// 初期化
$title = "ありません";
$url = "ありません";
$memo = "ありません";
// $img = "ありません";
// 複数入ってる可能性あり
$tags;

// 入力値があれば代入
if(!empty($_POST['title'])) {
    $title = $_POST['title'];
}
if(!empty($_POST['url'])) {
    $url = $_POST['url'];
}
// メモはnameが「bin」になってた
if(!empty($_POST['bin'])) {
    $memo = $_POST['bin'];
}
if(!empty($_POST['hiddenSelectTags'])) {
    $tags = $_POST['hiddenSelectTags'];
}

// $_SESSION['test'] = $data_id;

// 作成時間を取得
$time = $dbmng->getTime();

// DBにデータを登録
$result = $dbmng->insertData($data_id, $_SESSION['user_id'], $title, $url, $memo, $time);

if($photoPass != "none") {
    // photoテーブルに写真のパスを保存、photoAndDataテーブルで結びつけ
    $insertPhoto = $dbmng->insertPhoto($data_id,$photoPass);
}

// tagテーブルにtagを保存、tagAndDataテーブルに結びつけ
for($i = 0; $i < count($tags); $i++) {
    $insertTag = $dbmng->tagDoubleSearch($data_id, $tags[$i], $time);
}

$_SESSION['error'] = "";
// $_SESSION['test'] = $alert;
// $_SESSION['user_id'] = $user;
header('Location:top.php');

?>
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php
    // echo $title;
    ?></h2>
    <h2><?php
    // echo $url;
    ?></h2>
    <h2><?php
    // foreach($tags  as $option) {
    //     echo $option . "  ";
    // }
    ?></h2>
    <h2><?php
    // echo $memo;
    ?></h2>
    <h2><?php
    // echo $photoPass;
    ?></h2>
</body>
</html> -->