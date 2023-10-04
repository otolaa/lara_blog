### 1 - Источник (Шаг 2. Laravel курс. Блог)
https://www.youtube.com/playlist?list=PLd2_Os8Cj3t8StX6GztbdMIUXmgPuingB

```
curl -s https://laravel.build/laravel_example_app | bash
```

### 2 - // edit -> .env
```
cd laravel_0
WWWGROUP=1000
WWWUSER=1000
```

### 2.5
```
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh
```

### 3
```
docker-compose up -d # запуск сервера
docker-compose up -d --build  # запуск с обновлением и т.д.
docker-compose stop  # остановка сервера
docker ps  # посмотреть процессы на сервере 

docker stop $(docker ps -a -q) // остановить все докеры
docker rm $(docker ps -a -q) // удалить все докеры
docker update --restart=no $(docker ps -a -q)  // Используйте приведенное ниже, чтобы отключить ВСЕ контейнеры с автоматическим 
```

### 4
```
docker exec -it ed2e5478c11c bash
php artisan --version
php artisan --help
php artisan serv
```

### 5
```
php artisan make:controller MyPlaceController
```

#### 6 - help
```
dd()
dump()
```

### 5
```
php artisan migrate
```

### 6
```
docker exec -it 7104e6ba6318 bash
mysql -u sail -p laravel_0
SHOW TABLES FROM laravel_0;
SHOW COLUMNS FROM posts;
```

### 8  ~/laravel/laravel_0/app/Http/Controllers
```
sudo chown 1000:1000 *

// создает модель и миграцию
php artisan make:model Post -m
//

// добавить запись
INSERT INTO posts (id, title, content) VALUE (1, 'title', 'content');

//

```
### 9 - создает модель с минграцией и т.д.
```
php artisan make:model Article -m
```
// youtube.com/watch?v=yUd8mAE6UuM&list=PLd2_Os8Cj3t8pnG4ubQemoqnTwf0VFEtU&index=14
// youtube.com/watch?v=Oe1HT_OAEyg&list=PLtHO7nOKfHGaWhgndBeHQFm6bYZ7ROuVe&index=2

### 10 
```
composer require laravel/ui
php artisan ui bootstrap
php artisan ui:auth
```
### 11
```
show databases;
SHOW TABLES FROM daza_name;
SELECT * FROM daza_name.users;
SELECT * FROM daza_name.migrations;
DROP TABLE tz_lara.posts;
```
### 12
```
php artisan make:model Post -m
php artisan make:model Category -m
php artisan make:model Tag -m
php artisan make:model PostTag -m

php artisan migrate
php artisan make:controller Main/IndexController
```

### 12.5
```
chown -R otolaa:otolaa database/migrations
chown -R otolaa:otolaa app/Http/Requests
```

### 
```
php artisan make:middleware AdminMiddleware

php artisan migrate:rollback
php artisan migrate
```
