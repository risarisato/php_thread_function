<?php

// DBを接続の「状態」を見に下記URLまで見にいないといけないのは面倒
// http://localhost:8080/php_thread_function/app/database/connect.php
// include_onceでpathを読み込んであげる。
include_once("./app/database/connect.php");

# isset関数で「submitButton」が入っているか判定させるてワーニングを回避
if (isset($_POST["submitButton"])) {
    $username = $_POST["username"];
    var_dump($username);
    $body = $_POST["body"];
    var_dump($body);
}

$commnet_array = array();

// sqlクエリを取得する
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();
$commnet_array = $statement;

//sqlクエリの中身を「var_dump」で確認する
//var_dump($commnet_array);
//var_dump($commnet_array->fetchObject());
//var_dumpするとプログラムが止まっていまうのはdd();と同じ
//var_dump($commnet_array->fetchAll());


#$title = "shincode";
#var_dump($title); #phpのデバッグ
#string(8)=型＞文字 "shincode"＝値
# スーパーグローバル変数はPHPの組み込み変数
# "username"(key)=>"shincode"(値)の連想配列
$username = $_POST["username"];
var_dump($username); #ここでPOSTメソッドが発動している

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP掲示板スレッド機能</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <h1 class="title">PHP掲示板スレッド機能-掲示板</h1>
        <!-- 「CTRL」+「/」でhtmlのコメントアウトできる -->
        <!-- hr は水平線 -->
        <!-- http://localhost:8080/2chan-bbs/ -->
        <hr>
    </header>

    <!-- スレッドエリア -->
    <div class="threadWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【スレッド掲示板作成】</span>
                <h1>PHP掲示板スレッド機能-掲示板を作ってみた</h1>
            </div>
            <section>
                <?php foreach ($commnet_array as $comment) : ?>
                    <article>
                        <div class="wrapper">
                            <div class="nameArea">
                                <span>名前：</span>
                                <!-- <p class="username">Shincodeハードコーディング</p> -->
                                <p class="username"><?php echo $comment["username"];?></p>
                                <!-- <time>：2023/08/19 13:02ハードコーディング</time> -->
                                <time>：<?php echo $comment["post_date"];?></time>
                            </div>
                            <!-- <p class="comment">手書きのハードコーディングです</p> -->
                            <p class="comment"><?php echo $comment["body"]; ?></p>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
            <!-- メソッドをpostで送信する -->
            <form class="formWrapper" method="post">
                <div>
                    <!-- 「input」のsubmitで送信ボタン:name="submitButton"をつけてワーニングを回避する -->
                    <input type="submit" value="投稿する" name="submitButton">
                    <label>名前：</label>
                    <!-- この「text」は、usernameを打ち込むためのinputフォームになる -->
                    <input type="text" name="username">
                </div>
                <div>
                    <textarea class="commentTextArea" name="body"></textarea>
                </div>
            </form>
        </div>
    </div>
</body>
</html>