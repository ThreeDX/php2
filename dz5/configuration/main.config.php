<?php
$configuration = [];

// Настройки окружения
$configuration["ENVIRONMENT"] = "PROD";

// настройки директорий
$configuration["DIR"]["VIEWS"] = $_SERVER["DOCUMENT_ROOT"]."/../simpleengine/views/";

// Настройки БД
$configuration["DB"]["DB_HOST"] = ""; // сервер БД
$configuration["DB"]["DB_USER"] = ""; // логин
$configuration["DB"]["DB_PASS"] = ""; // пароль
$configuration["DB"]["DB_NAME"] = ""; // имя БД

// Настройки роутинга
$configuration["ROUTER"] = [
    "<controller>/<action>" => "<controller>/<action>"
];


