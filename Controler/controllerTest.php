<?php

session_start();
ob_start();

if (isset($_SESSION['email'])) {
    echo 'reussis';
} else {
    echo 'Session non trouvée. Veuillez vous connecter d\'abord.';
}

ob_end_flush();


?>