<?php

class BDD{

protected static $_instance = null;

public static function getConnection(){
    if (is_null(self::$_instance)) {
        $user = 'root';
        $password = '0000';
        self::$_instance = new PDO('mysql:host=localhost;dbname=pooEval', $user, $password);
    }
    return self::$_instance;
    }
}