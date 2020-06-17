<?php
session_start();

require('config.php');

$requestUrl="{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
//parsowanie zapytania z sieci np. http://microbase.pl/ads/add.php
//$_SERVER['HTTP_HOST'] - zwraca nazwę hosta microbase.pl
//$_SERVER['REQUEST_URI'] - zwraca zapytanie /ads/add.php

$bootstrap = new Bootstrap($requestUrl);
//utworzenie obiektu "$bootstrap" na bazie klasy "Bootstrap" z przekazanym parametrem "$requestUrl"
$controller = $bootstrap->createController();
//próba wywołania metody "createControler()" na obiekcie "$bootstrap" dziedziczonej z klasy "Bootstrap"

if ($controller){
    $controller->executeAction();
}
//sprawdzenie czy udało się wywołać metodę i jeżeli tak to wykonanie na niej akcji "executeAction"
