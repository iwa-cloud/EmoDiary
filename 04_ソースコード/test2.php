<?php
    if( $_FILES['file']['size'] > 0 ){
        $errorPlace = "";
    
        do{
            $flg = false;
    
            //FTPサーバとアカウント情報
            $server = "ftp.lolipop.jp"; //送り先のFTPサーバー名もしくはIP
            $user = "daa.jp-jolly-ohita-1184"; //送り先のFTPユーザ
            $pass = "Pass0219"; //送り先のFTPパスワード
            $remoteDir = './EmoDiary/img/'; //送り先のディレクトリ
            $localDir = './img/'; //ローカル側の一時アップロードディレクトリ
    
            //FTPサーバに接続
            $ftp = ftp_connect($server);
            if( !$ftp ) break;
            
            //ログイン
            if( !ftp_login($ftp, $user, $pass) ) break;
            
            //FTPサーバ上でディレクトリ移動
            if( !ftp_chdir($ftp, $remoteDir) ) break;
            $errorPlace = "serverDir";
    
            //ローカル側に一度アップロード
            if( !move_uploaded_file($_FILES['file']["tmp_name"], $localDir . $_FILES['file']['name']) ) break;
    
            //アップロード
            $local = $localDir . $_FILES['file']['name']; //アップロードするファイル
            $remote = $_FILES['file']['name']; //アップロード時の名前
            if( !ftp_put($ftp, $remote, $local, FTP_BINARY) ) break;
    
            //ローカル側のファイルを削除
            unlink( $localDir . $_FILES['file']['name'] );
    
            //接続を閉じる
            ftp_close($ftp);
            $flg = true;
    
        }while(0);
    
        if( $flg ){
            $alert = "<script type='text/javascript'>alert('成功');</script>";
            echo $alert;
        }else{
            $alert = "<script type='text/javascript'>alert('".$errorPlace."');</script>";
            echo $alert;
        }
    }
?>