<?php
function is_connected ():bool {
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    };
    return !empty($_SESSION['connected']);
}

function verify_authorization ($auth): void {
    if(!$auth) {
        header('Location: /login.php');
        exit();
    };
}