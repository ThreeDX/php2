<?php

// Класс конфигурации
class Config {
    public static $db;
    public static $templates;
}

// Временная зона по умолчанию
date_default_timezone_set("Europe/Moscow");

// Работа с БД
Config::$db['user'] = 'root';
Config::$db['password'] = '75315900';
Config::$db['connect'] = "mysql:host=localhost;dbname=gallery;charset=utf8";

// Шаблоны
Config::$templates['dir'] = __DIR__.'/templates/';