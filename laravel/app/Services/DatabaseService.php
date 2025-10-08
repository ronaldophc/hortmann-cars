<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use PDO;

class DatabaseService
{
    private $customer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function addConnection()
    {
        Config::set("database.connections.{$this->customer->connection_name}", array(
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => 'laravel-database',
            'port' => '3306',
            'database' => $this->customer->connection_name,
            'username' => 'root',
            'password' => 'secret',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ));

        return $this;
    }

    public function runMigrations()
    {
        Artisan::call('migrate', array('--database' => $this->customer->connection_name, '--force' => true));
    }

    public function runSeeders()
    {
        Artisan::call('db:seed', array('--database' => $this->customer->connection_name, '--force' => true));
    }

    public function refreshDatabase()
    {
        Artisan::call('migrate:refresh', array('--database' => $this->customer->connection_name, '--force' => true));
        return $this;
    }

    public function configureDatabase()
    {
        $this->runMigrations();
        $this->runSeeders();
        return $this;
    }

    public function setAsDefault()
    {
        Config::set('database.default', $this->customer->connection_name);
        return $this;
    }
}
