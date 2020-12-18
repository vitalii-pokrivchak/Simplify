<?php

namespace ORM\Core;

use ORM\Core\Exceptions\ConnectionException;
use ORM\Core\Exceptions\LogLevel;

class Connection extends \PDO
{

    /**
     * Provider
     *
     * @var string
     */
    private $provider;

    /**
     * Host
     *
     * @var string
     */
    private $host;

    /**
     * Database Name
     *
     * @var string
     */
    private $dbname;

    /**
     * User
     *
     * @var string
     */
    private $user;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Port
     *
     * @var int
     */
    private $port;


    /**
     * __construct
     *
     * @param  array $connection_info
     * @return void
     */
    public function __construct(array $connection_info)
    {
        $this->provider = $connection_info['provider'];
        $this->host = $connection_info['host'];
        $this->dbname = $connection_info['dbname'];
        $this->user = $connection_info['user'];
        $this->password = $connection_info['password'];
        $this->port = $connection_info['port'];
        $dsn = "{$this->provider}:host={$this->host};dbname={$this->dbname};port={$this->port};";
        try {
            parent::__construct($dsn, $this->user, $this->password);
        } catch (\PDOException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), LogLevel::ERROR);
        }
    }
}
