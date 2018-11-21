<?php
    class db {
        // Properties
        private $dbhost = '127.0.0.1';
        private $dbuser = 'root';
        private $dbpass = 'hplavg123';
        private $dbname = 'restaurent_db';

        //connect
        public function connect() {
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbconnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbconnection;
        }
    }