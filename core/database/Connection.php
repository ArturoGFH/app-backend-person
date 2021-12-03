<?php

namespace database;

use PDO;
use database\Config;

class Connection extends PDO {

    public function __construct() {
        global $request;
        try {

            parent::__construct("mysql:host=" . Config::HOST . ";dbname=" . Config::DATABASE, Config::USER, Config::PASSWORD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));

            # We can now log any exceptions on Fatal error. 
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

