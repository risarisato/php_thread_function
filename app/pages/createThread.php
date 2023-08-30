<?php

// こちらは親ページになるのでpathが変わる！
include_once("../database/connect.php");


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

</body>
</html>