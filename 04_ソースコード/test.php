<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>検索画面</title>
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
        <div class="col-md-2" style="text-align:right">
          <details>
            <summary>
              <div id="first" class="first">
                <i type="button" id="parent" class="bi bi-person-fill" style="font-size:25px;" ></i>
                <i type="button" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp;
                <i type="button" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp;
                <button type="button" id="first2_2" class="hidden" onclick="location.href='login.php'">ログアウト</button>
                <button type="button" id="first2_1" class="hidden" onclick="location.href='login.php'">ユーザー変更画面</button>
              </div>
            </summary>
          </details>
        </div>
      </div>
    </div>
  </nav>

  <div class="controller">
    <div class="line">
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <input class="content" type="text" placeholder="メモ検索欄" style="color: black;">
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <input type="date" id="reservationDate" placeholder="年／月／日">
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <input class="content" placeholder="タイトル検索欄" style="color: black;">
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <select class="content"  type="text" name="example"  onchange="changeColor(this)">
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <option class="content" value="" selected hidden>タグ検索欄1</option>
            <option>サンプル</option>
          </div>
          </select>
    </div>
    </div>
  </div>
  </div>
  <script>
    function changeColor(hoge){
      if( hoge.value == 0 ){
          hoge.style.color = '';
      }else{
          hoge.style.color = 'black';
      }
  }
   
  document.getElementById("reservationDate").addEventListener("change", function () {
    this.style.color = "black"; // 選択後の色を濃いグレーに変更
  });
  </script>
  <script src="./header.js"></script>
  </body>
  </html>