
<?php
require_once 'crud_bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: skills.php');
    exit;
}

verify_csrf();

// ล้างข้อมูล Session
$_SESSION = [];

// ลบ Session cookie
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// ทำลาย Session
session_destroy();

header('Location: login.php?logged_out=1');
exit;
