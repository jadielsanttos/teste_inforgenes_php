<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$data = $task->read();

$tasksList = $data['info']

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Listagem de tarefas</title>
</head>
<body>

    <section class="section_main container">
        <div class="area_top">
            <div class="area_title_page">
                <h1 class="title_page_h1">Listagem de tarefas</h1>
            </div>
            <div class="btn_add_task">
                <a href="create.php">Nova tarefa</a>
            </div>
        </div>

        <?php if(isset($tasksList) && !empty($tasksList)): ?>
            <div class="area_tasks_list">
                <?php foreach($tasksList as $task): ?>
                    <div class="card_task_item" data-id="<?=$task['id'];?>">
                        <div class="task_title">
                            <div class="title">
                                <h2><?=$task['title'];?></h2>
                            </div>
                            <div class="btn_open_modal_actions">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="task_description">
                            <p><?=$task['description'];?></p>
                        </div>
                        <div class="modal_card_task" data-id="<?=$task['id'];?>">
                            <div class="modal_item"><a href="update.php?id=<?=$task['id'];?>">Editar</a></div>
                            <div class="modal_item"><a href="delete.php?id=<?=$task['id'];?>" onclick="return confirm('Deseja excluir este item?')">Deletar</a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="area_no_results">
                <span>Não há tarefas no momento, <a href="create.php">criar tarefa</a></span>
            </div>
        <?php endif ?>
    </section>

    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>