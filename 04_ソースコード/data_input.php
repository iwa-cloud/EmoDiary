<!DOCTYPE html>
<html lang="ja">
<head>
<div class="container-fluid">
    <meta charset="UTF-8">
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ登録画面</title>
    <style>
  </style>
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
  <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i>&emsp;<href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>
            <div class="col-md-2" style="text-align:right">
              <details>
                  <summary>
                    <i type="button" class="bi bi-plus-square" style="font-size:40px;" onclick="location.href='.php'"></i>&emsp;
                    <i type="button" class="bi bi-search" style="font-size:40px" onclick="location.href='.php'"></i>&emsp;
                    <i type="button" class="bi bi-person-fill" style="font-size:40px"></i>
                  </summary>
                <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン</button>
                <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ユーザ情報変更</button>
              </details>
            </div>
      </div>
    </div>
  </nav>
 
    <form action="#" method="post">
      <br>
      <br>
        <p class="b" style="color:#DCB3FC">タイトル<br>
            <input type="text" name="title" required>
        </p>
        <p class="b" style="color:#DCB3FC">URL(任意)<br>
            <input type="text" name="url">
        </p>
        <p class="b" style="color:#DCB3FC">ハッシュタグ<br>
            <select class="content3"  type="text" autocomplete="on" placeholder="メモ検索欄" onchange="changeColor(this)">
            <option value="" selected hidden></option> <option>サンプル</option></select>
        </p>
        <p class="c">
            <input type="text" name="tagu" style="height:50px; width:45%">
            <input type="button" class="btn btn-outline-secondary" value="#" id="button1" style="width:5%; background-color:white; color:#DCB3FC">
        </p>
        <p class="b">
            <select class="content3"  type="text" autocomplete="on" placeholder="メモ検索欄" onchange="changeColor(this)">
                <option value="" selected hidden></option> <option>サンプル</option></select>
        </p>
        <p class="b" style="color:#DCB3FC">文章<br>
          <input type="text" name="bin">
          <br>
          <div class="ky1">
            <input type="submit" class="form-control" value="登録" style="color:#DCB3FC; width: 100px;">
          </div>
        </p>
    </form>
    <script>
      function changeColor(hoge){
        if( hoge.value == 0 ){
            hoge.style.color = '';
        }else{
            hoge.style.color = 'black';
        }
    }
</script>
</body>
</html>3