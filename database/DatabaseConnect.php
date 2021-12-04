<?php

class DatabaseConnect
{
    private $host;
    private $user;
    private $pw;
    private $database;


    function __construct($database)
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pw = "root";
        $this->database = $database;
    }


    public function db_connect()
    {
        $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->user, $this->pw) or die("Cannot connect to mySQL.");

        return $db;
    }
}
