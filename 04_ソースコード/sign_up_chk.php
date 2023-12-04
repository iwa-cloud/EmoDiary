<?php
  session_start();
  // if(isset($_SESSION['name']) == true && isset($_SESSION['id']) == true && isset($_SESSION['useer_id']) == true){
  //     header('Location:../try.html');
  // }       
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新規登録確認</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="style.css">
<style>
  .visible {
      display: block;
      /* width : 25px; */
  }

  .hidden {
      display: none;
      /* width : 25px; */
  }
  #first{
    align-items: flex-end;
    white-space: nowrap;
  }
  #first1_1{
    width : 25px;
    float: right;
    margin-right: 20px;
  }
  #first1_2{
    width : 25px;
    float: right;
    margin-right: 20px;
  }
  /* #first2_1{
    width : 75px;
    float: right;
    margin-right: 20px;
  }
  #first2_2{
    width : 75px;
    float: right;
    margin-right: 20px;
  } */

  #parent {
    /* width:25px; */
    float: right;
  }
  .half{
    float:  left;               
    margin:  5px;
    padding:  10px;  
  }
</style>
</head>
<body>
<nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
<div class="container-fluid">
<div class="row">
  <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='./sign_up.php'"></i>&emsp; <href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
      
                  </div>
</div>
</div>
</nav>
  <div class="text-danger text-center">
      <!-- <?php
      if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
      }
      ?> -->
  </div>
</nav>
      <div class="text-danger text-center">
      </div>
      <br>
      <br>
      <br>
      <br>
      <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
      <p style="color: #ff0000; font-size: 20px; text-align: center;">この内容で登録しますか</p>
      </div>
      <br>
      <br>
      <form action="./sign_up_regist.php" method="post">
        <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
          <div style="color: #DCB3FC; text-align:left;">
            name:<?php echo $_SESSION ['input_user_name']?>
          </div>
          <div class="a" name="name"></div>
      </div>
      <br>
      <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
          <div style="color: #DCB3FC; text-align:left">
            mail:<?php echo $_SESSION ['input_mail']?>
          </div>
          <div class="a" name="pass"></div>
      </div>
      <br>
      <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
          <div style="color: #DCB3FC; text-align:left;">
            pass:<?php echo $_SESSION ['input_pass']?>
          </div>
          <div class="a" name="name"></div>
      </div>
          <br>
          <div class="container">
              <div class="row">
                  <div class="col-md-3 mt-4"></div>
                  <div class="col-md-3 mt-4">
                      <input type="submit" class="form-control" value="登録" style="color:#DCB3FC;">
                  </div>
                  <div class="col-md-3 mt-4">
                      <input type="submit" class="form-control" value="戻る" style="color:#DCB3FC;">
                  </div>
                  <div class="col-md-3 mt-4"></div>
              </div>
          </div>
      </form>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./header.js"></script>
</body>
</html>
