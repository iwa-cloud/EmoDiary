<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <div class="container-fluid">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザー情報変更確認画面</title>
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
<style>
</style>
<body style=background-color:#fff4ff>
<nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i>&emsp;<a href="./top.php" style="color:#DCB3FC; font-size:40px; text-decoration:none;">&emsp;<b><font face="Comic Sans MS">EmoDiary</a></font></b></div>
            <div class="col-md-2" style="text-align:right">
              <details>
                  <!-- <summary>
                    <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='login.php'"></i>&emsp;
                    <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='login.php'"></i>&emsp;
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
                        <i type="button" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='data_input.php'"></i>&emsp;
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
                        }); -->
                        <!-- // function removeExample(){
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
    </div>
    <br>
    <br>
    <br>
    <br> <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
      <p style="color: #ff0000; font-size: 20px; text-align: center;">この内容で登録しますか</p>
      </div>
    <br>
    <br>
    <form action="./usr_inf_chg.php" method="post">
    <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
        <div style="color: #DCB3FC; text-align:left;">
          name:<?php echo $_SESSION ['input_name']?>
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
            <div class="col-md-6 mt-4">
                <input type="submit" class="form-control" value="登録" style="color:#DCB3FC;">
            </div>
            </div>
          </div>
        </form>
        <div class="container">
          <div class="row">
            <div class="col-md-3 mt-4"></div>
            <div class="col-md-6 mt-4">
                 <input type="submit" class="form-control" value="戻る" style="color:#DCB3FC;" onclick="location.href='usr_inf_chg_input.php';">
            </div>
          </div>
        </div>


    <script src="./header.js"></script>
</body>
</html>