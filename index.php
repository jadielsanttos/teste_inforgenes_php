<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;
use App\DB\ConexaoMySQL;

$task = new Task();

$conexao = new ConexaoMySQL();


?>