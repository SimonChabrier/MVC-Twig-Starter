## MVC Architectural Pattern

- implements Twig as template engine
- implements symfonyRouter
- implements Http Foundation
- implements symfony Var Dumper
- implements PDO in singletone design pattern (current in use)
- implements MySqli in singletone design pattern (to try it)

## 1/ Install

```
composer update
```

`make a database in phpMyAdmin`

`import file : database.sql`

`configure file : config.ini`

`add extension in VSCode : Live Sass Compiler`

## 2/ start local php server

 `php -S 0.0.0.0:8080 -t public`

## 3/ display App

`http://0.0.0.0:8080`

## 4/ Try those routes to test the App

- `/`
- `/create`
- `/delete/{id}`
- `/update/{id}`
- `/json`
- `/json/{id}`

 
