<?php

namespace Classes;

class Conexao {
    public static function getConexao() {
        try {
            $con = new \PDO("sqlite:sqlite/site.db");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        
        return $con;
    }
}
