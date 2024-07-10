<?php

class Database
{ // for create object

    public static $connection;
    // static ekak kiyane project eke one thanak pavichchi karanna puluwa function kiyanne
    public static function setUpConnection(){ 
        //setupconnection kiyanne api hadapu namak
        if (!isset(Database::$connection)) { 
            Database::$connection = new mysqli("localhost", "root", "200303002481@Dn", "renufoods", "3306");
        }
    }

    public static function iud($q){

        Database::setUpConnection();
        Database::$connection->query($q);
    
    }

    public static function search($q){

        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
