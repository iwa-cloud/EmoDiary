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
    $test = $dbmng->getDataNewest("0000002");
    // $name;
    // foreach ($test as $row) {
    //     $name = $row['user_name'];
    // }

    echo '<h1>';
    var_dump($test);
    echo '</h1>';

    ?>
</body>
</html>