<?php
// classes/Crud.php

require_once './Config/DbConnection.php';

class Crud extends DbConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function execute($query)
    {
        $result = $this->connection->query($query);

        if ($this->connection->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }

    public function getData($query)
    {
        $result = $this->connection->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function delete($id, $table)
    {
        $id = $this->escape_string($id);

        $query = "DELETE FROM $table WHERE id = $id";

        $result = $this->connection->query($query);

        if ($this->connection->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
?>
