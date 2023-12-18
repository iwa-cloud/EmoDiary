<?php
session_start();
// 「編集」処理のため、flgに「false」を代入
$_SESSION['newData'] = false;
$_SESSION['page'] = "data_edit.php";

require_once './DBManager.php';
$dbmng = new DBManager();

// 使用されたタグ一覧を取得
$tags = $dbmng->getTags();

// タグを入力するやつ用
$tagMaxId = $dbmng->getMaxTagId();

// data_idのデータを取得
$titleUrlMemo = $dbmng->getData($_SESSION['data_id']);

// データに適応されているタグ一覧
$selectedTags = $dbmng->getDataTag($_SESSION['data_id']);
// データに適応されていないタグ一覧
$notSelectedTags = $dbmng->getNotSelectTag($_SESSION['data_id']);

$upPhoto = $dbmng->getDataPhoto($_SESSION['data_id']);

$title = "";
$url = "";
$memo = "";
$photo = "";
$tagIdArray = array();
$tagNameArray = array();
$notTagIdArray = array();
$notTagNameArray = array();
$tagIdJson;
$tagNameJson;
$notTagIdJson;
$notTagNameJson;

foreach ($titleUrlMemo as $row) {
    $title = $row['title'];
    $url = $row['url'];
    $memo = $row['memo'];
}

foreach ($upPhoto as $row) {
    $photo = $row['photo'];
}

if ($photo == null) {
    $photo = "./img/gray.png";
}

// jsで配列を使うため、phpで配列に詰めておく
foreach ($selectedTags as $row) {
    array_push($tagIdArray, $row['tag_id']);
    array_push($tagNameArray, $row['tag_name']);
}

foreach ($notSelectedTags as $row) {
    array_push($notTagIdArray, $row['tag_id']);
    array_push($notTagNameArray, $row['tag_name']);
}


// phpの配列をjsで使えるように変換
// データに適応されているタグ一覧
$tagIdJson = json_encode($tagIdArray);
$tagNameJson = json_encode($tagNameArray);

