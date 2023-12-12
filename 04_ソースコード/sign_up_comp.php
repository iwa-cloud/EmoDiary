<!DOCTYPE html>
<html>

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>新規登録完了画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/style.css">
<style>
  .visible {
    display: block;
    /* width : 25px; */
  }

  .hidden {
    display: none;
    /* width : 25px; */
  }

  #first {
    align-items: flex-end;
    white-space: nowrap;
  }

  #first1_1 {
    width: 25px;
    float: right;
    margin-right: 20px;
  }

  #first1_2 {
    width: 25px;
    float: right;
    margin-right: 20px;
  }

  #parent {
    /* width:25px; */
    float: right;
  }

  .half {
    float: left;
    margin: 5px;
    padding: 10px;
  }
</style>
</head>

<body style=background-color:#fff4ff>

  <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10" href="#" style="color:#DCB3FC; font-size:40px">&emsp;EmoDiary</div>

      </div>
    </div>
  </nav>
  <div id="maindiv" class="container">
    <div class="row mt-5">
      <div class="offset-md-3 col-md-6">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 mt-1 mb-1 alert-danger text-center" id="errorMsg">
            </div>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <h1 class="text-center md-5" style="color:#DCB3FC; font-size: 33px;">新規登録が完了しました</h1>
          <div class="row">
            <div class="col-md-12 mt-1 mb-1 alert-danger text-center" id="errorMsg">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mt-2">
              <div class="d-grid gap-2">
                <button class="form-control" style="color:#DCB3FC;" onclick="location.href='login.php'">ログイン画面へ</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="./header.js"></script>
</body>
</html>