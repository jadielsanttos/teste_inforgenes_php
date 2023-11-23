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

    /**
     * Método responsável por listar as tarefas
     * @return array
     */
    public function read() {
        $array = [];

        $query = "SELECT * FROM ".self::TABLE." ORDER BY id DESC";
        $stmt = $this->pdo->getDb()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array['info'] = $stmt->fetchAll();
        }

        return $array;
    }

    /**
     * Método responsável por criar uma nova tarefa
     * @param string (title)
     * @param string (description)
     */
    public function create($title, $description) {
        if($title && $description) {

            $query = "INSERT INTO ".self::TABLE." (title, description) VALUES (?,?)";
            $stmt = $this->pdo->getDb()->prepare($query);
            $stmt->execute(array($title,$description));

            header('location: index.php');
            exit;

        }else {
            header('location: create.php');
            exit;
        }
    }


}