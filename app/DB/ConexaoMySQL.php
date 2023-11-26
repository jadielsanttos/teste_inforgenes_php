<?php

namespace App\DB;

session_start();

use PDOException;
use PDO;

class ConexaoMySQL {
    
    /**
     * Nome do banco de dados
     * @var string (DB_NAME)
     */
    const DB_NAME = 'todo_app';

    /**
     * ambiente do banco de dados
     * @var string (DB_HOST)
     */
    const DB_HOST = 'localhost';

    /**
     * Nome do usuario do banco de dados
     * @var string (DB_USER)
     */
    const DB_USER = 'root';

    /**
     * Senha do usuario do banco de dados
     * @var string (DB_PASS)
     */
    const DB_PASS = '';

    private object $db;

    public function __construct() {
        $this->db = $this->getDb();
    }

    /**
     * Método responsável por fazer a conexao com o banco de dados
     * @return PDO
     */
    public function setDb() {
        try {
            return new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
        }catch(PDOException $e) {
            echo "Erro ao conectar com o banco de dados: ".$e->getMessage();
        }
    }

    /**
     * Método responsável por pegar a instância de conexao do PDO
     */
    public function getDb() {
        return $this->setDb();
    }

}