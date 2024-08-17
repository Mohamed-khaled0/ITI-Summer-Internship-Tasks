function addTask() {
    // Get the input value
    let taskInput = document.getElementById('taskInput');
    let taskText = taskInput.value;

    if (taskText.trim() !== '') {
        // Create a new task element
        let taskElement = document.createElement('div');
        taskElement.classList.add('task');
        
        // Set the HTML of the task element
        taskElement.insertAdjacentHTML('afterbegin', `<span>${taskText}</span><button onclick="deleteTask(this)">Delete</button>`);
        
        // Insert the task element into the task list
        let taskList = document.getElementById('taskList');
        taskList.insertAdjacentElement('beforeend', taskElement);
        
        taskInput.value = '';
    }
}

function deleteTask(button) {
    let taskElement = button.parentElement;
    taskElement.remove();
}
