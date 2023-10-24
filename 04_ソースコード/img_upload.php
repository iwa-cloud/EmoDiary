<?php

    require_once './DBManager.php';
    $dbmng = new DBManager();

    // photoテーブルの最後のid+1の値を取得
    $photoMaxId = $dbmng->getPhotoNextId();

    // 写真の名前と拡張子を設定
    $photoName = $photoMaxId . ".jpeg";

    // 試験的に表示
    echo '<h1>';
    var_dump($photoName);
    echo '</h1>';

    //FTPサーバとアカウント情報
    $server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
    $user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
    $pass = "Pass0219"; //送り先のFTPパスワード
    $remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
    $localDir = './tmpImg/'; //一時アップロードディレクトリ

    // 画像ファイルが送られれば処理を開始
if( $_FILES['file']['size'] > 0 ){
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
        
        // //テストメモ
        // $errorPlace = "通ってる";

        //ローカル側のファイルを削除
        unlink( $localDir . $_FILES['file']['name'] );

        //接続を閉じる
        ftp_close($ftp);
        $flg = true;

    }while(0);

    if( $flg ){
        // 写真のパス
        $photoPass = "./img/" . $photoName;
        // data_idは（仮）
        $data_id = "0000001";

        // photoテーブルに写真のパスを保存、photoAndDataテーブルで結びつけ
        $insertPhoto = $dbmng->insertPhoto($data_id,$photoMaxId,$photoPass);

        // alertの文字を格納
        $alert = "成功";
    }else{
        // alertの文字を格納
        $alert = "失敗";
    }

    // 結果を表示
    echo "<script type='text/javascript'>
    alert('". $alert ."');
    window.addEventListener('click', function() {
        history.back();
    });
    </script>";

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
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file"><br>
    <input type="submit" value="submit">
</form>
</body>
</html>