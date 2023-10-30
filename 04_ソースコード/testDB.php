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
    
    
    $tag = $dbmng->insertData("0000002", "test4", "testURL4", "testMemo4", $time);
    echo $tag;
    // var_dump($tag);
    // if(empty($tag)) {
    //     echo "no";
    // }else {
    //     echo "yes";
    // }

    
    ?>
</body>
</html>