function toggleNotifications() {
    const burgerMenu = document.getElementById('burgerMenu');

    if (burgerMenu.style.display === 'none') {
        fetchNotifications();
        burgerMenu.style.display = 'block';
    } else {
        burgerMenu.style.display = 'none';
    }
}

function nb() {
    fetch('../Controller/ControlleurNotif.php')
        .then(response => response.json())
        .then(data => {
    const notificationBadge = document.getElementById('notificationBadge');
    if (parseInt(data.nb) >= 1) {
        notificationBadge.classList.add('red-badge');
    } else {
        notificationBadge.classList.remove('red-badge');
    }
})
}

document.addEventListener('DOMContentLoaded', function() {
    fetchNotifications();
    nb();
});

function fetchNotifications() {
    fetch('Controller/ControlleurNotif.php')
        .then(response => response.json())
        .then(data => {
            const unreadNotificationList = document.getElementById('unreadNotificationList');
            unreadNotificationList.innerHTML = '';
            const readNotificationList = document.getElementById('readNotificationList');
            readNotificationList.innerHTML = '';
            const notificationBadge = document.getElementById('notificationBadge');
            notificationBadge.textContent = data.nb;
            const valider = document.getElementById('validationButton')



            data.notif.forEach(notification => {
                const listItem = document.createElement('li');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.checked = notification.lu;
                checkbox.setAttribute('data-notification-id', notification.idnotif);

                listItem.appendChild(checkbox);

                    checkbox.addEventListener('change', function() {
                        const isChecked = this.checked;
                        const params = new URLSearchParams();
                        params.append('idnotif', notification.idnotif);
                        params.append('idetudiant', notification.idetudiant);
                        if (isChecked) {
                                params.append('lu', true);
                                updateNotification(params, listItem, checkbox, 'notification-read');
                        } else {
                            params.append('lu', false);
                            updateNotification(params, listItem, checkbox, '');
                        }
                    });
                valider.addEventListener('click', function() {
                    fermerMenuBurger(data)
                });



                if (notification.nom === null) {
                    listItem.appendChild(document.createTextNode(`Sans entreprise :  Nom: ${notification.em}, Prénom: ${notification.ep}`));
                } else {
                    listItem.appendChild(document.createTextNode(`Pas de réponse : Nom: ${notification.em}, Prénom: ${notification.ep}, Offre: ${notification.om}, Entreprise: ${notification.nom}`));
                }

                if (notification.lu === true) {
                    listItem.classList.add('notification-read');
                    readNotificationList.appendChild(listItem);
                } else {
                    listItem.classList.add('notification-unread');
                    unreadNotificationList.appendChild(listItem);
                }
            });



            showUnreadButton.addEventListener('click', function() {
                unreadNotificationList.style.display = 'block';
                readNotificationList.style.display = 'none';
                document.getElementById('hnonlu').style.display = 'block';
                document.getElementById('hlu').style.display = 'none';
            });

            showReadButton.addEventListener('click', function() {
                unreadNotificationList.style.display = 'none';
                readNotificationList.style.display = 'block';
                document.getElementById('hlu').style.display = 'block';
                document.getElementById('hnonlu').style.display = 'none';
            });
        })
        .catch(error => console.error(error));
}



    function updateNotification(params, listItem, checkbox, className) {
    fetch('UpdateNotification.php', {
        method: 'POST',
        body: params
    })

        .then(response => {
            if (!response.ok) {
                throw new Error('La mise à jour de la notification a échoué');
            }
            listItem.classList = className;
        })
        .catch(error => {
            console.error(error);
            // Gérer l'erreur
        });
}

function fermerMenuBurger(data) {
    // Cacher le menu burger
    var menuBurger = document.getElementById('burgerMenu');
    menuBurger.style.display = 'none';
    fetch('Controller/ControlleurNotif.php')
        .then(response => response.json())
        .then(data => {
            const notificationBadge = document.getElementById('notificationBadge');
            notificationBadge.textContent = data.nb;
        })
}