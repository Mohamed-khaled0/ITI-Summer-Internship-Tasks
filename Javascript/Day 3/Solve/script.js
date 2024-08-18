function addTask() {
    // Get the input value
    let taskInput = document.getElementById('taskInput');
    let taskText = taskInput.value;

    if (taskText.trim() !== '') {
        let taskElement = document.createElement('div');
        taskElement.classList.add('task');
        
        taskElement.insertAdjacentHTML('afterbegin', `<span>${taskText}</span><button onclick="deleteTask(this)">Delete</button>`);
        
        let taskList = document.getElementById('taskList');
        taskList.insertAdjacentElement('beforeend', taskElement);
        
        taskInput.value = '';
    }
}

function deleteTask(button) {
    let taskElement = button.parentElement;
    taskElement.remove();
}
