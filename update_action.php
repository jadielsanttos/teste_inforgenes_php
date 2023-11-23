<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$taskID = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');

$task->update($taskID, $title, $description);

