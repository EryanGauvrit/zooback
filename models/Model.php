<?php

abstract class Model {
    private static $pdo;

    private static function setBdd(){
        // self::$pdo = new PDO("mysql:host=localhost;dbname=dbanimaux;charset=utf8","root","");
        self::$pdo = new PDO("mysql:host=eryan-portfolio.com;dbname=u381655199_BDDMyZoo;charset=utf8","u381655199_myzooadmin","J3#]=Evtty");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }

    public static function sendJSON($info){
        header("Access-Control-Allow-Origin:*");
        // header("Access-Control-Allow-Origin:http://myzoo.eryan-portfolio.com/");
        header("Content-type: application/json");
        echo json_encode($info);
    }
}