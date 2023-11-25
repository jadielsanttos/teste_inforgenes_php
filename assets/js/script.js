const btnToggleModalTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item .right_side')
const listCardTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item')
const listModalTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item .modal_card_task')
const btnAddTask = document.querySelector("header .area_header .btn_add_task a")

window.addEventListener('resize', changeValueBtnAddTask)

btnToggleModalTask.forEach((item) => {
    item.addEventListener('click', () => {
        const idModal = item.closest('.card_task_item').getAttribute('data-id')

        listModalTask.forEach((modal) => {

            if(modal.getAttribute('data-id') == idModal) {

                closeModalTask()

                modal.style.display = 'block'

                setTimeout(() => {
                    document.addEventListener('click', closeModalTask)
                }, 300)
            }

        })
        
    })
})

function closeModalTask() {
    listModalTask.forEach((modal) => {
        modal.style.display = 'none'
    })

    document.removeEventListener('click', closeModalTask);
}

function changeValueBtnAddTask() {
    if(innerWidth <= 375) {
        btnAddTask.innerHTML = '<i class="fa-solid fa-plus"></i>'
    }else {
        btnAddTask.innerHTML = 'Nova tarefa'
    }
}

changeValueBtnAddTask()