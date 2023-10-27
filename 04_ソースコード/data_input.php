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
<<<<<<< Updated upstream
    <style>
  </style>
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
=======


    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
>>>>>>> Stashed changes
</head>
<body>
 
    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i>&emsp; <href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
                <div class="col-md-2" style="text-align:right">
<<<<<<< Updated upstream
                  <details>
                      <summary>
                        <!-- <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp; -->
                        <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" class="bi bi-person-fill" style="font-size:40px"></i>
                      </summary>
=======
                  <!-- <details>
                      <summary> -->
                        <div id="first">
                        <i type="button" id="first_1" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" id="first_2" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" id="first_3" class="bi bi-person-fill" style="font-size:40px" onclick="removeExample()"></i>
                        </div>
                        <script type="text/javascript">
                         const element = document.getElementById("first");
                         const element_1 = document.getElementById("first_1");
                         const element_2 = document.getElementById("first_2");
                        //  const element_3 = document.getElementById("first_3");
                            function removeExample(){
					            element_1.remove();
                                element_2.remove();
                                // element_3.remove();
                                element.innerHTML+= '<i type="button" style="font-size:20px;">ログアウト</i>';
                                element.innerHTML+= '<i type="button" style="font-size:20px;">ユーザー情報変更</i>';
                                // element.innnerHTML +='<button name="button">クリックしてね</button>';
                                // document.write('<button name="button">クリックしてね</button>');
                                // document.write('</div>');
                            }
                        </script>
                        <!-- </summary>
>>>>>>> Stashed changes
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン</button>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ユーザ情報変更</button>
                  </details>
                </div>
            </div>
          </div>
        </div>
      </nav>
<<<<<<< Updated upstream
 
    <form action="#" method="post">
      <br>
      <br>
        <p class="b" style="color:#DCB3FC">タイトル<br>
            <input type="text" name="title">
        </p>
        <p class="b" style="color:#DCB3FC">URL(任意)<br>
            <input type="text" name="url">
        </p>
        <p class="b" style="color:#DCB3FC">ハッシュタグ<br>
            <select class="content1"  type="text" autocomplete="on" placeholder="メモ検索欄">
            <option value="" selected hidden></option> <option>サンプル</option></select>
        </p>
        <p class="c">
            <input type="text" name="tagu" style="height:50px; width:45%">
            <input type="button" class="btn btn-outline-secondary" value="#" id="button1" style="width:5%; background-color:white; color:#DCB3FC">
        </p>
        <p class="b">
            <!-- <input type="text" name="tagu"> -->
            <select class="content1"  type="text" autocomplete="on" placeholder="メモ検索欄">
                <option value="" selected hidden></option> <option>サンプル</option></select>
        </p>
        <p class="b" style="color:#DCB3FC">文章<br>
          <input type="text" name="bin">
          <br>
          <div class="ky1">
            <button class="form-control" style="color:#DCB3FC; width: 100px; "onclick="location.href='login.php'">登録</button>
          </div>
        </p>
    </form>
=======



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
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
>>>>>>> Stashed changes
</body>
</html>