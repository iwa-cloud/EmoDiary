<!-- <?php
            session_start();
            if(isset($_SESSION['name']) == true && isset($_SESSION['id']) == true && isset($_SESSION['useer_id']) == true){
                header('Location:../try.php');
            }
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
    <title>ログイン入力画面</title>
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
                  <details>
                      <summary>
                        <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
                        <i type="button" class="bi bi-person-fill" style="font-size:40px"></i>
                      </summary>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン</button>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ユーザ情報変更</button>
                  </details>
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="logincheck.php" method="post">
            <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">mail</div>
                <input type="email" name="mail" class="form-control" id="txt1" required>
            </div>
            <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
                <div style="color: #DCB3FC; text-align:left">pass</div>
                <input type="password" name="pass" class="form-control" id="txt2" required>
            </div>
            <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-5">
                <input type="submit" class="btn btn-outline-secondary" name="login" value="ログイン" style="background:white; color:#DCB3FC">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
