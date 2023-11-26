<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

$base = $task->base;

$data = $task->read();

if(isset($data['info']) && !empty($data['info'])) {
    $tasksList = $data['info'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <title>Listagem de tarefas</title>
</head>
<body>

    <!-- header -->
    <?php require __DIR__.'/partials/header.php'; ?>

    <!-- Resto do site -->
    <section class="section_main container">
        <div class="area_filter">
            <select name="status" onchange="filterTasks(this)">
                <option value="all_tasks">Todas as tarefas</option>
                <?php if(isset($tasksList) && !empty($tasksList)): ?>
                    <option value="done_tasks">Concluídas</option>
                    <option value="pending_tasks">Pendentes</option>
                <?php endif ?>
            </select>
        </div>

        <?php if(isset($tasksList) && !empty($tasksList)): ?>
            <div class="area_tasks_list">
                <?php foreach($tasksList as $task): ?>
                    <div class="card_task_item <?=($task['status'] == 0 ? 'pending_task' : 'done_task')?>" data-id="<?=$task['id'];?>">
                        <div class="left_side">
                            <div class="area_checkbox">
                                <input type="checkbox" name="status" 
                                    data-id="<?=$task['id']?>"
                                    onchange="updateTaskStatus(this)"
                                    <?=($task['status'] == 1 ? 'checked' : '')?>
                                >
                            </div>
                            <div class="title">
                                <h2><?=$task['title'];?></h2>
                            </div>
                        </div>
                        <div class="middle">
                            <div class="circle_status_task <?=($task['status'] == 0 ? 'pending' : 'done')?>"></div>
                            <div class="text_status_task">
                                <p><?=($task['status'] == 0 ? 'Pendente' : 'Concluída')?></p>
                            </div>
                        </div>
                        <div class="right_side">
                            <div class="btn_open_modal_actions">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                        </div>
                        <div class="modal_card_task" data-id="<?=$task['id'];?>">
                            <div class="modal_item"><a href="<?=$base?>/update.php?id=<?=$task['id'];?>">Editar</a></div>
                            <div class="modal_item"><a href="<?=$base?>/delete.php?id=<?=$task['id'];?>" onclick="return confirm('Deseja excluir este item?')">Deletar</a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="area_no_results">
                <span>Não há tarefas no momento, <a href="<?=$base?>/create.php">criar tarefa</a></span>
            </div>
        <?php endif ?>

        <div class="area_no_results_filtered">
            <span>Não há tarefas a serem exibidas aqui...</span>
        </div>
    </section>

    <script>
        const doneTasks = document.querySelectorAll('.done_task')
        const pendingTasks = document.querySelectorAll('.pending_task')
        const areaNoResultFiltered = document.querySelector('.area_no_results_filtered')

        function filterTasks(element) {
           
            if(element.value == 'done_tasks') {
                showAllTasks()

                verifyCountTasks(doneTasks)

                pendingTasks.forEach((item) => {
                    item.style.display = 'none'
                })
            }else if(element.value == 'pending_tasks') {
                showAllTasks()

                verifyCountTasks(pendingTasks)

                doneTasks.forEach((item) => {
                    item.style.display = 'none'
                })
            }else {
                showAllTasks()

                areaNoResultFiltered.style.display = 'none'
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.card_task_item').forEach((item) => {
                item.style.display = 'flex'
            })
        }

        function verifyCountTasks(tasks) {
            if(tasks.length == 0) {
                areaNoResultFiltered.style.display = 'block'
            }else {
                areaNoResultFiltered.style.display = 'none'
            }
        }
    </script>        

    <script src="<?=$base?>/assets/js/request.js"></script>
    <script src="<?=$base?>/assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>