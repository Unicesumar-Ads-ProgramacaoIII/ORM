<?php

class Connection
{
    private static $instance;

    private function __construct(){}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('sqlite:../../db_jogadores', '', '',  array(PDO::ATTR_PERSISTENT => true));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}