<?php
ini_set('display_errors', "On");
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
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
        /* #first2_1{
          width : 75px;
          float: right;
          margin-right: 20px;
        }
        #first2_2{
          width : 75px;
          float: right;
          margin-right: 20px;
        } */

        #parent {
          /* width:25px; */
          float: right;
        }
        .half{
          float:  left;               
          margin:  5px;
          padding:  10px;  
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

        /* .radio-dez label:before {
          content: '';
          display: inline-block;
          width: 18px;
          height: 18px;
          border: 2px solid #999;
          border-radius: 50%;
          position: absolute;
          left: 0;
          top: 1px;
        }

        .radio-dez input[type="radio"]:checked + label:before {
          background-color: #2196F3;
          border-color: #2196F3;
        } */

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
                        <!-- //クラスの切り替えテスト -->
                        <div id="first" class="first">
                          <i type="li" id="parent" class="bi bi-person-fill" style="font-size:25px;" ></i>
                          <i type="li" id="first1_2" class="visible bi bi-search" style="font-size:25px;" onclick="location.href='search.php'"></i>&emsp;
                        <i type="li" id="first1_1" class="visible bi bi-plus-square" style="font-size:25px;" onclick="location.href='login.php'"></i>&emsp;
                        <li type="li" id="first2_2" class="hidden" onclick="location.href='logout.php'">ログアウト</li>
                        <li type="li" id="first2_1" class="hidden" onclick="location.href='usr_inf_chg_input.php'">ユーザー変更画面</li>
                        </div>
                        </summary>    
              </details>
                        </div>
            </div>
      </div>
    </div>
  </nav>
        <?php
        $list = array("リンゴをたべたよ", "バナナをたべたよ", "オレンジをたべたよ");
        ?>
  <div id="nav">
    <!-- //ここで画面リロードしたとき、情報を送ってます。 -->
    <form action = "./three_test.php" method = "POST">
    <button type = "submit" value = "new" name = "three_btn" class = "topbutton"onclick="showElement('element1')">最新 ↓</button>
    <button type = "submit" value = "tag" name = "three_btn" class = "topbutton"onclick="showElement('element2')">タグ ↓</button>
    <button type = "submit" value = "date" name = "three_btn" class = "topbutton" onclick="showElement('element3')">日付 ↓</button>
    <button class = "topbutton">編集 ↓</button></form><br>

    
    

    <p id="element1" class="element">
    </p>
    <p id="element2" class="element" style="display: none;">
    </p>
    <p id="element3" class="element" style="display: none;"></p>

  </div>
  </div>
  </div>
</div>
</div>


<?php
  // $_POST['three_btn']に値があれば代入
  if(!empty($_POST['three_btn'])) {
   $_SESSION['select_name'] = $_POST['three_btn'];
  }else if(empty($_SESSION['select_name'])){
   $_SESSION['select_name'] = "new";
  }
  
function dbConnect() {
    $dsn = 'mysql:host=mysql218.phy.lolipop.lan;dbname=LAA1418433-emodiary;charset=utf8';
    $user = 'LAA1418433';
    $pass = 'EmoDiary1016';
    $pdo = new PDO($dsn, $user, $pass);
    return $pdo;
}
  require 'DBManager.php';
  $dbManager = new DBManager();
  // 前回押したボタンによって表示内容をを変える
   if($_SESSION['select_name'] == "new"){
  //試験的にuser_idを指定してます
      $result = $dbManager->getDataNewest('0000002');
      // $list = $result;
      newASC($result);
   }else if($_SESSION['select_name'] == "date"){
      $result = $dbManager->getDataNewest('0000002');
      // $list = $result;
      newASC($result);
     
   }else{
    $result = $dbManager->getDataByDate('0000002');
      // $list = $result;
      // DateASC($list,$result);
      DateASC($result);
   }
   //最新順のボタンを押したしたとき下の関数が呼ばれる

   function newASC($result){
    // $i = 0;
     foreach ($result as $row) {
       
       echo '<div class="radio-dez">';
       echo '<input type="radio" name="selectTitle" id = "' . $row['data_id'] . '" value = "' . $row['data_id'] . '" onclick="isClick(event,this,\''. $row['data_id'] .'\')">';
       echo '<label for="' . $row['data_id'] . '">';
       echo '<strong class="mb-1" style="font-size:20px;">' . $row['title'] . '</strong>';
       echo '</label>';
       echo '</div>';
      //  echo "Data ID: " . $row['data_id'] . "<br>";
      //  echo "Title: " . $row['title'] . "<br>";
      //  echo "Creation Time: " . $row['c_time'] . "<br>";
      //  echo "---------------<br>";
      // $i++;
     }
    }

  // function DateASC($list,$result){
  function DateASC($result){
    $i = 0;
      foreach ($result as $row) {
        echo "Data ID: " . $row['data_id'] . "<br>";
        echo "Title: " . $row['title'] . "<br>";
        echo "TagName: " . $row['tag_name'] . "<br>";
        echo "TagUsedTime: " . $row['used_time'] . "<br>";
        echo "---------------<br>";
      }
     
  }

      //  $num = $i + 1;
      //  echo '<div class="radio-dez">';
      //  echo '<input type="radio" id = "' . $i . '" value = "' . $list[$i] . '" onclick="isClick(event,this,' . $num . ')">';
      //  echo '<label for="' . $i . '">';
      //  echo '<strong class="mb-1" style="font-size:20px;">' . $list[$i] . '</strong>';
      //  echo '</label>';
      //  echo '</div>';
   

if(!empty($_POST['select_id'])){
  echo "<h2>".$_POST['select_id']."</h2>";
}else{
  echo "<h2>not selected</h2>";
}




function newSelect($data_id){
  $pdo = $this->dbConnect();
      $sql = "SELECT * FROM data WHERE data_id = ?";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $data_id, PDO::PARAM_INT);
      $ps->execute();
      $result = $ps->fetchAll();
      foreach ($result as $row) {
      echo "Data ID: " . $row['data_id'] . "<br>";
      echo "Title: " . $row['title'] . "<br>";
      echo "TagName: " . $row['tag_name'] . "<br>";
      echo "TagUsedTime: " . $row['used_time'] . "<br>";
      echo "---------------<br>";
    }

}
// 【テスト】data_idを出力
    if(!empty($_POST['select_id'])) {
      $_SESSION['select_id'] = $_POST['select_id'];
    }else {
      $_SESSION['select_id'] = "new";
      
   }
   echo $_SESSION['select_id'];
    ?>
    


<script>

  function isClick(e,obj, num){
  sendPost("","select_id",num);
}
  


  function sendPost(act,name,num){
  let form = document.createElement('form');
  let request = document.createElement('input');
  form.method = 'POST';
  form.action = act;
  request.type = 'hidden';
  request.name = name;
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

</script>
<!-- <div id = switch></div> -->
<p class="kk" style="color:#DCB3FC">文章</p>
<form method="post" action="sample.cgi" class="h">
  <textarea name="kansou" rows="10" cols="100"></textarea><br>
  <div class="ky">
  <li class="form-control" style="color:#DCB3FC; width: 100px; "onclick="location.href='login.php'">共有</li>
  </div>
  </form>
  <script src="./header.js"></script>
</body>
</body>
</html>