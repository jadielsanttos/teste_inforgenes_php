const btnToggleModalTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item .task_title .btn_open_modal_actions')
const listCardTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item')
const listModalTask = document.querySelectorAll('.section_main .area_tasks_list .card_task_item .modal_card_task')

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