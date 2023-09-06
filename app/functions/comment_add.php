<?php
// コメント投稿するための関数

// $error_message が無いときに書き込める
$error_message = array();


// isset関数で「submitButton」が入っているか判定させるてワーニングを回避
if (isset($_POST["submitButton"])) {
    //$username = $_POST["username"];
    //var_dump($username);
    //$body = $_POST["body"];
    //var_dump($body);

    // 名前のバリデーションチェック
    if (empty($_POST["username"])) {
        $error_message["username"] = "名前が未記入です。";
    } else {
        // エスケープ処理<script>_</script>を実行させない
        $escapse["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    }

    // コメントのバリデーションチェック
    if (empty($_POST["body"])) {
        $error_message["body"] = "コメントがありません。";
    } else {
        // エスケープ処理<script>_</script>を実行させない
        $escapse["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
    }

    if (empty($error_message)) {

        // 時間と日付を定義する
        $post_date = date("Y-m-d H:i:s");

        // sqlにINSERTする
        $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`)
        VALUES (:username, :body, :post_date, :thread_id);";
        $statement = $pdo->prepare($sql);

        // 値をセット(:username, :body, :post_date)する→エスケープ処理した変数を使用する
        $statement->bindParam(":username", $escapse["username"], PDO::PARAM_STR);
        $statement->bindParam(":body", $escapse["body"], PDO::PARAM_STR);
        //$statement->bindParam(":username", $_POST["username"], PDO::PAPAM_STR);スペルミス
        //$statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        //$statement->bindParam(":body", $_POST["body"], PDO::PAPAM_STR);スペルミス
        //$statement->bindParam(":body", $_POST["body"], PDO::PARAM_STR);
        //$statement->bindParam(":post_date", $post_date, PDO::PAPAM_STR);スペルミス
        $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);

        //app\parts\commentFrom.phpの「value="<?php echo $thread["id"];を渡す
        $statement->bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);

        $statement->execute();
    }
}