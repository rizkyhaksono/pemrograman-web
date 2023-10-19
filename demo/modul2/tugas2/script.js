document.addEventListener("DOMContentLoaded", function () {
  const taskInput = document.getElementById("task");
  const addButton = document.getElementById("add");
  const taskList = document.getElementById("taskList");

  // Get tasks from local storage when the page loads
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

  // Display tasks from local storage
  tasks.forEach((taskText) => {
    addTask(taskText);
  });

  addButton.addEventListener("click", function () {
    const taskText = taskInput.value.trim();

    if (taskText === "") {
      alert("Please enter a task.");
    } else {
      addTask(taskText);
      tasks.push(taskText);
      localStorage.setItem("tasks", JSON.stringify(tasks));
      taskInput.value = "";
    }
  });

  function addTask(text) {
    const listItem = document.createElement("li");
    listItem.style.display = "flex";
    listItem.style.justifyContent = "start";

    const taskInput = document.createElement("input");
    taskInput.className = "form-control";

    taskInput.disabled = "disabled";
    taskInput.type = "text";
    taskInput.value = text;

    const editButton = document.createElement("button");
    editButton.textContent = "Edit";
    editButton.className = "edit";
    editButton.innerHTML = '<i class="fas fa-edit"></i>';
    editButton.addEventListener("click", function () {
      editTask(taskInput, listItem);
    });

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.className = "delete";
    deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
    deleteButton.addEventListener("click", function () {
      deleteTask(listItem, taskInput.value);
    });

    listItem.appendChild(taskInput);
    listItem.appendChild(editButton);
    listItem.appendChild(deleteButton);
    taskList.appendChild(listItem);
  }

  function editTask(taskInput) {
    taskInput.removeAttribute("readonly");
    taskInput.focus();

    const index = tasks.indexOf(taskInput.value);
    if (index !== -1) {
      const editedText = prompt("Edit task:", taskInput.value);
      if (editedText !== null) {
        taskInput.value = editedText;
        taskInput.setAttribute("readonly", true);
        updateTask(index, editedText);
      }
    }
  }

  function updateTask(index, newText) {
    tasks[index] = newText;
    localStorage.setItem("tasks", JSON.stringify(tasks));
  }

  function deleteTask(listItem, taskText) {
    const index = tasks.indexOf(taskText);
    if (index !== -1) {
      tasks.splice(index, 1);
      localStorage.setItem("tasks", JSON.stringify(tasks));
    }
    listItem.remove();
  }
});
