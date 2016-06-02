# OOPLR
An Object Oriented Programming Login &amp; Registration System Built in PHP

Made by: Stan de Horn, Student

# Version 0.0.1 Aplha
Updates will happen when i get the time

# Documentation

Class Config.php

Config.php is used to get Config data out of a **GLOBAL** Array

```php
<?php

    class Config{

        public static function get($path = null){
            if($path){
                $config = $GLOBALS['config'];
                $path = explode('/', $path);

                foreach($path as $bit){
                    if(isset($config[$bit])){
                        $config = $config[$bit];
                    }
                }

                return $config;
            }

            return false;

        }

    }
```

Class Cookie.php

Cookie.php is used to put, get, delete and to check if a cookie exists

```php
<?php

    class Cookie{

        public static function exists($name){
            return (isset($_COOKIE[$name])) ? true : false;
        }

        public static function get($name){
            return $_COOKIE[$name];
        }

        public static function put($name, $value, $expiry){
            if(setcookie($name, $value, time() + $expiry, '/')){
                return true;
            }
            return false;
        }

        public static function delete($name){
            self::put($name, '', time() - 1);
        }
    }
```

Class DB.php

DB.php is used to interact with the database it has a function to check if a connection has already been made to you don't connect every time you need to interact with the database.

Functions:

getInstance: Check if connection has been made if true don't connect if false connect.

query: this function is used by almost every other function to select, insert, delete and update.

action: this function lets you specify the action you want to use UPDATE, DELETE, INSERT and SELECT you can also enter a where claus. it also uses the query function to complete the action.

get: this function uses the function action to SELECT all from a given table, you can also provide a where claus.

delete: this function Deletes an entry from the database bases on the where claus.

insert: this function Inserts data into a given table, the data you want to insert is given in an array like:
```php
insert('users', [
    'field_name' => 'value',
    'different_field_name' => 'different value'
])
```

