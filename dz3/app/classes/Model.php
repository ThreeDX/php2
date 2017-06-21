<?php
// Просто модель
abstract class Model {
    // Свойства модели
    protected $data = array();

    // Возвращает нам свойство
    public function getProperty($key) {
        if(isset($this->data[$key]))
            return $this->data[$key];
        return NULL;
    }

    // Устанавливает свойство
    public function setProperty($key, $value) {
        if(isset($this->data[$key])) {
            $this->data[$key] = $value;
            return true;
        }
        return false;
    }

    // Можно будет обращаться как к свойству класса
    public function __get($key) {
        return $this->getProperty($key);
    }

    // Можно будет обращаться как к свойству класса
    public function __set($key, $value) {
        return $this->setProperty($key, $value);
    }

    // Возвращает все данные модели
    public function getData() {
        return $this->data;
    }

    // Создает сущность
    public static function create(array $data = array()) {
        // Получаем имя текущего класса
        $className = get_called_class();
        $model = new $className();

        // Перебираем массив $data, устанавливаем свойства
        foreach($data as $key => $value) {
            $model->data[$key] = $value;
        }
        return $model;
    }
}
