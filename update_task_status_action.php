<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$status = filter_input(INPUT_GET, 'status');
$taskID = filter_input(INPUT_GET, 'id');

$task->updateTaskStatus($status, $taskID);

