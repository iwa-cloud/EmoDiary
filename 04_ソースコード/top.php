<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="style.css">
    <title>TOP画面</title>
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
    <nav class="a" aria-label="Sixth navbar example" style= "background-color: white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i>&emsp; <href="#" style="color:#DCB3FC; font-size:2.5vw;">&emsp;EmoDiary</div>
                <div class="col-md-2" style="text-align:right">
                    <details>
                        <summary>
                          <div id="first" class="first">
                            <i type="button" id="parent" class="bi bi-person-fill" style="font-size:25px;" ></i>
                            <i type="button" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='search.php'"></i>&emsp;
                          <i type="button" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp;
                          <button type="button" id="first2_2" class="hidden" onclick="location.href='logout.php'">ログアウト</button>
                          <button type="button" id="first2_1" class="hidden" onclick="location.href='usr_inf_chg_input.php'">ユーザー変更画面</button>
                            </div>
                        </summary>
                        <script type="text/javascript">
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
                        </script>
              </details>
                        </div>
            </div>
      </div>
    </div>
  </nav>
  <div class="controller">
    <div class="line" style="z-index: 1;">
    </div>
</div>  
  <div id="nav">
    <li><a href="#">最新 ↓</a></li>
    <li><a href="#">タグ ↓</a></li>
    <li><a href="#">日付 ↓</a></li>
    <li><a href="#">編集 ↓</a></li>
  </div>
  </div>
  </div>
</div>
</div>
<div class="container-fluid">
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- <br>
  <br>
  <br> -->
  <div style="margin-bottom: 5vh;">
  <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-7">
      <p class="kk" style="color:#DCB3FC">文章</p>
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-6">
<form method="post" action="sample.cgi" class="h">
  <textarea  class="e" name="kansou" style="min-height: 17vw; max-height: 17vw; min-width: 50vw; max-width: 50vw;"></textarea><br>
  </form>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5"></div>
      <div align="right" class="col-md-6">
          <button class="form-control" style="color:#DCB3FC; width: 10vw;"onclick="location.href='login.php'">共有</button>
      </div>
      <div class="col-md-1"></div>
  </div>
</div>
  </div>
<!-- <p class="kk" style="color:#DCB3FC">文章</p>
<form method="post" action="sample.cgi" class="h">
  <textarea name="kansou" rows="10" cols="100"></textarea><br>
  <div class="ky">
  <button class="form-control" style="color:#DCB3FC; width: 10vw; "onclick="location.href='login.php'">共有</button>
  </div>
  </form> -->
  <script src="./header.js">
  </script>
</body>
</html>

