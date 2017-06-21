<?php

// Автозагрузка классов
function autoloadClasses($class) {
    // Подгружаем остальные классы
    $dirs = array(__DIR__.'/', __DIR__.'/classes/', __DIR__.'/Twig/');
    foreach($dirs as $dir) {
        $file = $dir.$class.'.php';
        if(!is_file($file))
            continue;
        else {
            include_once($file);
            break;
        }
    }
}

spl_autoload_register('autoloadClasses');
