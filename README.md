Для установки проекта необходимо:
1. Переименовать файл .env.example в .env и заполнить поля заполнить поля:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=НАЗВАНИЕ_БД
DB_USERNAME=ИМЯ_ПОЛЬЗОВАТЕЛЯ
DB_PASSWORD=ПАРОЛЬ
2. composer update
3. php artisan migrate
4. php artisan db:seed
5. npm install