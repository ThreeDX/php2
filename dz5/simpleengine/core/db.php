<?php
namespace simpleengine\core;

use simpleengine\core\exception\ApplicationException;
use \PDO;

class DB
{
    use Singleton;

    protected $conn;
    protected $config;

    protected function init() {
        $this->config = Application::instance()->get("DB");
    }

    public function getConnection()
    {
        if (is_null($this->conn)) {
            try {
                $this->conn = new PDO(
                    $this->prepareDnsString(),
                    $this->config['DB_USER'],
                    $this->config['DB_PASS']
                );
            } catch (\PDOException $e) {
                throw new ApplicationException("DB connection failed: " . $e->getMessage(), 0601);
            }

            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }

    public function query($sql, $params = [])
    {
        $smtp = $this->getConnection()->prepare($sql);
        $smtp->execute($params);
        return $smtp;
    }

    public function fetchAll($sql, $params = [])
    {
        $smtp = $this->query($sql, $params);
        return $smtp->fetchAll();
    }

    public function fetchOne($sql, $params = [])
    {
        return $this->fetchAll($sql, $params)[0];
    }

    public function fetchObject($sql, $params = [], $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }

    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    protected function prepareDnsString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=UTF8",            
            $this->config['DB_DRIVER'],
            $this->config['DB_HOST'],
            $this->config['DB_NAME']
        );
    }
}