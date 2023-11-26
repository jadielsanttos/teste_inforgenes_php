async function updateTaskStatus(element) {
    const status = element.checked
    const id = parseInt(element.dataset.id)
    const url = `http://localhost/teste_inforgeneses_php/update_task_status_action.php?status=${status}&id=${id}`

    await fetch(url)
}