// データに適応されていないタグ一覧
$notTagIdJson = json_encode($notTagIdArray);
$notTagNameJson = json_encode($notTagNameArray);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ編集画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        /* 試験的に色付けあり */
        .visible {
            display: block;
        }

        .hidden {
            display: none;
        }

        #first {
            align-items: flex-end;
            white-space: nowrap;
        }

        #first1_2 {
            width: 25px;
            float: right;
            margin-right: 20px;
        }

        #parent {
            float: right;
        }

        .half {
            float: left;
            margin: 5px;
            padding: 10px;
        }

        /* 以下メイン画面CSS */
        #button1 {
            height: 50px;
            width: 10%;
            background-color: white;
            color: #DCB3FC;
        }

        #data_frame {
            margin: 5vw;
            display: flex;
            justify-content: space-between;
        }

        #data_left {
            /* background-color: rgba(255, 201, 201, 0.486); */
        }

        #data_right {
            /* background-color: rgba(220, 179, 252, 0.233); */
            margin: right;
        }

        .data_input_width {
            width: 180%;
            color: #DCB3FC;
        }

        .data_input_width_input {
            width: 100%;
            height: 50px;
        }

        #memo {
            width: 100%;
            height: 150px;
        }

        #imgMaxSize {
            width: 85%;
            height: 520px;
            margin-left: 15%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #EEEEEE;
        }

        #imgMaxSize2 {
            width: 100%;
            height: 100%;
            object-fit: contain;

        }

        #imgSize {
            /* 試験的に80%にしてる */
            max-width: 85%;

            max-height: 520px;

            margin: right;
            object-fit: contain;
        }

        .DDRButton {
            width: 550px;
            float: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin: right;
            margin-left: 15%;
            /* background-color: #dcb3fc71; */
        }

        #editButton {
            width: 100px;
            color: #DCB3FC;
            margin: right;
        }

        #shareButton {
            width: 100px;
            color: #DCB3FC;
        }

        .data_select_width {
            padding: 1em;
            background-color: #ffffff;
            margin: 1em auto;
            width: 100%;
            margin-right: 50%;
            border: 1px solid rgb(0, 0, 0);
            color: #DCB3FC;
        }

        .custom-file-input {
            position: relative;
            display: inline-block;
        }

        .custom-file-input input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 10vw;
            height: 5vw;
            cursor: pointer;
        }

        .custom-file-input label {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 16px;
            background-color: white;
            color: #DCB3FC;
            border: 1px solid #999;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body style=background-color:#fff4ff>
    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='top.php'"></i>&emsp;
                    <a href="./top.php" style="color:#DCB3FC; font-size:40px; text-decoration:none;">&emsp;EmoDiary</a>
                </div>
                <div class="col-md-2" style="text-align:right">
                    <details>
                        <summary>
                            <!-- クラスの切り替えテスト -->
                            <div id="first">
                                <!-- parent       人間アイコン                       -->
                                <!-- first1_2     虫眼鏡                            -->
                                <!-- first2_2     ログアウトボタン                   -->
                                <!-- first2_1     ユーザー情報変更画面に遷移するボタン -->
                                <i type="button" id="parent" class="bi bi-person-fill" style="font-size:25px;"></i>
                                <i type="button" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='search.php'"></i>&emsp;
                                <button type="button" id="first2_2" class="hidden" onclick="location.href='logout.php'">ログアウト</button>
                                <button type="button" id="first2_1" class="hidden" onclick="location.href='usr_inf_chg_input.php'">ユーザー変更画面</button>
                            </div>
                        </summary>
                    </details>
                </div>
            </div>
        </div>
    </nav>

    <!-- 画面の中央に要素を寄せる -->
    <div id="data_frame">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="./data_create.php" method="post" enctype="multipart/form-data">
                        <!-- 画面の左側 -->
                        <div class="col-lg-6" id="data_left">
                            <p class="data_input_width">タイトル<br>
                                <input type="text" maxlength=50 class="data_input_width_input" name="title" value="<?php echo $title; ?>" required>
                            </p>

                            <p class="data_input_width">URL(任意)<br>
                                <input type="text" maxlength=1000 class="data_input_width_input" name="url" value="<?php echo $url; ?>">
                            </p>

                            <p class="data_input_width">ハッシュタグ<br>
                                <select class="data_select_width" id="selectTag" name="selectTags" type="text" autocomplete="on" onchange="changeColor(this)">

                                    <option value="0000000">適用された一覧</option>
                                    <!-- jsでここに一覧を表示 -->

                                </select>
                            </p>

                            <p class="data_input_width">
                                <input type="text" maxlength=50 name="tagu" id="inputTag" style="width: 89%; height: 50px;">
                                <input type="button" class="btn btn-outline-secondary" value="適用" id="button1" style="width: 10%; height: 50px;" onclick="hashed()">
                            </p>

                            <p class="data_input_width">
                                <select class="data_select_width" id="tags" type="text" autocomplete="on" placeholder="メモ検索欄" onchange="changeColor(this)">

                                    <!-- 表示するやつ -->
                                    <option value="0000000" selected>選択してください</option>
                                    <!-- 表示順に関する処理はしてない -->

                                </select>
                            </p>

                            <p class="data_input_width">文章<br>
                                <input id="memo" maxlength=200 class="data_input_width_input" type="text" name="bin" value="<?php echo $memo; ?>">
                            </p>

                            <!-- 非表示 -->
                            <div id="hiddenDiv">
                                <!-- 選択したタグのinputを非表示で追加 -->
                            </div>
                        </div>
    </div>
                        <!-- 画面の右側 -->
                        <div class="col-md-6">
                            <!-- 画像表示領域 -->
                            <div id="imgMaxSize">
                                <img id="imgMaxSize2" src="<?php echo $photo; ?>" alt="none">
                            </div>
                            <div class="DDRButton">
                                <div class="custom-file-input">
                                    <input type="file" name="file" accept="img/*" id="fileInput">
                                    <label for="fileInput">ファイルを選択</label>
                                </div>
                                <br>
                                <br>
                                <!-- 名前： Data_Detail_Regist_Button -->
                                <div class="DDRButton">
                                    <input type="submit" class="form-control" id="editButton" value="登録" onclick="location.href='data_create.php'" style="border: 1px solid #999;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        // データに適応されているタグ一覧を表示
        showTags(
            <?php
            echo $tagIdJson . "," . $tagNameJson;
            ?>
        );

        // データに適応されていないタグ一覧を表示
        showNotTags(
            <?php
            echo $notTagIdJson . "," . $notTagNameJson;
            ?>
        );

        // 画面右上のアイコンの表示処理
        const element = document.getElementById("first");
        const Button = document.getElementById("parent");
        const element_2 = document.getElementById("first1_2");
        const element_3 = document.getElementById("first2_2");
        const element_4 = document.getElementById("first2_1");
        Button.addEventListener("click", function() {
            if (element_2.classList.contains("visible")) {
                element_2.classList.remove("visible");
                element_2.classList.add("hidden");
                element_3.classList.remove("hidden");
                element_3.classList.add("visible");
                element_4.classList.remove("hidden");
                element_4.classList.add("visible");
            } else {
                element_2.classList.remove("hidden");
                element_2.classList.add("visible");
                element_3.classList.remove("visible");
                element_3.classList.add("hidden");
                element_4.classList.remove("visible");
                element_4.classList.add("hidden");
            }
        });

        // 文字の色を変える処理
        function changeColor(hoge) {
            if (hoge.value == 0) {
                hoge.style.color = '';
            } else {
                hoge.style.color = 'black';
            }
        }


        // データに紐づいたタグの一覧をselect要素に入れ込む処理
        function showTags(tIdArr, tNameArr) {
            // select要素(２箇所書かないと反応しない)
            let elTag = document.getElementById("selectTag");
            // 「selectTag」にタグの一覧を追加し、表示
            for (let i = 0; i < tIdArr.length; i++) {
                let option = document.createElement("option");
                option.setAttribute("name", "selectTag");
                option.value = tIdArr[i];
                option.text = tNameArr[i];
                elTag.appendChild(option);
            }
        }

        // データに紐づいていないタグの一覧をselect要素に入れ込む処理
        function showNotTags(tIdArr, tNameArr) {
            // select要素(２箇所書かないと反応しない)
            let elTag = document.getElementById("tags");
            // 「tags」にタグの一覧を追加し、表示
            for (let i = 0; i < tIdArr.length; i++) {
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
            // 選んだ状態にする
            // option.setAttribute("selected", "selected");
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

        // 入力されたタグを追加する処理
        let tagMaxId = "" + <?php $tagMaxId = $dbmng->nextId($tagMaxId);
                            echo "\"" . $tagMaxId . "\""; ?>;

        function hashed() {
            // select要素
            let insertTag = document.getElementById("selectTag");
            // 入力した要素
            let inputTag = document.getElementById("inputTag");
            let eValue = inputTag.value;
            // 「tags」にタグの一覧を追加し、表示
            let option = document.createElement("option");
            // $_POST['selectTag']は二次元配列で、選択したタグのidが格納される
            // option.setAttribute("name", "selectTags");

            option.value = tagMaxId;

            option.innerText = eValue;
            // 選んだ状態にする
            // option.setAttribute("selected", "selected");
            insertTag.appendChild(option);
            inputTag.value = "";

            // $_POST['selectTags']で受け取るためにinputを非表示で追加
            let hiddenDiv = document.getElementById("hiddenDiv");
            let inputEl = document.createElement("input");
            inputEl.setAttribute("id", eValue);
            inputEl.setAttribute("type", "hidden");
            inputEl.name = "hiddenSelectTags[]";
            inputEl.value = eValue;
            hiddenDiv.appendChild(inputEl);

            tagMaxId = nextId(tagMaxId);
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

        // DBManager.phpのnextId()が使えなかったため、jsで再定義
        function nextId(id) {
            id = parseInt(id);
            id++;
            id = String(id).padStart(7, '0');
            return id;
        }

        // プレビュー表示
        // function previewImg(obj) {
        //     let fileReader = new FileReader();
        //     fileReader.onload = (function() {
        //         document.getElementById('imgSize').src = fileReader.result;
        //     });
        //     fileReader.readAsDataURL(obj.files[0]);
        // }
        let img = document.getElementById("imgMaxSize2");
        let input = document.getElementById("fileInput");
        
        input.onchange = (e) => {
            if(input.files[0]) {
                img.src = URL.createObjectURL(input.files[0]);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>