<!DOCTYPE html>
<html lang="ja">
<head>
    <div class="container-fluid">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>ユーザー情報変更確認画面</title>
</head>
<style>
</style>
<body>
  <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4" style="text-align:left"><i type="button" class="bi bi-chevron-left" style="font-size:40px;"></i>&emsp;<href="#" style="color:#DCB3FC; font-size:40px;">EmoDiary</div>
          <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align:right"><i type="button" class="bi bi-plus-square" style="font-size:40px;"></i>&emsp;<i type="button" class="bi bi-search" style="font-size:40px"></i>&emsp;<i type="button" class="bi bi-person-fill" style="font-size:40px"></i></div>
  </nav>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
        <div style="color: #DCB3FC; text-align:left;">name</div>
        <input class="a" type="email" name="name" class="form-control" id="txt1" required>
    </div>
    <div class="row offset-sm-4 offset-3 col-sm-4  col-6 mt-3">
        <div style="color: #DCB3FC; text-align:left">pass</div>
        <input class="a" type="password" name="pass" class="form-control" id="txt2" required>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-4"></div>
            <div class="col-md-3 mt-4">
                <input type="submit" class="form-control" value="登録" style="color:#DCB3FC;">
            </div>
            <div class="col-md-3 mt-4">
                <input type="submit" class="form-control" value="戻る" style="color:#DCB3FC;">
            </div>
            <div class="col-md-3 mt-4"></div>
        </div>
    </div>
</body>
</html>