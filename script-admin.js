const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
})

// PAGE modifier ou supprimer un cours

// modal de confirmation : 
document.addEventListener('DOMContentLoaded', (event) => {
    var confirmationModal = document.getElementById('confirmationModal');
    confirmationModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Bouton qui a déclenché le modal
        var trainingId = button.getAttribute('data-training-id'); // Récupère l'ID du cours
        var courseName = button.getAttribute('data-course-name'); // Récupère le nom du cours
        var form = document.getElementById('deleteForm'); // Trouve le formulaire de suppression
        form.trainingId.value = trainingId; // Met à jour la valeur de l'input caché avec l'ID du cours
        document.getElementById('courseName').textContent = courseName; // Insère le nom du cours dans le modal
    });
});

