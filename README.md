# Ogłoszenia v.2

W katalogu głóównym wymagany jest plik z konfiguracją `config.php`
```php
<?php

//Define DB Params
define("DB_HOST", "localhost"); //nazwa hosta do połączenia z MySQL
define("DB_USER", "xxxxxx"); //"xxxxxx" nazwa użytkownika do połączenia z MySQL
define("DB_PASS", "xxxxxx"); //"xxxxxx" hasło do połączenia z MqSQL
define("DB_NAME", "ads"); // nazwa bazy dla tego przykładu

//define URL
define("PROTOCOL", "http://");
define("ROOT_DOMAIN", "localhost:8000");
define("ROOT_URL", PROTOCOL.ROOT_DOMAIN);

foreach (glob("app/*.php") as $filename){
    include $filename;
}
foreach (glob("controllers/*.php") as $filename){
    include $filename;
}
foreach (glob("models/*.php") as $filename){
    include $filename;
}
```