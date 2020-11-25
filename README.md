

## Todo-app

A simple Web API application for managing Tasks.

## Stack
- PHP 7.4
- Laravel 8
- mysql
    - username: root
    - password: todopass
    - default database: todo
- nGinx (latest)

## Setup
- Create .env file
```
cp .env.example .env
```
- Create and launch the containers
```
docker-compose up -d
```
- Generate key
```
docker-compose exec app php artisan key:generate
```
- Cache settings
```
docker-compose exec app php artisan config:cache
```
- Create MySQL user
```
docker-compose exec db bash
mysql -u root -p
GRANT ALL ON todo.* TO 'root'@'%' IDENTIFIED BY 'todopass';
FLUSH PRIVILEGES;
EXIT;
```
- Run migrations
```
docker-compose exec app php artisan migrate
```
