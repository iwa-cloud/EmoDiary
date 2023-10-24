<?php
    //FTPサーバとアカウント情報
    $server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
    $user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
    $pass = "Pass0219"; //送り先のFTPパスワード
    $remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
    $localDir = './tmpImg/'; //一時アップロードディレクトリ

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
        
        $remote = $remoteDir . $_FILES['file']['name']; //アップロード時の名前

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
        $alert = "成功";
    }else{
        $alert = "失敗";
    }

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

</body>
</html>