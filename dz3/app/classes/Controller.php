<?php
// Базовый класс контроллера
abstract class Controller implements IController {
    
    // Возвращает запрошенный в переменной $_GET['page'] контроллер
    public static function Get($controller) {
        $controller = 'Controller'.$controller;

        // Если такой класс подгрузить удалось, возвращаем новый объект контроллера
        if(class_exists($controller))
            return new $controller();

        // Возвращаем ошибку
        return new ControllerError();
    }

    // Выводим содержимое
    public function Output($file, array $vars = array()) {
        $template = Template::instance();
        $template->set_array($vars);
        $template->display($file);
    }

    // Отображает результат
    // $action - определённое действие, переданное из $_GET['action'];
    // $params - массив $_REQUEST
    public function Show($action = 'index', array $params = array()) {
        return '';
    }
}