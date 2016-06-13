<?php


namespace Qwant;

/**
 * Class DbConnect
 * @package Qwant
 * @author   Sergey Malahov
 */
class DbConnect
{
    private $connection;
    private static $instances;

    private function __construct(array $params)
    {
        try {
            $this->connection = new \PDO(
                "mysql:host=$params[host];dbname=$params[dbname];charset=utf8",
                $params['username'],
                $params['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die(__CLASS__ . " $params[connectionName] " . $e->getMessage());
        }
    }

    /**
     * Get instance via connectionName
     *
     * @param array $params
     * @return DbConnect
     */
    public static function getInstance(array $params)
    {
        return isset(self::$instances[$params['connectionName']]) ? self::$instances[$params['connectionName']] :
            self::$instances[$params['connectionName']] = new self($params);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}