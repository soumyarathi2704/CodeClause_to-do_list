document.getElementById('todo-form').addEventListener('submit', function(event) 
{
    event.preventDefault();
    var taskInput = document.getElementById('task-input');
    var taskList = document.getElementById('task-list');
  
    if (taskInput.value.trim() !== '') {
      var li = document.createElement('li');
      li.innerText = taskInput.value;
      var deleteButton = document.createElement('button');
      deleteButton.innerText = 'Delete';
      deleteButton.addEventListener('click', function() {
        li.parentNode.removeChild(li);
      });
      li.appendChild(deleteButton);
      taskList.appendChild(li);
      taskInput.value = '';
    }
  });
  