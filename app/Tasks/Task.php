<?php

namespace App\Tasks;

use App\DB\ConexaoMySQL;

class Task {
    
    /**
     * Nome da tabela do banco de dados
     * @var string (TABLE)
     */
    const TABLE = 'tasks';

    /**
     * Objeto pdo
     * @var object (pdo)
     */
    private object $pdo;

    /**
     * Método responsável por instanciar a classe de conexao com o banco de dados
     */
    public function __construct() {
        $this->pdo = new ConexaoMySQL();
    }

    public function read() {
        $array = [];

        $query = "SELECT * FROM ".self::TABLE." ORDER BY id DESC";
        $stmt = $this->pdo->getDb()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array['data'] = $stmt->fetchAll();
        }

        return $array;
    }


}