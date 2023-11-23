<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');

$task->create($title, $description);
