<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="asserts/css/Cloche.css">
    <title>Notifications</title>
</head>
<body>

<div class="notification">
    <div class="icon-bell" onclick="toggleNotifications()">
        <span class="badge" id="notificationBadge"> </span>
    </div>
</div>
<div class="burger-menu" id="burgerMenu" style="display: none;">
    <div class="millieu">
        <button id="showUnreadButton">Notifications non lues</button>
        <button id="showReadButton">Notifications lues</button>
    </div>

    <div>
        <h2 id="hnonlu">Notifications non lues</h2>
        <ul id="unreadNotificationList"></ul>
    </div>
    <div>
        <h2 id="hlu">Notifications lues</h2>
        <ul id="readNotificationList"></ul>
    </div>
    <button id="validationButton" ">Valider</button>


</div>

<script src="asserts/js/script.js"></script>
</body>
</html>
