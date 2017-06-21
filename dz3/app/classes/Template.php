<?php

// подгружаем и активируем авто-загрузчик Twig-а
require_once __DIR__.'/../Twig/Autoloader.php';
Twig_Autoloader::register();

// Шаблоны
class Template
{
    private $data; // Данные для вывода
    private $twig; // Twig

    private static $instance;

    // Один экземпляр на программу
    public static function instance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Template(Config::$templates['dir']);
        }
        return self::$instance;
    }

    protected function __construct($dir_tmpl) {
        $this->data = array();
        try {
            // инициализируем Twig
            $this->twig = new Twig_Environment(new Twig_Loader_Filesystem($dir_tmpl));

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    // Метод для добавления новых значений в данные для вывода
    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    // Метод для добавления новых значений в данные для вывода
    public function set_array(array $data = array()) {
        foreach($data as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    // Метод для удаления значений из данных для вывода
    public function delete($name) {
        unset($this->data[$name]);
    }

    // При обращении, например, к $this->title будет выводиться $this->data["title"]
    public function __get($name) {
        if (isset($this->data[$name])) return $this->data[$name];
        return null;
    }

    // Перегружаем isset()
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    // Вывод tpl-файла, в который подставляются все данные для вывода
    public function display($template) {
        try {
            // подгружаем шаблон
            $template = $this->twig->loadTemplate($template.'.tpl');

            // передаём в шаблон переменные и значения
            // выводим сформированное содержание
            echo $template->render($this->data);

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}