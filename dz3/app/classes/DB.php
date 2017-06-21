<?php
// Спецкласс для данных о выполненном запросе
class QueryResult {
    public $result; // query resource;
    public $affected; //affected rows
    public $id; // last insert id
    public $error = false; // error;

    public function __construct($error, $result=false, $affected=0, $id=0) {
        $this->result = $result;
        $this->affected = $affected;
        $this->id = $id;
        $this->error = $error;
    }
}

// Класс для работы с БД
class DB {
    private $_db;
    private static $instance;

    // Если коннект не удастся, выбросится исключение, которое не ловим
    protected function __construct() {
        try{
            $this->_db = new PDO(Config::$db['connect'], Config::$db['user'], Config::$db['password'], array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Будут предупреждения
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC // По умолчанию формируем ассоциативный массив из данных
            ));
        } catch (PDOException $e) {
            die('DB Connect Failed: ' . $e->getMessage());
        }
    }

    // Отдаем экземпляр класса
    public static function instance()
    {
        if (empty(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    // Получаем сообщение об ошибке
    private function get_error(PDOStatement $sth = null) {
        if ($sth === null)
            return $this->_db->errorInfo()[2];
        else
            return $sth->errorInfo()[2];
    }

    // Запрос к БД
    public function query($query, array $params = array()) {
        // Выполнение запроса
        $sth = $this->_db->prepare($query);
        if ($sth === false)
            return new QueryResult($this->get_error());
        $res = $sth->execute($params); //Выполнить
        if ($res === false)
            return new QueryResult($this->get_error($sth));

        // Создать объект QueryResult с результатами выполнения запроса
        return new QueryResult(false, $sth, $sth->rowCount(),$this->_db->lastInsertId());
    }

    // Получение всех записей из запроса
    public function select_all($query, array $params = array()) {
        $res = $this->query($query, $params);
        if ($res->error === false)
            return $res->result->fetchAll();
        else
            return $res->error;
    }
}