<?php
ini_set('display_errors', "On");
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();
$_SESSION['page'] = "top.php";
$_SESSION ['input_name'] = "";
$_SESSION['searchFlg'] = false;

// 「最新順」「タグ順」「日付順」のどれかが押されているか判定
// リダイレクトした場合は$_POST['three_btn']に選択したボタンの情報が入る
if (!empty($_POST['three_btn'])) {
  $_SESSION['select_name'] = $_POST['three_btn'];
  // 初めてこの画面を表示したら"new"を格納する
} else if (empty($_SESSION['select_name'])) {
  $_SESSION['select_name'] = "new";
}

// 表示するデータのプレビュー用の変数
$previewPhoto = "./img/gray.png";
$previewMemo = "選択されていません";

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/style.css">
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

    input[type="radio"] {
      display: none;
    }

    .radio-dez {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .radio-dez input[type="radio"] {
      display: none;
    }

    .radio-dez label {
      margin-left: 8px;
      cursor: pointer;
      position: relative;
    }

    .data_left {
      /* background-color: rgba(255, 201, 201, 0.486); */
    }

    .data_right {
      /* background-color: rgba(220, 179, 252, 0.233); */
    }

    .viewFrame {
      height: 84vh;
      width: 100%;
      overflow: scroll;
    }

    #borderStyle {
      border-width: 1.7px;
      border-color: #A2A4A2;
      border-style: none solid none none;
      padding: 0%;
    }

    .titles label {
      display: block;
      /* width: 150px; */
      background: white;
      color: #000;
      padding: 10px;
      /* margin: 10px; */
      box-sizing: border-box;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      border: 1px solid;
      border-color: rgb(188, 188, 188) transparent rgb(188, 188, 188) transparent;
    }

    .titles input:checked+label {
      background: #d4fffc;
      color: black;
    }

    .titles input {
      display: none;
    }

    #topFrame {
      margin: 3%;
      padding-left: 5%;
      align-items: center;
    }

    #topImgMaxSize {
      width: 400px;
      height: 400px;
      margin: 0 auto;
      background-color: #EEEEEE;

    }

    #topImgSize {
      /* 試験的に80%にしてる */
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: inline-block;
      /* text-align: center; */
    }

    .data_input_width {
      width: 80%;
      color: #DCB3FC;
    }

    .data_input_width input {
      width: 100%;
      height: 50px;
    }

    #memo {
      width: 100%;
      height: 150px;
    }

    .viewMemoInput {
      /* padding-right: 10%; */
      margin: 5% 15% 0 auto;
    }

    .viewMemoButton {
      /* padding-right: 10%; */
      margin: 3% 15% 0 auto;
    }

    .tagMenu {
      /* 要素の大きさは仮 */
      width: 100%;

      display: flex;
      flex-flow: column;
    }

    .tagMenu button {
      border: 1px solid;
      border-color: rgb(188, 188, 188) transparent rgb(188, 188, 188) rgb(188, 188, 188);
    }

    .parent {
      height: 50px;
      background: rgba(181, 181, 181, 0.258);
      color: #DCB3FC;
      font-size: 20px;
    }

    .child {
      height: 50px;
      background: white;
      /* margin-left: 20px; */
      font-size: 20px;
    }

    .active {
      display: none;
    }

    .Scroll {
      overflow: scroll;
      height: 85vh;
    }
  </style>
</head>

