<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 * Date: 18.04.2017
 * Time: 13:49
 */

namespace simpleengine\core;

trait Singleton {
    static private $instance = null;

    private function __construct() { $this->init(); }  // Защищаем от создания через new Singleton
    private function __clone() { }  // Защищаем от создания через клонирование
    private function __wakeup() { }  // Защищаем от создания через unserialize

    static public function instance() {
        return
            self::$instance===null
                ? self::$instance = new static()//new self()
                : self::$instance;
    }

    protected function init() {}
}