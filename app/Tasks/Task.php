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
     * Método responsável por buscar dados de uma tarefa específica
     * @param string (id)
     * @return array
     */
    public function findTaskById($id) {
        $array = [];

        $query = "SELECT * FROM ".self::TABLE." WHERE id = :id";
        $stmt = $this->pdo->getDb()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            header('location: index.php');
            exit;
        }

        $array['task'] = $stmt->fetch();

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

    /**
     * Método responsável por atualizar uma tarefa
     * @param string (id)
     * @param string (title)
     * @param string (description)
     */
    public function update($id, $title, $description) {

        if($title && $description) {

            $query = "UPDATE ".self::TABLE." SET title = :title, 
            description = :description WHERE id = :id";
            
            $stmt = $this->pdo->getDb()->prepare($query);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        header('location: update.php?id='.$id);
        exit;

    }

    /**
     * Método responsável por atualizar o status de uma tarefa específica
     * @param boolean (status)
     * @param integer (id)
     */
    public function updateTaskStatus($status, $taskID) {

        if($status && $taskID) {

            $newStatus = '';
            
            switch($status) {
                case 'false':
                    $newStatus = 0;
                    break;
                case 'true':
                    $newStatus = 1;
                    break;
            }

            $query = "UPDATE ".self::TABLE." SET status = :status WHERE id = :id";
            $stmt = $this->pdo->getDb()->prepare($query);
            $stmt->bindValue(':status', $newStatus);
            $stmt->bindValue(':id', $taskID);
            $stmt->execute();
        }
    }

    /**
     * Método responsável por excluir uma tarefa
     * @param string (id)
     */
    public function delete($id) {
        $query = "DELETE FROM ".self::TABLE." WHERE id = :id";
        $stmt = $this->pdo->getDb()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}