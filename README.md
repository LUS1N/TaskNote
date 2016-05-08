# TaskNote

CRUD app for notes in PHP, using Propel ORM, AJAX, and Mustache.js for PHP and JS templating. 

# Installation


1. `composer install`
2. Add database connection information in includes/constants.php
3. `vendor/bin/propel sql:build`
4. `vendor/bin/propel model:build`
5. Delete `composer.json` and rename `composer.afterPropelSetup.json` to `composer.json`
6. `composer dump-autoload`
7. `vendor/bin/propel config:convert`
8. Create a database with your database managing tool with the same name as DATABASE in includes/constants.php
9. `vendor/bin/propel sql:insert`


# Notes: 
  1. on windows comman line replace `/` to `\`.
  2. if composer is not installed, download composer.phar to the project directory from https://getcomposer.org/download/
