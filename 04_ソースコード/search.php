<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>検索画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10" href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
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
          <div class="col-md-6"><input class="content" type="text" placeholder="メモ検索欄" style="color: black;"></div>
          <div class="col-md-6"></div>
          <div class="col-md-6"><input type="date" id="reservationDate" placeholder="年／月／日"></div>
          <div class="col-md-6"></div>
          <div class="col-md-6"><input class="content" placeholder="タイトル検索欄" style="color: black;"></div>
          <div class="col-md-6"></div>
          <div class="col-md-6"><select class="content"  type="text" name="example"  onchange="changeColor(this)"></div>
          <div class="col-md-6"></div>
          <div class="col-md-6"><option class="content" value="" selected hidden>タグ検索欄1</option><option>サンプル</option></div>
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
  </body>
  </html>