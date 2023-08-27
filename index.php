<?php

// DBを接続の「状態」を見に下記URLまで見にいないといけないのは面倒
// http://localhost:8080/php_thread_function/app/database/connect.php
// include_onceでpathを読み込んであげる。
include_once("./app/database/connect.php");



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
    <!-- headerファイルをリファクタリング -->
    <?php include("app/parts/header.php"); ?>

    <!-- validationファイルをリファクタリング -->
    <?php include("app/parts/validation.php"); ?>

    <!-- threadWrapperァイルをリファクタリング -->
    <?php include("app/parts/thread.php"); ?>

</body>
</html>