<?php

namespace DBAL;

/**
 * Class SimplifyConnection
 * using for connect to database
 */
final class Connection extends \PDO
{

    /** @var string $dsn
     * connection string
     */
    private string $dsn;

    /** @var array $errors
     * array with connection errors
     */
    private array $errors = [];

    /** @var array $available_providers
     * array of available providers for PDO
     */
    private array $available_providers = [];

    /**
     * __construct
     *
     * @param  array $connection_info
     * @param  string $user
     * default root
     * @param  mixed $password
     * default empty string
     * @return void
     */
    public function __construct(array $connection_info, string $user = "root", string $password = "")
    {
        $this->available_providers = parent::getAvailableDrivers();
        if (count($this->available_providers) > 0) {
            if (!in_array($connection_info['provider'], $this->available_providers)) {
                $this->errors = [
                    404 => "Provider {$connection_info['provider']} not installed in your machine"
                ];
            } else {
                $this->dsn = "{$connection_info['provider']}:host={$connection_info['host']};port={$connection_info['port']};";
                try {
                    parent::__construct($this->dsn, $user, $password);
                } catch (\PDOException $e) {
                    $this->errors = [
                        $e->getCode() => $e->getMessage()
                    ];
                }
            }
        } else {
            $this->errors = [
                404 => "No providers on your machine"
            ];
        }
    }

    /**
     * Get Connection String (DSN)
     * @return string
     */
    public function GetDSN(): string
    {
        return $this->dsn;
    }
    /**
     * Get array with connection errors
     *
     * @return array
     */
    public function GetErrors(): array
    {
        return $this->errors;
    }
    /**
     * Get Available Providers
     *
     * @return array
     */
    public function GetAvailableProviders(): array
    {
        return $this->available_providers;
    }
}
