<?php

//     require_once './DBManager.php';
//     $dbmng = new DBManager();

//     // photoテーブルの最後のid+1の値を取得
//     $photoMaxId = $dbmng->getPhotoNextId();

//     // 写真の名前と拡張子を設定
//     $photoName = $photoMaxId . ".jpeg";

//     // 試験的に表示
//     echo '<h1>';
//     var_dump($photoName);
//     echo '</h1>';

//     //FTPサーバとアカウント情報
//     $server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
//     $user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
//     $pass = "Pass0219"; //送り先のFTPパスワード
//     $remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
//     $localDir = './tmpImg/'; //一時アップロードディレクトリ

//     // 画像ファイルが送られれば処理を開始
// if( $_FILES['file']['size'] > 0 ){
//     $errorPlace = "";

//     do{
//         // 処理が全て実行されれば「true」になる
//         $flg = false;

//         //FTPサーバに接続
//         $ftp = ftp_connect($server);
//         if( !$ftp ) break;

//         //ログイン
//         if( !ftp_login($ftp, $user, $pass) ) break;
        
//         //PASVモードへ変更
// 	    ftp_pasv($ftp, true);

//         //アップロード
//         $local = $localDir . $_FILES['file']['name']; //アップロードするファイル
        
//         $remote = $remoteDir . $photoName; //アップロード時の名前

//         //一時フォルダに一度アップロード
//         if( !move_uploaded_file($_FILES['file']["tmp_name"], $local) ) break;

//         // 一時フォルダから送り先ディレクトリにアップロード
//         if( !ftp_put($ftp, $remote, $local, FTP_BINARY) ) break;
        
//         // //テストメモ
//         // $errorPlace = "通ってる";

//         //ローカル側のファイルを削除
//         unlink( $localDir . $_FILES['file']['name'] );

//         //接続を閉じる
//         ftp_close($ftp);
//         $flg = true;

//     }while(0);

//     if( $flg ){
//         // 写真のパス
//         $photoPass = "./img/" . $photoName;
//         // data_idは（仮）
//         $data_id = "0000001";

//         // photoテーブルに写真のパスを保存、photoAndDataテーブルで結びつけ
//         $insertPhoto = $dbmng->insertPhoto($data_id,$photoMaxId,$photoPass);

//         // alertの文字を格納
//         $alert = "成功";
//     }else{
//         // alertの文字を格納
//         $alert = "失敗";
//     }

//     $_SESSION['error'] = "";
//     $_SESSION['user_id'] = $user;
//     header('Location:top.php');
// }

// 初期化
$title = "ありません";
$url = "ありません";
$memo = "ありません";
$img = "ありません";
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
if(!empty($_POST['selectTags'])) {
    $tags = $_POST['selectTags'];
}
if($_FILES['file']['size'] > 0) {
    $img = $_FILES['file']['name'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo $title; ?></h2>
    <h2><?php echo $url; ?></h2>
    <h2><?php foreach($tags  as $option) {
        echo $option . "  ";
    } ?></h2>
    <h2><?php echo $memo; ?></h2>
    <h2><?php echo $img; ?></h2>
</body>
</html>