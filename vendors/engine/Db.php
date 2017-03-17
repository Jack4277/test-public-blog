<?php


class Db{
    private $result;
    private $connect;
    private static $instance = null;

    public function __construct()
    {
        $config = parse_ini_file('app/configs/db.ini');
        if (!empty($config)) {
            $this->connect = mysqli_connect($config['host'],$config['user'],$config['password'],$config['db']);
        }
        if ($this->connect->connect_errno) {
            echo $this->connect->connect_error;
            exit();
        }

    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql)
    {
        $this->result = mysqli_query($this->connect,$sql);
    }

    public function fetchAll()
    {
        $resultArray = [];
        while ($row = mysqli_fetch_assoc($this->result)) {
            $resultArray[] = $row;
        }

        return $resultArray;
    }

    public function __destruct()
    {
        mysqli_close($this->connect);
    }


    private function __clone(){}
}