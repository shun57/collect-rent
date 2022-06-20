## アプリケーション

### ダミーログインユーザー

```
vyamada@example.net
password
```

## DB定義

https://dbdiagram.io/d/6297897254ce2635273fe202

### DBアクセス

```
$ docker compose exec db bash

$ mysql -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE
```

## テスト

### テスト実施

```
$ php artisan test
```


## Laravelキャッシュクリア

```
$ php artisan cache:clear
$ php artisan config:clear
$ php artisan route:clear
$ php artisan view:clear
```