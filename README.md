# [PLEASURE GIFT]

## Required

- PHP >= 7.3
- MySQL 5.7.x
- NodeJS & npm (for compile js & css)

## Architecture Overview

### Packaging Rules

List components in source code and explain it.

Example:

```
.
├── app - contains the core code
│             ├── Console - contains all of the custom commands
│             ├── Exceptions -
│             ├── Http
│             │             ├── Controllers -
│             │             │             └── Api -
│             │             └── Middleware -
│             ├── Models - contains all of entities.
│             ├── Providers -
│             ├── Repositories -
│             ├── Services -
│             └── Usecases -
├── docs - contains all of documents explain about system or source code
├── routes - contains all of the route definitions for application
├── storage
│             └── logs - Logging
└── tests
    ├── Feature
    └── Unit - Unit test

```

※ To take above value, use below command:

```bash
tree -d -I "vendor" # -d get only diretory, -I igonre pattern "vendor"
```

### Create packages

Guilde to generate packages for projects

Example:

- Generate models

```bash
php artisan make:model User
```
## Rules
Define rules for steps of process as naming convention, filename convention...
Can split separate file, link to it
### Designs

### Database

### API

### Logging
[Logging Design](./docs/logging.md)

### Auth

### Cache Design

### Coding
※ Convnetion url, route, controller, function  name
| METHOD |URL                  | ROUTE NAME    |CONTROLLER & FUNCTION NAME  |SCREEN        |
|--------|---------------------|---------------|----------------------------|--------------|
| GET    | photos              | photos.index  | PhotoController@index      | list         |
| GET    | photos/show/{id}    | photos.show   | PhotoController@show       | detail       |
| GET    | photos/create       | photos.create | PhotoController@create     | create       |
| POST   | photos/store        | photos.store  | PhotoController@store      | submit create|
| GET    | photos/edit/{id}    | photos.edit   | PhotoController@edit       | edit         |
| POST   | photos/update/{id}  | photos.update | PhotoController@update     | submit edit  |
| GET    | photos/delete/{id}  | photos.delete | PhotoController@delete     | delete       |

-----Xử lý khác phương thức get post tùy chọn cho hợp lý----

VD:
| METHOD |url| ROUTE NAME|CONTROLLER & FUNCTION NAME|SCREEN|
|---|---|---|---|---|
| GET|photos/{id}/update-status| photos.update_status | PhotoController@updateStatus|update status|

-----Param khác truyền bình thường----

VD: màn list có search: photos?search=value&page=2&per_page=10
...

### Git flow
- Tạo nhánh feature để code chức năng
- Tên nhánh sẽ có format:
```console
feat/{chức năng}
```
- Mỗi task backlog sẽ tạo 1 nhánh feature
- Trường hợp các task có liên quan đến nhau thì tạo 1 nhánh nhưng commit khác nhau, commit message lúc này bổ sung thêm backlog id

## Get started docker

### Set up `app` 

- Clone repository from git

```console
git clone git@git.hblab.vn:hb3/bael/pleasureGift.git
```

- Run docker

```console
docker-compose up -d
```

- Install dependencies library

```console
docker-compose exec app composer install
docker-compose exec app npm install
```

- Create environment file

```console
cp .env.example .env
```

- Generate application key

```console
docker-compose exec app php artisan key:generate
```

- Update database connection info in environment file

```console
DB_HOST=mysql
DB_PASSWORD=root
```

- Migrate database

```console
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

- Compile js & css

```console
docker-compose exec app npm run dev
```

- Add to your hosts file docker và xampp

```console
127.0.0.1	online-lottery.local
```

- Finish open http://cdvht.com.test/
### Run up app

Go back to `app` directory.

- Run up app:

```console
docker-compose up -d
```

- Run compile js & css real-time if you need

```console
docker-compose exec app npm run watch
```

- Stop app

```console
docker-compose down
```

## DB

Open http://localhost:8080/

## [Thrid-party service]

## Unit test(optional)

## Swagger-document:
- Install plugins with PHP Storm
```
    - Ctrl + Alt + S
    - Go to Plugin
    - Search and install: OpenAPI (Swagger) Editor and Swagger
```
- Create my_openapi in Swagger

## Document page

- Backlog :
- Sonar : 
