<?php

require __DIR__.'/vendor/autoload.php';

use App\Tasks\Task;

$task = new Task();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Nova tarefas</title>
</head>
<body>

    <section class="section_add_task container">
        <div class="area_title_page">
            <div class="btn_back">
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="title_box">
                <h1 class="title_page_h1">Nova tarefa</h1>
            </div>
        </div>

        <div class="area_form">
            <form method="post">
                <div class="row_input">
                    <label for="Titulo">Titulo</label>
                    <input type="text" name="title" placeholder="Título da tarefa">
                </div>
                <div class="row_input">
                    <label for="Descrição">Descrição</label>
                    <input type="text" name="description" placeholder="Descrição da tarefa">
                </div>
                <div class="row_input_submit">
                    <input type="submit" value="Adicionar">
                </div>
            </form>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>