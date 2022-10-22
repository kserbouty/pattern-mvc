# MVC & Dependency Injection with PHP

## Installation

### Requirements

- Apache Server >=2.4
- PHP >=8.1
- MySQL >=8.0

### Local Installation

1° Import the database.sql in your environment

2° Set your database in the config.ini

3° Install the autoloader

```bash
composer install && composer dumpautoload -o
```

4° Run your server on <http://localhost:8000>

```bash
php -S localhost:8000 -t public
```

## Authors

Karim Serbouty

## License

[MIT License](/LICENSE.md)
