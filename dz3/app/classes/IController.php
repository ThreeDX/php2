<?php

// Интерфейс контроллера
interface IController {
    public function Show($action, array $params);
    public static function Get($controller);
}
