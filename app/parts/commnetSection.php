<?php
// データを取得するための関数
include("app/functions/comment_get.php");
?>

<!-- コメントを表示するためのエリア -->
<section>
    <?php foreach ($commnet_array as $comment) : ?>
        <!-- スレッドのidとコメントのthread_idが一致するときに同時に投稿 -->
        <?php if($thread["id"] == $comment["thread_id"]) : ?>
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
        <?php endif; ?>
    <?php endforeach ?>
</section>