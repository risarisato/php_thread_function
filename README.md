## PHP掲示板スレッド機能を作成する


## 環境構築
- XAMMP環境で作成
- http://localhost:8080/2chan-bbs/
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
