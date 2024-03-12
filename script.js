// Gestion AJAX pour les switches de formation
/*Cette ligne trouve tous les éléments HTML ayant la classe toggle-training sur la page. Pour chaque élément trouvé,
il exécute la fonction qui suit, en passant l'élément actuel comme switchElement. */
document.querySelectorAll('.toggle-training').forEach(function (switchElement) {


    switchElement.addEventListener('change', function () {

        /*Pour chaque élément switchElement, cette ligne ajoute un écouteur d'événements qui réagit
        chaque fois que l'état de l'élément change
        (par exemple, lorsqu'un utilisateur bascule un switch de désactivé à activé et vice versa). */
        var userId = this.dataset.userId;
        var trainingId = this.dataset.trainingId;
        var authorizedTraining = this.checked ? 1 : 0;

        /* Ces lignes envoient une requête POST au serveur, à l'adresse spécifiée (controller-update-training-authorization.php).
        La requête contient les données userId, trainingId, et authorizedTraining dans le corps de la requête,
        formatées en application/x-www-form-urlencoded,
        //  ce qui est un format standard pour envoyer des données de formulaire.*/
        fetch('../controllers-admin/controller-update-training-authorization.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'user_id=' + userId + '&training_id=' + trainingId + '&authorized_training=' + authorizedTraining
        })
            /*Une fois que la requête a été envoyée, le code attend une réponse du serveur.
            Si la requête réussit, il tente de convertir la réponse en JSON (avec response.json()),
            puis imprime ces données dans la console du navigateur. Ensuite, il rafraîchit la page avec window.location.reload(),
            ce qui peut être utile pour afficher les changements résultant de la mise à jour des données. */
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Rafraîchir la page ici après une réponse réussie
                window.location.reload();
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour:', error);
                error.response.text().then(function (text) {
                    console.log(text);

                });
            });
    });
})

//theme dark and light 
const themeToggle = document.getElementById('theme-toggle');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        themeToggle.textContent = "Passer au mode clair";
    }
}

themeToggle.addEventListener('click', function () {
    let theme = document.documentElement.getAttribute('data-theme');

    if (theme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        themeToggle.textContent = "Passer au mode sombre";
    } else {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        themeToggle.textContent = "Passer au mode clair";
    }
});