<body style=background-color:#fff4ff>
  <!-- ヘッダー -->
  <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10" href="#" style="color:#DCB3FC; font-size:40px">&emsp; <b><font face="Comic Sans MS">EmoDiary</font></b></div>
        <div class="col-md-2" style="text-align:right;">
          <details>
            <summary>
              <div id="first" class="first">
                <i type="li" id="parent" class="bi bi-person-fill" style="font-size:25px;"></i>
                <i type="li" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='search.php'"></i>&emsp;
                <i type="li" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='data_input.php'"></i>&emsp;
                <li type="li" id="first2_2" class="hidden" onclick="location.href='logout.php'">ログアウト</li>
                <li type="li" id="first2_1" class="hidden" onclick="location.href='usr_inf_chg_input.php'">ユーザー変更画面</li>
              </div>
            </summary>
          </details>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- 画面の左側 -->
      <div class="col-md-5 data_left" id="borderStyle">
        <!-- ボタン表示領域 -->
        <div id="nav">
          <form action="./top.php" method="post">
            <!-- 文字のcssは適応されてないかも -->
            <button type="submit" value="new" name="three_btn" class="topbutton" onclick="showElement('element1')">最新 ↓</button>
            <button type="submit" value="tag" name="three_btn" class="topbutton" onclick="showElement('element2')">タグ ↓</button>
            <!-- <button type="submit" value="date" name="three_btn" class="topbutton" onclick="showElement('element3')">日付 ↓</button> -->
            <!-- <button class = "topbutton">編集 ↓</button> -->
          </form><br>
        </div>


        <!-- タイトル表示領域 -->
        <div class="viewScroll  viewFrame">

          <?php
          // 前回押したボタンによって表示内容をを変える
          //試験的にuser_idを「0000002」
          $user_id = $_SESSION['user_id'];

          // 最新順
          if ($_SESSION['select_name'] == "new") {
            $result = $dbmng->getDataNewest($user_id);
            newASC($result);
            // 日付順
          } else if ($_SESSION['select_name'] == "date") {
            $result = $dbmng->getDataNewest($user_id);
            newASC($result);
            // タグ順
          } else {
            $result = $dbmng->getDataByDate($user_id);
            dateASC($result);
          }

          //「最新順」「日付順」のボタンを押したしたとき
          function newASC($result)
          {
            foreach ($result as $row) {
              echo '<div class="titles">';
              echo '<input type="radio" name="selectTitle" id = "' . $row['data_id'] . '" value = "' . $row['data_id'] . '" onclick="isClick(\'\',\'' . $row['data_id'] . '\')">';
              echo '<label for="' . $row['data_id'] . '">';
              echo '<strong class="mb-1" style="font-size:20px;">' . $row['title'] . '</strong>';
              echo '</label>';
              echo '</div>';
            }
          }

          function dateASC($result)
          {
            $tagNameArr = array();
            $titles = array();
            $tagDataId = array();

            foreach ($result as $row) {
              array_push($tagNameArr, $row['tag_name']);
              array_push($titles, $row['title']);
              array_push($tagDataId, $row['data_id']);
            }

            // 初期化
            $html = '<div class="tagMenu">';
            $cnt = 0;

            // 配列の要素を順に処理
            for ($i = 0; $i < count($titles); $i++) {
              // 親ボタン
              if ($i == 0 || $tagNameArr[$i] !== $tagNameArr[$i - 1]) {
                $html .= '<button type="button" class="parent" onclick="func1(\'c' . ($cnt + 1) . '\')">' . $tagNameArr[$i] . '</button>';
                $cnt++;
              }

              // 子ボタン
              $html .= '<button type="button" class="child c' . $cnt . ' active" onclick="func2(\'' . $tagDataId[$i] . '\')">' . $titles[$i] . '</button>';
            }

            // 最後の要素を閉じる
            $html .= '</div>';

            echo $html;
          }


          // 【テスト】data_idを出力
          if (!empty($_POST['data_id'])) {
            $_SESSION['data_id'] = $_POST['data_id'];
            // データベースからプレビュー用の情報を取得
            $previewDataPhoto = $dbmng->getDataP($_SESSION['data_id']);
            $previewDataMemo = $dbmng->getDataM($_SESSION['data_id']);
            foreach ($previewDataPhoto as $row) {
              $previewPhoto = $row['photo'];
            }
            foreach ($previewDataMemo as $row) {
              $previewMemo = $row['memo'];
            }
          } else {
            $_SESSION['data_id'] = "new";
          }

          ?>
        </div>
      </div>

      <!-- 画面の右側 -->
      <div class="col-md-7 data_right">
        <div id="topFrame">
          <!-- 画像表示領域 -->
          <div id="topImgMaxSize">
            <img id="topImgSize" src="<?php echo $previewPhoto; ?>" alt="none">
          </div>
          <div class="">
            <!-- 文章表示領域 -->
            <p class="data_input_width viewMemoInput" style="color:#DCB3FC">文章<br>
              <input id="memo" type="text" name="bin" style="border-radius: 5px;" value="<?php echo $previewMemo; ?>" readonly>
            </p>
            <!-- 処理は書いてない -->
            <button type="button" class="form-control viewMemoButton" style="color: #DCB3FC; width: 100px;" onclick="isClick('data_detail.php', '<?php echo $_SESSION['data_id']; ?>')">詳細</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    function isClick(act, num) {
      sendPost(act, num);
    }

    // jsからphpにdata_idを送信
    function sendPost(act, num) {
      let form = document.createElement('form');
      let request = document.createElement('input');
      form.method = 'POST';
      form.action = act;
      request.type = 'hidden';
      request.name = "data_id";
      request.value = num;
      form.appendChild(request);
      document.body.appendChild(form);
      form.submit();

    }

    function showElement(elementId) {
      var elements = document.getElementsByClassName('element');
      for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
      }
      document.getElementById(elementId).style.display = 'block';
    }

    function func1(e) {
      let childs = document.getElementsByClassName(e);
      for (let i = 0; i < childs.length; i++) {
        childs[i].classList.toggle("active");
      }
      // e.classList.toggle("active");
    }

    function func2(text) {
      sendPost('', text);
    }
  </script>
  <script src="./header.js"></script>
</body>
</html>