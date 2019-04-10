<?php
namespace ct_api;

class Database
{
    const DB_MST = 'tyanmahou_ctmst';

    static private function getConnection(string $dbName): Connection
    {
        return new Connection($dbName);
    }
    static public function mst(): Connection
    {
        return self::getConnection(self::DB_MST);
    }
}