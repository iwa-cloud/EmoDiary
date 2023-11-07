<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// gestのtest
    require_once './DBManager.php';
    $dbmng = new DBManager();

    // 現在時刻を取得
    $time = $dbmng->getTime();
    // // 最終利用時間を更新するtag_idを入れておく
    // $newTagTimes = array('0000014' => 'test1',);
    // // 対象data_id
    // $data_id = "0000001";

    // // tag使用時間更新処理（成功）
    // // data_idとtag_idから任意のtagを選択する
    // for($val = 0; $val < count($newTagTimes); $val++){
    //     echo $time;
    //     $tag_id = $newTagTimes[$val];
    //     // 引数（更新時間、data_id、tag_id）
    //     $test = $dbmng->updateTagTimeSub($time, $data_id, $tag_id);
    // }
    
    
    

    // $data_id = "0000003";
    // $user_id = "0000003";
    // $title = "TitleTest3";
    // $url = "URLTest3";
    // $memo = "MemoTest3";
    // $tag = $dbmng->updateData($data_id, $user_id, $title, $url, $memo, $time);
    // echo $tag;
    
    
    
    // $data_id = "0000001";
    // $tag_name = "楽しい";
    // $tag = $dbmng->tagDoubleSearch($data_id,$tag_name);
    // var_dump($tag);
    
    
    
    // $data_id = "0000003";
    // $photo = "0000002";
    // $tag = $dbmng->photoDoubleSearch($data_id, $photo);
    
    $user_id = "0000002";
    $title = "";
    $memo = "memotest";
    $tag_name = "青春";
    $day = "2023/10/23";
    $result = $dbmng->search($user_id, $title, $memo, $tag_name, $day);
    foreach ($result as $row) {
        echo "<h2>" . $row['title'] . "</h2>";
    }

    

    
    ?>
</body>
</html>