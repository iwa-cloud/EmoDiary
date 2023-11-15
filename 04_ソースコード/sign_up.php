<?php
  session_start();
  $_SESSION['page'] = "sign_up";
  if(isset($_SESSION['name']) == true && isset($_SESSION['id']) == true && isset($_SESSION['useer_id']) == true){
      header('Location:../try.html');
  }       
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
    <body>
    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='./login.php'"></i>&emsp;<href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
                <div class="col-md-2" style="text-align:right">
                  <details>
                      <!-- <summary>
                        <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='.php'"></i>&emsp;
                        <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='.php'"></i>&emsp;
                        <i type="button" class="bi bi-person-fill" style="font-size:40px"></i>
                      </summary>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン</button>
                    <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ユーザ情報変更</button> -->
                    <summary>
                            <!-- //元のコード -->
                          <!-- <div id="first">
                            <i type="button" id="first_1" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;
                            <i type="button" id="first_2" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
                            <i type="button" id="first_3" class="bi bi-person-fill" style="font-size:40px" onclick="removeExample()"></i> 
                            </div> -->
                            <!-- //クラスの切り替えテスト -->
                            <div id="first" class="first">
                              <i type="button" id="parent" class="bi bi-person-fill" style="font-size:25px;" ></i>
                              <i type="button" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='search.php'"></i>&emsp;
                            <i type="button" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='data_input.php.php'"></i>&emsp;
                            <button type="button" id="first2_2" class="hidden" onclick="location.href='logout.php'">ログアウト</button>
                            <button type="button" id="first2_1" class="hidden" onclick="location.href='usr_inf_chg_input.php'">ユーザー変更画面</button>
                            <!-- <i type="button" id="first2_2" class="hidden" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp;                   
                            <i type="button" id="first2_1" class="hidden" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp; -->
    
                            </div>
                            </summary>
                            <!-- <script type="text/javascript">
                             const element = document.getElementById("first");
                             const element_1 = document.getElementById("first1_1");
                             const element_2 = document.getElementById("first1_2");
                             const element_3 = document.getElementById("first2_1");
                             const element_4 = document.getElementById("first2_2");
                             const Button = document.getElementById("parent");
                            Button.addEventListener("click",function(){
                              if(element_1.classList.contains("visible")) {
                                  element_1.classList.remove("visible");
                                 element_1.classList.add("hidden");
                                  element_2.classList.remove("visible");
                                  element_2.classList.add("hidden");
                                  element_3.classList.remove("hidden");
                                  element_3.classList.add("visible");
                                  element_4.classList.remove("hidden");
                                  element_4.classList.add("visible");
                                }else{
                                  element_1.classList.remove("hidden");
                                 element_1.classList.add("visible");
                                  element_2.classList.remove("hidden");
                                  element_2.classList.add("visible");
                                  element_3.classList.remove("visible");
                                  element_3.classList.add("hidden");
                                  element_4.classList.remove("visible");
                                  element_4.classList.add("hidden");
                                }
                            });
                            // function removeExample(){
                            //           element_1.remove();
                            //           element_2.remove();
                            //           element_3.remove();
                            //           element.innerHTML= '<button id="first_1">ログアウト</button>';
                            //           element.innerHTML= '<button id="first_2">ユーザー情報変更</button>';
                            //           element.innerHTML= '<i type="button" id="first_3" class="bi bi-person-fill" style="font-size:20px;" onclick="restore()"></i>';
                                    
                            //  }
    
                            //  function restore(){
                            //           element_1.remove();
                            //           element_2.remove();
                            //           element_3.remove();
                            //           element.innerHTML= '<i type="button" id="first_1" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;';
                            //           element.innerHTML= '<i type="button" id="first_2" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;';
                            //           element.innerHTML= '<i type="button" id="first_3" class="bi bi-person-fill" style="font-size:40px" onclick="removeExample()"></i> ';
                            //  }
                            </script> -->
                  </details>
                            </div>
                </div>
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
            <form action="sign_up_input_chk.php" method="post">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">name</p>
                        <input type="textbox" name="name" class="form-control" id="txt1" required>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">mail</p>
                        <input type="email" name="mail" class="form-control" id="txt2" required>
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
                        <input type="password" name="pass" class="form-control" id="pwd1" required>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="chk1" style="margin-top: 50px;"> Show Password
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p style="text-align: left; color:#DCB3FC;">confirmpass</p>
                        <input type="password" name="confirmpass" class="form-control" id="pwd2" required>
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
