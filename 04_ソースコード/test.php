<?php
    //FTPサーバとアカウント情報
    $server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
    $user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
    $pass = "Pass0219"; //送り先のFTPパスワード
    $remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
    $localDir = './img/'; //ローカル側の一時アップロードディレクトリ

if( $_FILES['file']['size'] > 0 ){
    $errorPlace = "";

    do{

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

        //ローカル側に一度アップロード
        if( !move_uploaded_file($_FILES['file']["tmp_name"], $local) ) break;

        if( !ftp_put($ftp, $remote, $local, FTP_BINARY) ) break;
        
        $errorPlace = "失敗";

        //ローカル側のファイルを削除
        unlink( $localDir . $_FILES['file']['name'] );

        //接続を閉じる
        ftp_close($ftp);
        $flg = true;

    }while(0);

    if( $flg ){
        $alert = "<script type='text/javascript'>alert('成功". $errorPlace."');</script>";
        echo $alert;
    }else{
        $alert = "<script type='text/javascript'>alert('".$errorPlace."');</script>";
        echo $alert;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file"><br>
    <input type="submit" value="submit">
</form>
</body>
</html>