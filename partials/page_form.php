<section class="section_form_task container">
    <div class="area_title_page">
        <div class="btn_back">
            <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="title_box">
            <h1 class="title_page_h1"><?=(isset($taskData) ? 'Editar' : 'Nova' )?> tarefa</h1>
        </div>
    </div>

    <div class="area_form">
        <form action="update_action.php" method="post">
            <input type="hidden" name="id" value="<?=(isset($taskData) ? $taskData['id'] : '')?>">
            <div class="row_input">
                <label for="Titulo">Titulo</label>
                <input type="text" name="title" placeholder="Título da tarefa" value="<?=(isset($taskData) ? $taskData['title'] : '' )?>" autocomplete="off">
            </div>
            <div class="row_input">
                <label for="Descrição">Descrição</label>
                <input type="text" name="description" placeholder="Descrição da tarefa" value="<?=(isset($taskData) ? $taskData['description'] : '' )?>" autocomplete="off">
            </div>
            <div class="row_input_submit">
                <input type="submit" value="<?=(isset($taskData) ? 'Atualizar' : 'Adicionar')?>">
            </div>
        </form>
    </div>
</section>