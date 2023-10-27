<!-- <?php
            session_start();
            if(isset($_SESSION['name']) == true && isset($_SESSION['id']) == true && isset($_SESSION['useer_id']) == true){
                header('Location:../try.php');
            }


            // require_once './DBManager.php';
            // $dbmng = new DBManager();

            // // 現在時刻を取得
            // $time = $dbmng->getTime();
            // // 最終利用時間を更新するtag_idを入れておく
            // $newTagTimes = ["0000006","0000002"];
            // // 対象data_id
            // $data_id = "0000001";

            // // tag使用時間更新処理（成功）
            // // data_idとtag_idから任意のtagを選択する
            // for($val = 0; $val < count($newTagTimes); $val++){
            //     echo $time;
            //     $tag_id = $newTagTimes[$val];
            //     // 引数（更新時間、data_id、tag_id）
            //     $test = $dbmng->updateTagTimeSub($time, $data_id, $tag_id);
            // }
    ?> -->
<!DOCTYPE html>
<html lang="ja">
<head>
<div class="container-fluid">
    <!-- <div class="text-center mt-3"> -->
    <!-- <img src="./logo.png" width="15%"> -->
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ登録画面</title>
    <style>
        .a{
        border: none;
        outline: none;
        border-bottom: 1px solid #999;
        padding: 5px 10px;
        }
  </style>
    </style>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>

    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i><href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
                <div class="col-md-2" style="text-align:right">
                  <!-- <details>
                      <summary> -->
                        <div id="first">
                        <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" class="bi bi-person-fill" style="font-size:40px" onclick="removeExample(this)"></i>
                        </div>
                        <script type="text/javascript">
                            function removeExample(button){
                                let parent = button.parentNode;
					            parent.remove();
                                
                            }
                        </script>
                        <!-- </summary>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン</button>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ユーザ情報変更</button>
                  </details> -->
                </div>
          </div>
        </div>
      </nav>



    <div class="container-fluid">
        <!-- <div class="text-center mt-3">
                <h2>ログイン</h2>
        </div> -->
        <div class="text-danger text-center">
            <!-- <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?> -->
        </div>
        <form action="logincheck.php" method="post">
            <div class="row offset-sm-0 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">タイトル</div>
                <input type="email" name="mail" class="form-control" id="txt1" required>
            </div>
            <div class="row offset-sm-0 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">URL(任意)</div>
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-0 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">ハッシュタグ</div>
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-0 offset-10 col-sm-2  col-6 mt-3">
                <!-- <div style="color: #DCB3FC; text-align:left">URL(任意)</div> -->
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-1 offset-3 col-sm-1 col-6 mt-1">
                <input type="submit" class="btn btn-outline-secondary" name="login" value="#" style="background:white; color:#DCB3FC">
            </div>
            <div class="row offset-sm-0 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">URL(任意)</div>
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-0 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">文章</div>
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-10 offset-3 col-sm-1  col-6 mt-0">
                <input type="submit" class="btn btn-outline-secondary" name="login" value="登録" style="background:white; color:#DCB3FC">
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6" Style="margin-left:1px;"><input type="password" name="pass" class="form-control" id="txt2" required>&emsp;<input type="submit" class="btn btn-outline-secondary" name="login" value="#" style="background:white; color:#DCB3FC"></div>
                    <div class="col-md-6"></div>
                      <!-- <div class="col-md-4" style="text-align:right"><i type="button" class="bi bi-plus-square" style="font-size:40px;"></i>&emsp;<i type="button" class="bi bi-search" style="font-size:40px"></i>&emsp;<i type="button" class="bi bi-person-fill" style="font-size:40px"></i></div> -->
                      </div>
            </div>

        </form>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
