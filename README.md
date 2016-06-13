
Jazz framework DbConnect component README
============

**Most popular framework DbConnect component**

## Override

This is a factory based class. Can store multiple instances of connections.
Simple and useful.


## Installation

The preferred way to install this Jazz framework DbConnect component is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require "qwant50/dbconnect"
```

or add

```json
"qwant50/dbconnect": "~1.*.*"
```

to the require section of your composer.json.


##Usage

#### Get instance
```php
$db = DbConnect::getInstance(['connectionName' => 'db1',
                              'host' => '127.0.0.1',
                              'dbname' => 'test',
                              'username' => 'webuser',
                              'password' => 'xxxxxxxx',]);
```

#### Get connection
```php
$db = DbConnect::getInstance(['connectionName' => 'db1',
                              'host' => '127.0.0.1',
                              'dbname' => 'test',
                              'username' => 'webuser',
                              'password' => 'xxxxxxxx',])->getConnection();
```

#### Example to usage

```php
$db = DbConnect::getInstance(['connectionName' => 'db1',
                              'host' => '127.0.0.1',
                              'dbname' => 'test',
                              'username' => 'webuser',
                              'password' => 'xxxxxxxx',])->getConnection();
$stmt = $db->prepare("SELECT * FROM table_name WHERE login = :login");
$stmt->bindParam(':login', $login);
$stmt->execute();
```

