document.addEventListener("DOMContentLoaded", function () {
  const taskInput = document.getElementById("task");
  const addButton = document.getElementById("add");
  const taskList = document.getElementById("taskList");

  // Mengambil tugas dari local storage saat halaman dimuat
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];

  // Menampilkan tugas yang ada di local storage
  tasks.forEach((taskText) => {
    addTask(taskText);
  });

  addButton.addEventListener("click", function () {
    const taskText = taskInput.value.trim();

    if (taskText === "") {
      alert("Tolong isi tugas terlebih dahulu.");
    } else {
      addTask(taskText);
      tasks.push(taskText);
      localStorage.setItem("tasks", JSON.stringify(tasks));
      taskInput.value = "";
    }
  });

  function addTask(text) {
    const listItem = document.createElement("li");
    const taskText = document.createElement("span");
    taskText.textContent = text;

    const editButton = document.createElement("button");
    editButton.textContent = "Edit";
    editButton.className = "edit";
    editButton.addEventListener("click", function () {
      editTask(listItem, taskText);
    });

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.className = "delete";
    deleteButton.addEventListener("click", function () {
      deleteTask(listItem);
    });

    listItem.appendChild(taskText);
    listItem.appendChild(editButton);
    listItem.appendChild(deleteButton);
    taskList.appendChild(listItem);
  }

  function editTask(listItem, taskText) {
    const newText = prompt("Edit task:", taskText.textContent);
    if (newText !== null && newText.trim() !== "") {
      taskText.textContent = newText;
      // Perbarui tugas di local storage
      tasks[tasks.indexOf(taskText.textContent)] = newText;
      localStorage.setItem("tasks", JSON.stringify(tasks));
    }
  }

  function deleteTask(listItem) {
    const deletedTask = listItem.firstChild.textContent;
    listItem.remove();
    // Hapus tugas dari local storage
    tasks.splice(tasks.indexOf(deletedTask), 1);
    localStorage.setItem("tasks", JSON.stringify(tasks));
  }
});
