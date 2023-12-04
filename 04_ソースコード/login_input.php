<?php
    session_start();
    // if(isset($_SESSION['name']) == true && isset($_SESSION['id']) == true && isset($_SESSION['useer_id']) == true){
    //     header('Location:../try.php');
    // }
    ?>
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
        </style>
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
                <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='./login.php'"></i><href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
                    
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
            <br>
            <br>
            <form action="./input_chk.php" method="post">
                          <!-- エラー表示 -->
            <?php
                if ($_SESSION['error'] != "") {
                echo '<div class="error">';
                echo $_SESSION['error'];
                echo '</div>';
                }
            ?>

                <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div style="color: #DCB3FC; text-align:left">mail</div>
                            <input type="email" name="mail" class="form-control" id="txt1" required>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div style="color: #DCB3FC; text-align:left">pass</div>
                            <input type="password" name="pass" class="form-control" id="pwd" required>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="chk" style="margin-top: 40px;"> Show Password
                        </div>
                        <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-5">
                            <input type="submit" class="btn btn-outline-secondary" name="login" value="ログイン" style="background:white; color:#DCB3FC">
                        </div>
                    </form>
                </div>
        <script>
            const pwd = document.getElementById("pwd");
            const chk = document.getElementById("chk");
 
            chk.onchange = function(e){
                pwd.type = chk.checked ? "text" : "password";
            };
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./header.js"></script>
    </body>
    </html>
   
