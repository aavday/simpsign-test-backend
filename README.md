# Deploy

## 1. Развернуть базу данных (MySQL)
## 2. Добавить в .env данные для подключения к БД
## 3. Удостовериться, что установлена верная версия PHP (8.1)
## 4. Установить зависимости
```sh
composer install
```
```sh
npm install
```
## 5. Запустить миграции
```sh
php artisan migrate
```
## 6. Просидить БД юзерами
```sh
php artisan db:seed
```
## 7. Запустить тесты
```sh
php artisan test
```
## 8. Запустить локалку
```sh
php artisan serve
```
