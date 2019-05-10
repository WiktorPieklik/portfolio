<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 13/04/2019
 * Time: 11:38
 */

class DB_Connect
{
    private $connection;

    public function connect()
    {
        require_once  'config.php';
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        return $this->connection;
    }
}