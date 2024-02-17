# 簡易的な健康診断の受診記録を管理するシステム

仕様はこちら → [SPECIFICATION.md](/SPECIFICATION.md)

## 開発環境
以下のコマンドで環境構築できます
```shell
make init
# DBの初回構築に多少時間がかかるので、しばらくしたら以下のマイグレーションを実行
make migrate
make seed.sample
```

以下のURLで動作を確認できます  
http://localhost/

その他のコマンド
```shell
# 立ち上げ
make up
# 終了
make down
# ヘルプ表示
make help
```

## コマンドライン
コマンドラインでの実行も用意しています

コマンドを記載していますが、Docker環境の場合は `docker compose exec php` を先頭につけるなど適宜読み替えてください

### ユーザー詳細情報の表示
```shell
php artisan app:show-user-detail {userId}
```
