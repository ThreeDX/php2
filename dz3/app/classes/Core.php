<?php

// Выполняет роль посредника между окружением и контроллером
class Core {
    private static $_instance;
    
    protected function __construct() {}
    
    public static function instance() {
        // Подключаем необходимые библиотеки и базу
        if(self::$_instance == null) {
            require_once __DIR__.'/../Config.php';
            self::$_instance = new Core();
        }
        return self::$_instance;
    }
    
    public function Call($page = 'Index', $params = array()) {
        // Вызываем контроллер
        $controller = Controller::Get($page);
        if($controller)
            echo $controller->Show(isset($params['action']) ? $params['action'] : 'index', $params); //Вызываем у него метод Show, туда спускаем действие и параметры $_GET и $_POST (внутри $_REQUEST)
    }
}
