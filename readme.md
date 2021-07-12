# zaki-layout-code branch

## Add config.php file to includes with code below

```php

<?php
// DB credentials.
define('DB_HOST', 'YOUR_HOSTNAME');
define('DB_USER', 'YOUR_DB_USERNAME');
define('DB_PASS', 'YOUR_DB_PASS');
define('DB_NAME', 'YOUR_DB_NAME');
// Establish database connection.
try {
  $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
  exit("Error: " . $e->getMessage());
}
```
