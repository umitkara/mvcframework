<?php

class Database {
    private $dbHandler;
    private $sqlStatement;
    private $error;

    public function __construct()
    {
        // use mysqli instead of pdo
        $this->dbHandler = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->dbHandler->connect_errno) {
            $this->error = $this->dbHandler->connect_error;
            return;
        }
        $this->dbHandler->set_charset("utf8");
    }

    public function query($sql)
    {
        $this->sqlStatement = $this->dbHandler->query($sql);
        if (!$this->sqlStatement) {
            $this->error = $this->dbHandler->error;
            return;
        }
        return $this->sqlStatement;
    }

    public function getError()
    {
        return $this->error;
    }
    // get single row
    public function fetch(): array
    {
        return $this->sqlStatement->fetch_assoc();
    }
    // get multiple rows
    public function fetchArray(): array
    {
        return $this->sqlStatement->fetch_all(MYSQLI_ASSOC);
    }
}

?>