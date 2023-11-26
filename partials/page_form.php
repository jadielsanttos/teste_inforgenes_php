<section class="section_form_task container">
    <?php if(isset($_SESSION['flash']['error']) && !empty($_SESSION['flash']['error'])): ?>
        <div class="flash error">
            <?=$_SESSION['flash']['error']?>
            <?php $_SESSION['flash']['error'] = ''?>
        </div>
    <?php endif ?>    

    <?php if(isset($_SESSION['flash']['success']) && !empty($_SESSION['flash']['success'])): ?>
        <div class="flash success">
            <?=$_SESSION['flash']['success']?>
            <?php $_SESSION['flash']['success'] = ''?>
        </div>
    <?php endif ?>

    <div class="area_title_page">
        <div class="btn_back">
            <a href="<?=$base?>"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="title_box">
            <h1 class="title_page_h1"><?=(isset($taskData) ? 'Editar' : 'Adicionar' )?></h1>
        </div>
    </div>

    <div class="area_form">
        <form action="<?=(isset($taskData) ? 'update_action.php' : 'create_action.php')?>" method="post">
            <input type="hidden" name="id" value="<?=(isset($taskData) ? $taskData['id'] : '')?>">
            <div class="row_input">
                <label for="Titulo">Titulo</label>
                <input type="text" name="title" placeholder="Título da tarefa" value="<?=(isset($taskData) ? $taskData['title'] : '' )?>" autocomplete="off">
            </div>
            <div class="row_input">
                <label for="Descrição">Descrição</label>
                <textarea name="description" rows="5" placeholder="Descrição da tarefa" autocomplete="off"><?=(isset($taskData) ? $taskData['description'] : '')?></textarea>
            </div>
            <div class="row_input_submit">
                <input type="submit" value="<?=(isset($taskData) ? 'Atualizar' : 'Adicionar')?>">
            </div>
        </form>
    </div>
</section>