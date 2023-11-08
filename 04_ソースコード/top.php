<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>TOP画面</title>
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
  <div class="controller">
  <div class="line">
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
<p class="kk" style="color:#DCB3FC">文章</p>
<form method="post" action="sample.cgi" class="h">
  <textarea name="kansou" rows="10" cols="100"></textarea><br>
  <div class="ky">
  <button class="form-control" style="color:#DCB3FC; width: 100px; "onclick="location.href='login.php'">共有</button>
  </div>
  </form>
</body>
</body>
</html>