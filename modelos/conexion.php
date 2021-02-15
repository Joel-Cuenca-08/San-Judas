<?php

class Conexion{

    private static $instance=null;
    
    private function __construct() {
        try {
            self::$instance = new PDO("mysql:host=localhost:3306;dbname=bdsanjudas;charset=utf8", "root","");
            //$link = new PDO("mysql:host=localhost:3306;dbname=afarfan3_bd_gilda4;charset=utf8","afarfan3_gilda","@Fernando18");  
        } catch (PDOException $e) {
            echo "MySql Connection Error: " . $e->getMessage();
        }
    } 
    public static function conectar()  
    {        
        if(!isset(self::$instance)){ 
            new Conexion();
        }
        return self::$instance; 
    }  
    /*
    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=bdsanjudas","root","");
        $link -> exec("set names utf8");
        return $link;

    }*/
}