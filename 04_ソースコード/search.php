<?php
session_start();
require_once './DBManager.php';
$dbmng = new DBManager();

// 試験的に
// $_SESSION['user_id'] = "0000002";
$tags = $dbmng->getTags();
$tagIdArray = array();
$tagNameArray = array();
$tagIdJson;
$tagNameJson;

// jsで配列を使うため、phpで配列に詰めておく
foreach ($tags as $row) {
  array_push($tagIdArray, $row['tag_id']);
  array_push($tagNameArray, $row['tag_name']);
}

// phpの配列をjsで使えるように変換
$tagIdJson = json_encode($tagIdArray);
$tagNameJson = json_encode($tagNameArray);

// $testDIds = array("0000001", "0000002", "0000003");
// $testTitles = array("TitleTest", "TitleTest2", "TitleTest3");
$testDIds = array();
$testTitles = array();

$searchResults;
$data;

// リダイレクトした際に、値がなければ""を代入
$inputMemo = "";
$inputDate = "";
$inputTitle = "";
$inputTag = "%";

if($_SESSION['searchFlg'] == false) {
  $_SESSION['searchFlg'] = true;
}else{
  if(!empty($_POST['inputMemo'])) {
    $inputMemo = $_POST['inputMemo'];
  }
  
  if(!empty($_POST['inputDate'])) {
    $inputDate = $_POST['inputDate'];
  }
  
  if(!empty($_POST['inputTitle'])) {
    $inputTitle = $_POST['inputTitle'];
  }
  
  if(!empty($_POST['hiddenSelectTags'])) {
    $inputTag = $_POST['hiddenSelectTags'][0];
  }
}

// 試験的に
// echo "memo" . $_POST['inputMemo'] . '<br>';
// echo "memo" . $_POST['inputDate'] . '<br>';
// echo "memo" . $_POST['inputTitle'] . '<br>';
// var_dump($_POST['inputTag']);
// echo "memo" . $inputMemo . '<br>';
// echo "memo" . $inputDate . '<br>';
// echo "memo" . $inputTitle . '<br>';
// var_dump($inputTag);
// $data = $dbmng->search($_SESSION['user_id'],$inputMemo, $inputDate, $inputTitle, $inputTag);
$data = $dbmng->search($_SESSION['user_id'],$inputTitle, $inputMemo, $inputTag, $inputDate);

