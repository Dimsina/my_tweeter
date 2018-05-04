<?php

class DB
{
   static protected $instance = NULL;
    protected $stmt;

    public function __clone() {}

    protected function getInstance()
    {
        if (self::$instance === null)
            {
                self::$instance = new PDO('mysql:host=localhost;dbname=common-database', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        return self::$instance;
    }
    public function query($query)
    {
        $this->stmt = $this->getInstance()->prepare($query);
    }
    public function bind($parameter, $value, $type = NULL)
    {
        if (is_null($type))
        {
            switch (true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }
    public function execute()
    {
        $this->stmt->execute();
    }
    public function fetch_all()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function last_id()
    {
        return $this->getInstance()->lastInsertId();
    }
}