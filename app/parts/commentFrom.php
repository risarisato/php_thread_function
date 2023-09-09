<?php
// 位置の初期値を0にする
$position = 0;

// 送信ボタンが押されたら「position」の位置を取得する
if (isset($_POST["submitButton"])) {
    $position = $_POST["position"];
}
?>

<!-- メソッドをpostで送信する -->
<form class="formWrapper" method="post">
    <div>
        <!-- 「input」のsubmitで送信ボタン:name="submitButton"をつけてワーニングを回避する -->
        <input type="submit" value="投稿する" name="submitButton">
        <label>名前：</label>
        <!-- この「text」は、usernameを打ち込むためのinputフォームになる -->
        <input type="text" name="username">
        <!-- スーパグローバルとしてthreadIDを渡す、ユーザに見せる必要がないのでhidden -->
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea class="commentTextArea" name="body"></textarea>
    </div>
    <!-- スクロール位置の取得 -->
    <input type="hidden" name="position" value="0">
</form>

<!-- Jqueryでスクロール位置に戻らないようにするcdnはネットワークに繋がっていれば使える -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // ページがすべて読み込まれたら実行する
    $(document).ready(() => {
        $("input[type=submit]").click(() => {
            // スクロール位置を取得する
            let position = $(window).scrollTop();
            // スクロール位置をhiddenにセットする
            $("input:hidden[name=position]").val(position);
        })
        // スクロール位置をセットする
        $(window).scrollTop(<?php echo $position; ?>);
    })
</script>