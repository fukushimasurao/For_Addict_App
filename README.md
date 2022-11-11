# 概要

- 名前
  - 衝動記録くん
    - For_Addict_App

- サービス内容
依存症支援のためのapp

- 必要な機能
  - ログイン（ソーシャル？
    - 最初はメールアドレスに変更
  - 開始に力の日付がわかる。
  - 自分の目標がわかる。
  - 症状の記録ができる。
  - 過去の記録を見ることができる。

- 必要な画面
  - index
  - ログインページ（ソーシャルログイン
  - 記入画面→確認画面
  - 記録一覧
  - 編集画面→確認画面
  - マイページ
    - 開始日時変更画面
    - 目標変更画面
  - (削除画面)

- 必要テーブル
  - user(そのまま有用)
    - id
    - name
    - $table->string('email')->unique();
    - $table->timestamp('email_verified_at')->nullable();
    - $table->string('password');
    - $table->rememberToken();
    - $table->timestamps();

  - diary
    - id
    - user_id
    - date
    - time
    - elapsed_time
    - feeling
    - coping_measures

## 中身

laravel * sailを利用。

- PHP `8.1.12`
- Laravel `9.36.4`

- 起動時
`sail up -d`

`sail npm run dev`
→ <http://localhost>

- 終了時
`sail run stop`

- phpmyadmin
<http://localhost:8888/index.php>

- mailhog
<http://localhost:8025/>

Trello 公開済み <https://trello.com/b/nlcqW4Uq>

![名称未設定のノート中毒-2](https://user-images.githubusercontent.com/46878156/188294648-2f51a2ff-896a-4862-82d8-aeaa37ce6249.jpg)
![名称未設定のノート中毒-3](https://user-images.githubusercontent.com/46878156/188294647-8a847188-7337-4208-a728-ea71cc51a2c1.jpg)
![名称未設定のノート中毒-4](https://user-images.githubusercontent.com/46878156/188294646-1ebe6771-cf79-4e45-8b76-bb65a24fda38.jpg)
![名称未設定のノート中毒-5](https://user-images.githubusercontent.com/46878156/188294645-a311be65-0e77-469b-9355-73e2fed50ae6.jpg)
![名称未設定のノート中毒-6](https://user-images.githubusercontent.com/46878156/188294644-90f88bc4-d936-44dc-8929-3d64646b4e2f.jpg)
![名称未設定のノート中毒-7](https://user-images.githubusercontent.com/46878156/188294642-09588b06-dfca-4b31-9c15-5dfbf6ba1e19.jpg)
![名称未設定のノート中毒-8](https://user-images.githubusercontent.com/46878156/188294640-bbf164c8-9787-448f-ba3e-70b80f0845a2.jpg)
![名称未設定のノート中毒-9](https://user-images.githubusercontent.com/46878156/188294639-ffa8cbef-0900-4791-8fdb-bde899582deb.jpg)
