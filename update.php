<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$taskID = filter_input(INPUT_GET, 'id');

$data = $task->findTaskById($taskID);

if(isset($taskID) && !empty($taskID)) {
    $taskData = $data['task'];
}else {
    header('location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?=(isset($taskData) ? 'Editar' : 'Nova')?> tarefa</title>
</head>
<body>
    <!-- header -->
    <?php require __DIR__.'/partials/header.php'; ?>

    <!-- Resto do site -->
    <?php require __DIR__.'/partials/page_form.php'; ?>

    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>