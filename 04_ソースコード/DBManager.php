<?php
class DBManager
{

    // DB接続のメソッド
    private function dbConnect()
    {
        $dsn = 'mysql:host=mysql218.phy.lolipop.lan;dbname=LAA1418433-emodiary;charset=utf8';
        $user = 'LAA1418433';
        $pass = 'EmoDiary1016';
        $pdo = new PDO($dsn, $user, $pass);

        return $pdo;
    }

    //テスト用
    public function test()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT user_name FROM users WHERE user_id = '0000002'";
        $ps = $pdo->query($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // テスト(時間取得)用
    public function testDate()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT CURRENT_TIME";
        $ps = $pdo->query($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // --------------------------------以下処理---------------------------------------------------------

    // --------------------------------ユーザー関係------------------------------------

    // ユーザーが存在しているか、パスワードが正しいか（呼出）チェック
    public function userExist($mail, $pass)
    {
        $result = $this->existCheck($mail);

        if ($result != "error") {
            $result2 = $this->passCheck($mail, $pass);
            if ($result2 != NULL) {
                $pdo = $this->dbConnect();
                $sql = "SELECT user_id FROM users WHERE mail = ? AND pass = ?";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $mail, PDO::PARAM_STR);
                $ps->bindValue(2, $pass, PDO::PARAM_STR);
                $ps->execute();
                $result1 = $ps->fetchAll();
                return $result1[0]['user_id'];
            }
        }
        return "error";
    }

    // ユーザーが存在しているかチェック
    public function existCheck($mail)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT user_id FROM users WHERE mail = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $mail, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();

        // 値が返ってきたか、ゲストモード以外か
        if (!empty($result[0]['user_id'])) {
            return $result[0]['user_id'];
        } else {
            return "error";
        }
    }

