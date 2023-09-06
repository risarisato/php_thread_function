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
</form>