foreach ($data as $row) {
  array_push($testDIds, $row['data_id']);
  array_push($testTitles, $row['title']);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./style.css">
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

  .viewFrame{
    height: 92vh;
    width: 100%;
  }

  #searchFrame {
    margin: 20%;
    padding-left: 5%;
  }

  .viewContentSize {
    height: 20px;
    width: 100%;
  }

  #borderStyle {
    border-width:1.7px;
    border-color: #A2A4A2;
    border-style: none solid none none;
  }

  #updateBtn {
    /* padding: 1em; */
    background-color: #ffffff;
    margin: 3% 15%;
    /* width: 85%; */
    min-width: 20%; /* 最小幅を指定 */
    max-width: 85%; /* 最大幅を指定 */
    border: 1px solid rgb(0, 0, 0);
    color: #DCB3FC;
    float: right;
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
    border-color: transparent transparent rgb(188, 188, 188) transparent;
  }

  .titles input:checked + label {
    background: #d4fffc;
    color: black;
  }

  .titles input {
    display: none;
  }

  .Scroll {
    overflow: scroll;
    height: 93vh;
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

<div class="container-fluid">
  <div class="row">

    <!-- 検索結果表示領域 -->
    <div class="col-md-5">
      <div class="viewScroll viewFrame" id="borderStyle" style="background-color: #dcb3fc53;">
      <!-- <div class="viewScroll viewFrame" id="borderStyle"> -->
        <div class="Scroll">

        <!-- タイトルを表示 -->
        <!-- <div class="titles">
          <input type="radio" name="titleBtns" id="0000004" value="0000004" onclick="isClicked('0000004')">
          <label for="0000004">
            <strong class="mb-1" style="font-size: 20px;">
              title4
            </strong>
          </label>
        </div>

        <div class="titles">
          <input type="radio" name="titleBtns" id="0000005" value="0000005" onclick="isClicked('0000005')">
          <label for="0000005">
            <strong class="mb-1" style="font-size: 20px;">
              title5
            </strong>
          </label>
        </div> -->

        <!-- phpで配列の中身を表示させる -->
        <?php
          $id = 0;
          $name = '';
          for ($i = 0; $i < count($testTitles); $i++) {
            $id = $testDIds[$i];
            $name = $testTitles[$i];

            echo '<div class="titles">';
            echo '<input type="radio" name="titleBtns" id="' . $id . '" value="' . $id . '" onclick="isClicked(\'' . $id . '\')">';
            echo '<label for="' . $id . '">';
            echo '<strong class="mb-1" style="font-size:20px;">' . $name . '</strong>';
            echo '</label>';
            echo '</div>';
          }
        ?>
        </div>
      </div>
    </div>
    
    <!-- 検索入力領域 -->
    <div class="col-md-7" style="background-color: #b5fcb353;">
    <!-- <div class="col-md-7"> -->
      <div id="searchFrame">
        <form action="./search.php" method="post">
          <!-- memo -->
          <input class="content" type="text" name="inputMemo" placeholder="メモ検索欄" style="color: black;" value="<?php echo $inputMemo; ?>">
          <!-- date -->
          <input class="content" type="date" name="inputDate" id="reservationDate" placeholder="年／月／日" value="<?php echo $inputDate; ?>">
          <!-- title -->
          <input class="content" name="inputTitle" placeholder="タイトル検索欄" style="color: black;" value="<?php echo $inputTitle; ?>">
          <!-- selectedTags -->
          <select class="content" type="text" name="selectTags" id="selectTag" onchange="changeColor(this)">
            
            <option>適用された一覧</option>
            <!-- jsでここに一覧を表示 -->
          </select>
          <!-- tags -->
          <!-- valueにはtagNameを入れる -->
          <select class="content" type="text" name="inputTag" id="tags" onchange="changeColor(this)">
            
            <!-- 表示するやつ -->
            <option selected>選択してください</option>
            <!-- 表示順に関する処理はしてない -->

          </select>
          <!-- 非表示 -->
          <div id="hiddenDiv">
            <!-- 選択したタグのinputを非表示で追加 -->
          </div>
          <button type="submit" id="updateBtn">更新</button>
        </form>
      </div>
    </div>

  </div>
</div>

<script>
  // DBに登録されているtagの一覧を表示
  showTags(
    <?php
      echo $tagIdJson . "," . $tagNameJson;
    ?>
  );

  function changeColor(hoge) {
    if(hoge.value == 0) {
      hoge.style.color = '';
    }else{
      hoge.style.color = 'black';
    }
  }

  document.getElementById("reservationDate").addEventListener("change", function () {
    this.style.color = 'black'; // 選択後の色を濃いグレーに変更
  });

  // タイトルがクリックされた際に、詳細画面へ遷移する処理
  function isClicked(data_id) {
    let form = document.createElement('form');
    let request = document.createElement('input');
    form.method = 'POST';
    form.action = 'data_detail.php';
    request.type = 'hidden';
    request.name = 'data_id';
    request.value = data_id;
    form.appendChild(request);
    document.body.appendChild(form);
    form.submit();
  }

  // タグの一覧をselect要素に入れ込む処理
  function showTags(tIdArr,tNameArr) {
    // select要素(２箇所書かないと反応しない)
    let elTag = document.getElementById("tags");
    // 「tags」にタグの一覧を追加し、表示
    for(let i = 0; i < tIdArr.length; i++) {
      let option = document.createElement("option");
      option.setAttribute("name", "tags");
      option.value = tIdArr[i];
      option.text = tNameArr[i];
      elTag.appendChild(option);
    }
  }

  // select要素(２箇所書かないと反応しない)
  let elTag = document.getElementById("tags");
  // 選ばれた要素
  let selectedTag = document.getElementById("selectTag");

  // タグ一覧からタグを選択した時
  elTag.onchange = event => {
    let insertTag = document.getElementById("selectTag");
    // 選択したoptionのindexを取得
    let selectIndex = elTag.selectedIndex;
    let selectText = elTag.options[selectIndex].text;
    let eValue = selectText;
    let option = document.createElement("option");
    option.value = eValue;
    option.innerText = selectText;
    insertTag.appendChild(option);
    // 選択したタグを一覧から削除
    elTag.remove(selectIndex);
    
    // $_POST['selectTags']で受け取るためにinputを非表示で追加
    let hiddenDiv = document.getElementById("hiddenDiv");
    let inputEl = document.createElement("input");
    inputEl.setAttribute("id", eValue);
    inputEl.setAttribute("type", "hidden");
    inputEl.name = "hiddenSelectTags[]";
    inputEl.value = eValue;
    hiddenDiv.appendChild(inputEl);
  }

  // 選択したタグを押下した時
  selectedTag.onchange = event => {
    let eValue = selectedTag.value;
    // select要素
    let insertTag = document.getElementById("tags");
    // 選択したoptionのindexを取得
    let selectIndex = selectedTag.selectedIndex;
    // indexからtextを取得
    let selectText = selectedTag.options[selectIndex].text;
    // 「tags」にタグの一覧を追加し、表示
    let option = document.createElement("option");
    // $_POST['selectTag']は二次元配列で、選択したタグのidが格納される
    option.setAttribute("name", "tags");
    option.value = eValue;
    option.innerText = selectText;
    insertTag.appendChild(option);
    // 選択したタグを一覧から削除
    selectedTag.remove(selectIndex);

    // 非表示のinputタグも削除
    let delEl = document.getElementById(eValue);
    delEl.remove();
  }
</script>
<script src="./header.js"></script>
</body>
</html>