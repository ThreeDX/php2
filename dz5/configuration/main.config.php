<?php
$configuration = [];

// Настройки окружения
$configuration["ENVIRONMENT"] = "PROD";

// настройки директорий
$configuration["DIR"]["VIEWS"] = $_SERVER["DOCUMENT_ROOT"]."/../simpleengine/views/";

// Настройки БД
$configuration["DB"]["DB_DRIVER"] = "mysql"; // драйвер БД
$configuration["DB"]["DB_HOST"] = "localhost"; // сервер БД
$configuration["DB"]["DB_USER"] = "root"; // логин
$configuration["DB"]["DB_PASS"] = "753159"; // пароль
$configuration["DB"]["DB_NAME"] = "geekshop"; // имя БД

// Настройки роутинга
$configuration["ROUTER"] = [
    "<controller>/<action>" => "/<controller>/<action>"
];


