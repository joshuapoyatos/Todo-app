

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
- Run migrations and seed database
```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

## API
- Retrieve a single task
    - GET /api/todo/{id}
    - Request
        - id - from route
    - Response
        - returns a single task - 200
- Retrieve a list of tasks
    - GET /api/todo
    - Request
        - title - optional - from query
    - Response
        - returns a list of list of tasks - 200
- Add a task
    - POST /api/todo
    - Request
        - from body
            ```
          {
              "title": "Task title",
              "description": "Task description",
              "rank": 1
          }
          ```
    - Response
        - returns the newly created task - 200
- Update a task
    - PUT /api/todo/{id}
    - Request
        - id - from route
        - from body
            ```
          {
              "title": "Task title",
              "description": "Task description",
              "rank": 1
          }
          ```
    - Response
        - returns the updated task - 200
- Delete a task
    - DELETE /api/todo/{id}
    - Request
        - id - from route
    - Response
        - no response - 204
- Reorder tasks
    - POST /api/todo/reorder
    - Request
        - from body
            ```
          [
                {
                  "id": 1, //id of task
                  "rank": 3 //new rank of task
                }, 
                {
                  "id": 2,
                  "rank": 1
                }, 
                {
                   "id": 3,
                   "rank": 2
                 }
          ]
          ```
    - Response
        - returns a list of affected tasks - 200

## Notes
- A Postman collection containing examples of the API requests are found in the samples folder.
