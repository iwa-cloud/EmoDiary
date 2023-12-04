<?php
  session_start(); 
  $_SESSION['user_id'] = "";
  $_SESSION['input_mail'] = "";
  $_SESSION['input_pass'] = "";
  $_SESSION['error'] = "";
  $_SESSION['select_name'] = "new";
?>
<!DOCTYPE html>
<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>ログイン画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
        <div class="col-md-10" href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
            
          </div>
      </div>
    </div>
  </nav>

<div id="maindiv" class="container">
        <div class = "row mt-5">
            <div class="offset-md-3 col-md-6">
              <div class="container-fluid">
              <br>
                <div class="text-center mt-3">
                  <img src="./logo.png" width="50%">
                </div>
                <br>
                <br>
                <br>
                <br>
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <div class="d-grid gap-2">
                        <br>
                        <br>
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="background:white; color:#DCB3FC;" onclick="location.href='./login_input.php'">ログイン</button>
                        <br>
                        <button type="button" class="btn btn-outline-secondary btn-lg btn-block" style="background:white; color:#DCB3FC;" onclick="location.href='./sign_up.php'">新規登録</button>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="./header.js"></script> -->
    </body>
</html>