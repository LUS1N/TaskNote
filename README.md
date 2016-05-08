# TaskNote

CRUD app for notes in PHP, using Propel ORM, AJAX, and Mustache.js for PHP and JS templating. 

# Installation


1. `composer install`
2. add database connection information in includes/constants.php
3. `vendor/bin/propel sql:build`
4. `vendor/bin/propel model:build`
5. delete composer.json and rename composer.afterPropelSetup.json to composer.json
6. `composer dump-autoload`
7. `vendor/bin/propel config:convert`
8. Create a database in mySqlAdmin with the same name as DATABASE in includes/constants.php
9. `vendor/bin/propel sql:insert`
