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

//modal
// Sélectionnez tous les boutons de suppression
var deleteButtons = document.querySelectorAll('.delete-btn');

// Ajoutez un écouteur d'événements à chaque bouton
deleteButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var targetModalId = button.getAttribute('data-bs-target');
        var targetModal = new bootstrap.Modal(document.querySelector(targetModalId), {
            keyboard: false
        });
        targetModal.show();
    });
});



