<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$keys = [
    'username',
    'nama',
    'email',
    'password',
    'foto_profil',
    'id_user',
    'id_role',
    'role_user'
];

foreach ($keys as $key) {
    unset($_SESSION[$key]);
}

unset($_SESSION['userLogin']);

header('Location: ?page=login');
exit;