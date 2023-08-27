#### 33. コードのリファクタリングをはじめよう

## PHP掲示板スレッド機能を作成する
- http://localhost:8080/2chan-bbs/
- http://localhost:8080/phpmyadmin/
- http://localhost:8080/php_thread_function/ (ファイルパスが違うため)

## 環境構築
- XAMMP環境で作成
- /c/xampp/htdocs/2chan-bbs (main)
- xampp/htdocs/2chan-bbsで`「git init」`のフォルダをgit管理
- git remote add origin git@XXXX でリモート追加
- `git push -u origin main`:なぜかmasterになったため


##### ブランチ削除について
- gitの削除知識(どちらも同じ)<br>
`git branch --delete ブランチ名`<br>
`git branch -d ブランチ名`<br>
マージ済みのブランチのみ削除ができる<br>
マージされていないブランチを削除しようと下記のエラーになる。<br>
`error: Cannot delete the branch ブランチ名 which you are currently on`

#### ブランチマージしてないときは強制削除する
`git branch -D ブランチ名`

<hr>
- 「hr」 は水平線<br>
- `「CTRL」+「/」`でhtmlのコメントアウトできる<br>
- /* 「CTRL」+「/」でcssのコメントアウトできる */<br>
- vscodeで「crtl + D」で同じ文字列を選択できる

## MySQL起動エラー
Error: MySQL shutdown unexpectedly.<br>
This may be due to a blocked port, missing dependencies,<br>
improper privileges, a crash, or a shutdown by another method.<br>
Press the Logs button to view error logs and check<br>
the Windows Event Viewer for more clues<br>
If you need more help, copy and post this<br>
entire log window on the forums<br>

#### XAMPPの「shell」から下記のコマンドを実行
aria_chk -r<br>
del C:\xampp\mysql\data\aria_log.*

## xss攻撃
- <script>window.location.href ="https://google.com":</script> 実行される
- DBの中身は…
- &lt;script&gt;window.location.href =&quot;https://google.com&quot;:&lt;/script&g エスケープ処理される
