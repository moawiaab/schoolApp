<?php

namespace RF_MO\LIB\Database;


abstract class Database
{
    private function __construct(){}

    abstract protected static function init();

    abstract protected static function getInstance();

    public static function factory()
    {
            return PDOdatabase::getInstance();
    }

}
