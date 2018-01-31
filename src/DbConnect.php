<?

namespace Qwant;

/**
 * Class DbConnect
 * @package Qwant
 * @author  Sergey Malahov
 */
class DbConnect
{
    private static $instances = [];

    private function __construct(array $params)
    {
        try {
            self::$instances[$params['instanceName']] = new \PDO(
                "mysql:host=$params[host];dbname=$params[dbname];charset=utf8",
                "$params[username]",
                "$params[password]"
            );
            self::$instances[$params['instanceName']]->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
             throw new \Exception(__CLASS__ . " $params[instanceName] " . $e->getMessage());
        }
    }

    /**
     * Get instance via instanceName
     *
     * @param array $params
     * @return DbConnect
     */
    public static function getInstance(array $params)
    {
        return self::$instances[$params['instanceName']] ?? self::$instances[$params['instanceName']] = new self($params);
    }
}
