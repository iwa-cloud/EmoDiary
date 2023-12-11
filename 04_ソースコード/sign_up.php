<?php
  session_start();
  $_SESSION['page'] = "sign_up";
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
        <title>新規登録</title>
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
    <body style=background-color:#fff4ff>
    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='./login.php'"></i>&emsp;<href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
                
          </div>
        </div>
      </nav>
            <div class="text-danger text-center">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="sign_up_input_chk.php" method="post">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">name</p>
                        <input type="textbox" name="name" class="form-control" id="txt1" value="<?php echo $_SESSION ['input_user_name']?>" required>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">mail</p>
                        <input type="email" name="mail" class="form-control" id="txt2" value="<?php echo $_SESSION ['input_mail']?>" required>
                    </div>
                     
                    <!-- エラー表示 -->
                    <?php
                        if ($_SESSION['error'] != "") {
                        echo '<div class="error">';
                        echo $_SESSION['error'];
                        echo '</div>';
                        }
                    ?>

                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">pass</p>
                        <input type="password" name="pass" class="form-control" id="pwd1" value="<?php echo $_SESSION ['input_pass']?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="chk1" style="margin-top: 50px;"> Show Password
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">confirmpass</p>
                        <input type="password" name="confirmpass" class="form-control" id="pwd2" value="<?php echo $_SESSION ['input_pass']?>" required>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="chk2" style="margin-top: 50px;"> Show Password
                    </div>
                    <div class="row offset-sm-4 offset-3 col-sm-4 col-6 mt-4">
                        <input type="submit" class="form-control" value="新規登録" style="color:#DCB3FC;">
                    </div>
                </div>
            </form>
            <script>
                const pwd1 = document.getElementById("pwd1");
                const chk1 = document.getElementById("chk1");
                const pwd2 = document.getElementById("pwd2");
                const chk2 = document.getElementById("chk2");
            
                chk1.onchange = function (e) {
                    pwd1.type = chk1.checked ? "text" : "password";
                };
            
                chk2.onchange = function (e) {
                    pwd2.type = chk2.checked ? "text" : "password";
                };
            </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./header.js"></script>
    </body>
    </html>