    // パスワードが正しいかチェック
    public function passCheck($mail, $pass)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM users WHERE mail = ? AND pass = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $mail, PDO::PARAM_STR);
        $ps->bindValue(2, $pass, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // メールアドレス重複チェック(1行以上結果が返ってきたら重複している)
    public function mailDoubleCheck($mail)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM users WHERE mail = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $mail, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // ユーザー情報取得
    public function userInfoGet($uId)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM users WHERE user_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // ユーザー名取得
    public function userNameGet($uId)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT user_name FROM users WHERE user_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // ユーザー情報変更処理
    public function updateUserInfo($uId, $name, $pass)
    {

        // ユーザー名を更新
        $tag_id = $this->updateName($uId, $name);

        // パスワードを更新
        $tdTbl = $this->updatePass($uId, $pass);
    }

    // ユーザーのパスワードを更新
    public function updatePass($uId, $pass)
    {
        $pdo = $this->dbConnect();
        $sql = "UPDATE users SET pass = ? WHERE user_id = ?;";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $pass, PDO::PARAM_STR);
        $ps->bindValue(2, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // ユーザー名を更新
    public function updateName($uId, $name)
    {
        $pdo = $this->dbConnect();
        $sql = "UPDATE users SET user_name = ? WHERE user_id = ?;";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $uId, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // ユーザー新規登録
    public function userRegist($name, $mail, $pass)
    {
        $pdo = $this->dbConnect();
        // 一番最後のuser_idを取得し、+1されたuser_idを生成する
        $maxId = $this->getMaxUserId();
        $maxId = $this->strToNum($maxId);
        $maxId++;
        $maxId = $this->numToStr($maxId);

        $sql = "INSERT INTO users (user_id,user_name,mail,pass) VALUES (?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $maxId, PDO::PARAM_STR);
        $ps->bindValue(2, $name, PDO::PARAM_STR);
        $ps->bindValue(3, $mail, PDO::PARAM_STR);
        $ps->bindValue(4, $pass, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $result;
    }


    // 一番最後のuser_idを取得
    public function getMaxUserId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 一番最後のtag_idを取得
    public function getMaxTagId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT tag_id FROM tag ORDER BY tag_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 一番最後のphoto_idを取得
    public function getMaxPhotoId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT photo_id FROM photo ORDER BY photo_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 一番最後のdata_idを取得
    public function getMaxDataId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT data_id FROM data ORDER BY data_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 一番最後のdateAndPhoto_idを取得
    public function getMaxPdId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT dp_id FROM photoAndData ORDER BY dp_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 一番最後のtagAndData_idを取得
    public function getMaxTdId()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT td_id FROM tagAndData ORDER BY td_id DESC LIMIT 1";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }

    // 0埋めされた文字から数字に変換
    public function strToNum($num)
    {
        $replace = (int)$num;
        return $replace;
    }

    // 数字を0埋めして文字(7桁)に変換
    public function numToStr($num)
    {
        $replace = sprintf('%07d', $num);
        return $replace;
    }

    // 指定したid(VARCHAR)に+1した値を返す(VARCHAR)
    public function nextId($id)
    {
        $nextId = $this->strToNum($id);
        $nextId++;
        $nextId = $this->numToStr($nextId);
        return $nextId;
    }

    // 時間を取得
    public function getTime()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT NOW()";
        $ps = $pdo->query($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってるから[0][0]を付けてる
        return $result[0][0];
    }


    // --------------------------------データ関係------------------------------------

    // データ一件取得(title, url, memo)
    public function getData($data_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM data WHERE data_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データに適応されているタグを取得
    public function getDataTag($data_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT tag.tag_id, tag.tag_name FROM tag JOIN (SELECT tag_id FROM tagAndData WHERE data_id = ?) AS sub ON tag.tag_id = sub.tag_id";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // 使用されていないタグを取得
    public function getNotSelectTag($data_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT tag.tag_id, tag.tag_name FROM tag LEFT JOIN (SELECT tag_id FROM tagAndData WHERE data_id = ?) AS sub ON tag.tag_id = sub.tag_id WHERE sub.tag_id IS NULL";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データ一件取得(photo)
    public function getDataPhoto($data_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT photo.photo FROM photo JOIN (SELECT photo_id FROM photoAndData WHERE data_id = ?) AS sub ON photo.photo_id = sub.photo_id";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データ一覧取得最新順兼日付順(data_id, title, c_time)
    // 日付順はphpで処理する
    public function getDataNewest($user_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT data_id, title, c_time FROM data WHERE user_id = ? ORDER BY c_time DESC";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データ一覧取得タグ順(data_id,title, tag)>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // userが使用したタグの最終利用時間順で並び替える
    // user_idで絞って、tagの最終利用時間順で並び替える
    public function getDataByDate($user_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT data.data_id, data.title, tag.tag_name, tagAndData.used_time FROM tagAndData JOIN data ON tagAndData.data_id = data.data_id JOIN tag ON tag.tag_id = tagAndData.tag_id WHERE user_id = ? ORDER BY tag.tag_name DESC";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データプレビュー取得
    // photoとmemo
    public function getDataPAndM($data_id)
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT dataId.memo, photo.photo FROM photoAndData JOIN (SELECT * FROM data WHERE data_id = ?) AS dataId ON photoAndData.data_id = dataId.data_id JOIN photo ON photo.photo_id = photoAndData.photo_id";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // $resultが二次元配列になってる
        return $result;
    }

    // データ登録処理>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // tagは$_POSTで配列で渡す
    public function insertData($data_id, $user_id, $title, $url, $memo, $time)
    {
        $pdo = $this->dbConnect();

        $sql = "INSERT INTO data(data_id, user_id, title, url, memo, c_time) VALUES (?,?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->bindValue(2, $user_id, PDO::PARAM_STR);
        $ps->bindValue(3, $title, PDO::PARAM_STR);
        $ps->bindValue(4, $url, PDO::PARAM_STR);
        $ps->bindValue(5, $memo, PDO::PARAM_STR);
        $ps->bindValue(6, $time, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $result;
    }

    // データ更新(data)
    public function updateData($data_id, $user_id, $title, $url, $memo, $time)
    {
        $pdo = $this->dbConnect();

        $sql = "UPDATE data SET title = ?, url = ?, memo = ?, c_time = ? WHERE data_id = ? AND user_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $title, PDO::PARAM_STR);
        $ps->bindValue(2, $url, PDO::PARAM_STR);
        $ps->bindValue(3, $memo, PDO::PARAM_STR);
        $ps->bindValue(4, $time, PDO::PARAM_STR);
        $ps->bindValue(5, $data_id, PDO::PARAM_STR);
        $ps->bindValue(6, $user_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $result;
    }


    // --------------------------------タグ関係------------------------------------

    // タグ新規登録処理
    public function insertTag($data_id, $tag_name, $time)
    {

        // tagテーブルに登録
        $tag_id = $this->insertTagTbl($tag_name);

        // tagAndDataテーブルに登録
        $tdTbl = $this->insertTdTbl($data_id, $tag_id, $time);
    }

    // tag登録処理
    public function insertTagTbl($tag_name)
    {
        $pdo = $this->dbConnect();
        // 一番最後のtag_idを取得し、+1されたtag_idを生成する
        $tag_id = $this->getMaxTagId();
        $tag_id = $this->nextId($tag_id);

        $sql = "INSERT INTO tag(tag_id, tag_name) VALUES (?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $tag_id, PDO::PARAM_STR);
        $ps->bindValue(2, $tag_name, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はtag_id
        return $tag_id;
    }

    // tagAndData登録処理
    public function insertTdTbl($data_id, $tag_id, $time)
    {
        $pdo = $this->dbConnect();
        // 一番最後のtd_idを取得し、+1されたtd_idを生成する
        $maxId = $this->getMaxTdId();
        $td_id = $this->nextId($maxId);

        $sql = "INSERT INTO tagAndData(td_id, data_id, tag_id, used_time) VALUES (?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $td_id, PDO::PARAM_STR);
        $ps->bindValue(2, $data_id, PDO::PARAM_STR);
        $ps->bindValue(3, $tag_id, PDO::PARAM_STR);
        $ps->bindValue(4, $time, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $result;
    }

    // タグ一覧取得
    public function getTags()
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM tag";
        $ps = $pdo->query($sql);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result;
    }

    // タグ一件取得
    public function getTag($tag_id) {
        $pdo = $this->dbConnect();
        $sql = "SELECT tag_name FROM tag WHERE tag_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $tag_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        return $result[0][0];
    }

    // タグ最終利用時間更新処理(仮)
    public function updateTagTimeSub($time, $data_id, $tag_id)
    {
        $pdo = $this->dbConnect();
        $sql = 'UPDATE tagAndData SET used_time = ? WHERE data_id = ? AND tag_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $time, PDO::PARAM_STR);
        $ps->bindValue(2, $data_id, PDO::PARAM_STR);
        $ps->bindValue(3, $tag_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらないかも
        return $result;
    }

    // タグ重複検索
    public function tagDoubleSearch($data_id, $tag_name, $time)
    {
        $flg = "no";

        $pdo = $this->dbConnect();
        $sql = 'SELECT tag_id FROM tag WHERE tag_name = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $tag_name, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        if (empty($result[0][0])) {
            $flg = $this->insertTag($data_id, $tag_name, $time);
        } else {
            $tag_id = (string)$result[0][0];

            // data_idとtag_idが結びついた行があるか
            $flg = $this->dataTagChk($data_id, $tag_id);

            if ($flg == "no") {
                // tagAndDataテーブルに登録
                $flg = $this->insertTdTbl($data_id, $tag_id, $time);
            } else {
                // 最終利用時間を更新
                $flg = $this->updateTagTimeSub($time, $data_id, $tag_id);
            }
        }

        return $result;
    }

    // data_idとtag_idが結びついているか
    public function dataTagChk($data_id, $tag_id)
    {
        $td = "no";
        $pdo = $this->dbConnect();
        $sql = 'SELECT td_id FROM tagAndData WHERE data_id = ? AND tag_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->bindValue(2, $tag_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 返り値があればtd_idを返す
        if (!empty($result[0]['td_id'])) {
            $td = $result[0]['td_id'];
        }
        return $td;
    }


    // --------------------------------検索関係------------------------------------



    // 検索(タイトル、メモ、タグ、日付)
    public function search($user_id, $title, $memo, $tag_name, $day)
    {
        $pdo = $this->dbConnect();

        // 検索用に修正
        $day = str_replace("/", "-", $day);
        $day = $day . "%";
        $memo = "%" . $memo . "%";
        $title = "%" . $title . "%";

        // SELECT DISTINCT data.data_id, data.title FROM data LEFT JOIN (SELECT sub.data_id FROM tagAndData LEFT JOIN (SELECT * FROM data WHERE user_id = "0000002") AS sub ON tagAndData.data_id = sub.data_id JOIN tag ON tag.tag_id = tagAndData.tag_id WHERE tag_name LIKE "%%") AS sub2 ON data.data_id = sub2.data_id WHERE user_id = "0000002" AND c_time LIKE "2023%" AND (title LIKE "%%" AND memo LIKE "%%");


        // SELECT data.data_id, data.title FROM data JOIN (SELECT DISTINCT tagAndData.data_id FROM tagAndData JOIN tag ON tagAndData.tag_id = tag.tag_id WHERE tag.tag_name LIKE "%懐かしい%") AS sub ON data.data_id = sub.data_id WHERE user_id = "0000002" AND c_time LIKE "2023%" AND (title LIKE "%%" AND memo LIKE "%%");

        $sql = 'SELECT DISTINCT data.data_id, data.title FROM data JOIN (SELECT tagAndData.data_id FROM tagAndData JOIN tag ON tagAndData.tag_id = tag.tag_id WHERE tag.tag_name LIKE ?) AS sub ON data.data_id = sub.data_id WHERE user_id = ? AND c_time LIKE ? AND (title LIKE ? AND memo LIKE ?)';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $tag_name, PDO::PARAM_STR);
        $ps->bindValue(2, $user_id, PDO::PARAM_STR);
        $ps->bindValue(3, $day, PDO::PARAM_STR);
        $ps->bindValue(4, $title, PDO::PARAM_STR);
        $ps->bindValue(5, $memo, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // titleの配列
        return $result;
    }


    // --------------------------------写真関係------------------------------------



    // 保存する写真の名前を生成(拡張子抜き)
    public function getPhotoNextId()
    {
        $pdo = $this->dbConnect();
        // 一番最後のphoto_idを取得し、+1されたphoto_idを生成する
        $maxId = $this->getMaxPhotoId();
        $maxId = $this->nextId($maxId);
        return $maxId;
    }

    // 写真登録処理
    public function insertPhoto($data_id, $photo_name)
    {

        // photoテーブルに登録
        $photo_id = $this->insertPhotoTbl($photo_name);

        // photoAndDataテーブルに登録
        $PdTbl = $this->insertPdTbl($data_id, $photo_id);
    }

    // photo登録
    public function insertPhotoTbl($photo_name)
    {
        $pdo = $this->dbConnect();
        // 一番最後のdp_idを取得し、+1されたdp_idを生成する
        $maxId = $this->getMaxPhotoId();
        $photo_id = $this->nextId($maxId);

        $sql = "INSERT INTO photo(photo_id, photo) VALUES (?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $photo_id, PDO::PARAM_STR);
        $ps->bindValue(2, $photo_name, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $photo_id;
    }

    // photoAndData登録
    public function insertPdTbl($data_id, $photo_id)
    {
        $pdo = $this->dbConnect();
        // 一番最後のdp_idを取得し、+1されたdp_idを生成する
        $maxId = $this->getMaxPdId();
        $dp_id = $this->nextId($maxId);

        $sql = "INSERT INTO photoAndData(dp_id, data_id, photo_id) VALUES (?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $dp_id, PDO::PARAM_STR);
        $ps->bindValue(2, $data_id, PDO::PARAM_STR);
        $ps->bindValue(3, $photo_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらない
        return $result;
    }


    // 写真重複検索
    // 写真がすでに登録されていれば最終利用時間を更新し、
    // 登録されていなければ、新規登録する
    public function photoDoubleSearch($data_id, $photo)
    {
        // LIKE検索用に修正
        $photoLike = "%" . $photo . "%";

        // パスの名前を格納
        $photo_name = "./img/" . $photo . ".jpeg";

        $pdo = $this->dbConnect();
        // $sql = 'SELECT photo_id FROM photo WHERE photo LIKE ?';
        // 指定したdata_idにphotoがあるか検索
        $sql = 'SELECT photoAndData.photo_id FROM photoAndData INNER JOIN photo ON photoAndData.photo_id = photo.photo_id WHERE data_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $data_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        if (empty($result)) {
            // 新規登録
            $result = $this->insertPhoto($data_id, $photo_name);
        } else {
            // photo_idを$photoに格納
            $photo = $result[0][0];
            // 更新
            $result = $this->updatePhoto($photo, $photo_name);
        }

        return $result;
    }


    // 写真を上書き保存する
    // (photoテーブルのphoto_idに紐づいた写真のパスを更新する)
    public function updatePhoto($photo_id, $photo_name)
    {
        $pdo = $this->dbConnect();

        $sql = 'UPDATE photo SET photo = ? WHERE photo_id = ?';
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $photo_name, PDO::PARAM_STR);
        $ps->bindValue(2, $photo_id, PDO::PARAM_STR);
        $ps->execute();
        $result = $ps->fetchAll();
        // 戻り値はいらないかも
        return $result;
    }
}
?>