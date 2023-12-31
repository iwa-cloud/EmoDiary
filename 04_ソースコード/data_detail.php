<?php
session_start();
// 他の画面から遷移する際には「data_id」を送ってもらう
require_once './DBManager.php';
$dbmng = new DBManager();
// $_SESSION['page'] = "data_detail.php";

// 検索画面のflgを初期化
$_SESSION['searchFlg'] = false;

// search.phpから遷移したか判定
if (!empty($_POST['data_id'])) {
    $_SESSION['data_id'] = $_POST['data_id'];
} else {
    // 試験的に
    // $_SESSION['data_id'] = "0000001";
}

// data_idからデータ(title, url, memo)を取得
$data1 = $dbmng->getData($_SESSION['data_id']);
// data_idからデータ(tag)を取得
$data2 = $dbmng->getDataTag($_SESSION['data_id']);
// data_idからデータ(photo)を取得
$data3 = $dbmng->getDataPhoto($_SESSION['data_id']);

$title;
$url;
$memo;
$photo = "";
foreach ($data1 as $row) {
    $title = $row['title'];
    $url = $row['url'];
    $memo = $row['memo'];
}
// $data2は埋め込む
foreach ($data3 as $row) {
    $photo = $row['photo'];
}

if ($photo == "") {
    $photo = "./img/gray.png";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ詳細画面</title>
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
            /* margin-left: auto;
            margin-right: auto; */
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
            background-color: #FFFFFF;
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
            /* float: right; */
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

        .transparentBtn {
            width: 25px;
            height: 37.5px;
            background: rgba(44, 125, 212, 0.5);
            display: flex;
        }
    </style>
</head>

<body style=background-color:#fff4ff>
    <nav class="a" aria-label="Sixth navbar example" style="background-color: white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <i type="button" class="bi bi-chevron-left" style="font-size:40px;" onclick="location.href='top.php'"></i>&emsp;
                    <b><font face="Comic Sans MS">
                    <a href="./top.php" style="color:#DCB3FC; font-size:40px; text-decoration:none;">&emsp;EmoDiary</a></font></b>
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
                    <!-- 画面の左側 -->
                    <div class="col-md-6" id="data_left">
                        <p class="data_input_width">タイトル<br>
                            <input type="text" maxlength=50 class="data_input_width_input" name="title"  style="border-radius: 5px;" value="<?php echo $title; ?>" required readonly>
                        </p>
                        <br>
                        <p class="data_input_width">URL(任意)<br>
                            <input type="text" maxlength=1000 class="data_input_width_input" name="url" style="border-radius: 5px;" value="<?php echo $url; ?>" readonly>
                        </p>
                        <br>
                        <p class="data_input_width">ハッシュタグ<br>
                            <select class="data_select_width" id="selectTag" type="text" autocomplete="on" placeholder="メモ検索欄"  style="border-radius: 5px;" onchange="changeColor(this)" readonly>
                                <?php
                                foreach ($data2 as $row) {
                                    echo "<option>" . $row['tag_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </p>
                        <br>
                        <br>

                        <p class="data_input_width">文章<br>
                            <input id="memo" maxlength=200 style="height: 230px; border-radius: 5px;" type="text" name="bin" value="<?php echo $memo; ?>" readonly>
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
                        <br>
                        <div class="DDRButton">
                            <input type="submit" class="form-control" id="editButton" value="編集" onclick="location.href='data_edit.php'" style="border: 1px solid #999;">
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        function changeColor(hoge) {
            if (hoge.value == 0) {
                hoge.style.color = '';
            } else {
                hoge.style.color = 'black';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>