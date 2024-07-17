<?php
class DbConnection
{
    protected $connection;

    public function __construct()
    {
        global $config;

        $this->connection = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
        
        if ($this->connection->connect_error) {
            die('Connection failed: ' . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>
