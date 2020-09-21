# Laravel Shift Styles

This package allows you to quickly run the [Laravel Shift](https://laravelshift.com/) linter commands locally using `php artisan shift`.

Using [PHP CS Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer) and a ruleset created by [Laravel Shift](https://laravelshift.com/), this makes linting your Laravel project simple and adhere to "The Laravel Way".

Your can find the official ruleset used in this package in [this gist](https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200).

## Installation
You can install the ruleset via composer using the following command:

```sh
composer require --dev labelworx/shift-styles
```

## Setup
This command will require a `.php_cs.dist` configuration file for [PHP CS Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer) to be available in your project root directory.  

You can create this file using the command.

```sh
php artisan shift:setup
```
 
This file contains the default Laravel folder structure.  These are the folders that will be scanned by [PHP CS Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer). You will need to add additional paths to this file if your project structure is different from that listed below.

A typical Laravel Project includes these directories:

```php
<?php

$finder = PhpCsFixer\Finder::create()
  ->in([
    __DIR__ . '/app',
    __DIR__ . '/config',
    __DIR__ . '/database',
    __DIR__ . '/resources',
    __DIR__ . '/routes',
    __DIR__ . '/tests',
  ]);

return Labelworx\styles($finder);
```

PHP CS Fixer uses a cache file to speed up usage.  You are recommended that to add the `.php_cs.cache` to you `.gitignore` file.

## Usage
To run and fix files -

```sh
php artisan shift
```

## Resources

- Sharing PHP-CS-Fixer rules across projects and teams. [Laravel News Article](https://laravel-news.com/sharing-php-cs-fixer-rules-across-projects-and-teams)
- Laravel Shift Recommended Coding Ruleset. [Gist](https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200) - [Shift](https://laravelshift.com/)