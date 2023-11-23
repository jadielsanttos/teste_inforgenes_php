<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$taskID = filter_input(INPUT_GET, 'id');

if(isset($taskID) && !empty($taskID)) {
    $task->delete($taskID);
}

header('location: index.php');
exit;