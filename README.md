## MVC Architectural Pattern

- implements twig as template engine
- implements symfonyRouter
- implements PDO in singletone design pattern (current in use)
- implements MySqli in singletone design pattern (for try it)

## Install

```
composer update
```

`make a database in phpMyAdmin`

`import file : database.sql`

`configure file : config.ini`

## start local php server

 `php -S 0.0.0.0:8080 -t public`

## Try those routes to test the App

- `/`
- `/create`
- `/delete/{id}`
- `/update/{id}`
- `/json`
- `/json/{id}`

 
