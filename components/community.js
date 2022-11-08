let form = document.getElementById("createCom"); // Форма создания группы
let formArticle = document.getElementById("createArticle"); // Форма создания записи

// Показ формы для создания группы
function openForm() {
    form.style.display = "block";
}

// Закрытие формы
function closeForm() {
    form.style.display = "none";
}

// Показ формы для создания записи группы

function openCreateArticle() {
    formArticle.style.display = "flex";
}

// Закрытие формы
function closeCreateArticle() {
    formArticle.style.display = "none";
}

