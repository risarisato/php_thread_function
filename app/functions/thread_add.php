<?php
// 親スレッドを追加するための投稿

// $error_message が無いときに書き込める
$error_message = array();


// isset関数で「threadSubmitButton」が入っているか判定
//if (isset($_POST["threadsubmitButton"])) { タイポ大文字「threadsubmitButton」「threadSubmitButton」
if (isset($_POST["threadSubmitButton"])) {

    // 親のスレッド名のバリデーションチェック
    if (empty($_POST["title"])) {
        $error_message["title"] = "名前が未記入です。";
    } else {
        // エスケープ処理<script>_</script>を実行させない
        $escapse["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    }

    // // コメントのバリデーションチェック
    // if (empty($_POST["body"])) {
    //     $error_message["body"] = "コメントがありません。";
    // } else {
    //     // エスケープ処理<script>_</script>を実行させない
    //     $escapse["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
    // }

    if (empty($error_message)) {

        // 時間と日付を定義する
        $post_date = date("Y-m-d H:i:s");

        // 親スレッド「thread」にsqlにINSERTする
        $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
        $statement = $pdo->prepare($sql);

        // 親スレッドのテーブルは「title」カラム
        $statement->bindParam(":title", $escapse["title"], PDO::PARAM_STR);

        $statement->execute();
    }
}