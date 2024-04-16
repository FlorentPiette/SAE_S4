<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = hash('sha256', uniqid(rand(), true));
}
