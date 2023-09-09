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

    //名前のバリデーションチェック
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

        // トランザクション処理を開始する
        $pdo->beginTransaction();

        try {
            // sqlにINSERTする
            $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
            $statement = $pdo->prepare($sql);

            // 親スレッドのテーブルは「title」カラム
            $statement->bindParam(":title", $escapse["title"], PDO::PARAM_STR);
            $statement->execute();

            // コメント追加のSQL=タイトルが同じかどうかでスレッド判定する(サブクエリ)
            $sql = "INSERT INTO comment (username, body, post_date, thread_id)
            VALUES (:username, :body, :post_date,
            (SELECT id FROM thread WHERE title = :title))";
            $statement = $pdo->prepare($sql);

            // 値をセットする>>先にスレッドが存在してからタイトルになる
            $statement->bindParam(":username", $escapse["username"], PDO::PARAM_STR);
            $statement->bindParam(":body", $escapse["body"], PDO::PARAM_STR);
            $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $statement->bindParam(":title", $escapse["title"], PDO::PARAM_STR);

            // 実行
            $statement->execute();

            // 正常にトランザクション処理が完了したらコミットする
            $pdo->commit();
        } catch (PDOException $error) {
            // エラーが発生したときはロールバックする
            $pdo->rollBack();
    }
    // ノートPC親スレッドの投稿したら、掲示板に戻るリダイレクト
    //header("Location: http://localhost:8080/2chan-bbs");
    // デスクトップPC親スレッドの投稿したら、掲示板に戻るリダイレクト
    header("Location: http://localhost:8080/php_thread_function");

    // PATHが変わるので、それぞれのPATHを記述する
    //if (file_exists("C:/xampp/htdocs/")) { // flie_exists関数でファイルが存在するか確認
    //    // ノートPC親スレッドの投稿したら、掲示板に戻るリダイレクト
    //    header("Location: http://localhost:8080/2chan-bbs");
    //} else {
    //    // デスクトップPC親スレッドの投稿したら、掲示板に戻るリダイレクト
    //    header("Location: http://localhost:8080/php_thread_function");
    //}
    }
}