<?php

// こちらは親ページになるのでpathが変わる！
include_once("../database/connect.php");

// 親スレッドの新規立ち上げのpath
include_once("../../app/functions/thread_add.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>親スレッド新規書き込みのページ</title>
    <!-- 親ページからのpathに変わるCSSファイル -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <!-- 親ページからのpathに変わるheaderファイル -->
    <?php include("../../app/parts/header.php"); ?>

    <!-- 親ページからのpathに変わるvalidationファイル -->
    <?php include("../parts/validation.php"); ?>

    <!-- cssファイルを分けることも可能だが、直接HTMLに書き込む方法 -->
    <div style="padding-left: 80px; color: green">
        <!-- 直接HTMLにcss書き込む -->
        <h2 style="margin-top: 20px; margin-bottom: 0;">新規の親スレッド立ち上げページ</h2>
    </div>
    <form method="POST" class="formWrapper">
        <div>
            <label>新規スレッド名</label>
            <input type="text" name="title">
            <label>親の投稿者名</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="body" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="新規スレッド投稿" name="threadSubmitButton">
    </form>

</body>
</html>