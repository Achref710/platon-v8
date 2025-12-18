<?php
session_start();

// STOP - Check for any spaces or text before <?php
// Delete any echo, print, or HTML before this line!

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/auth/login');
    exit();
}

// Get form data
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// ONLY these three emails allowed
$users = [
    'chef@platon-restaurant.tn' => [
        'password' => 'chef123',
        'dashboard' => '/chef/dashboard'
    ],
    'serveur@platon-restaurant.tn' => [
        'password' => 'serveur123',
        'dashboard' => '/serveur/dashboard'
    ],
    'gerant@platon-restaurant.tn' => [
        'password' => 'gerant123',
        'dashboard' => '/gerant/dashboard'
    ]
];

// Simple validation
if (empty($email) || empty($password)) {
    header('Location: ' . BASE_URL . '/auth/login?error=Remplissez+tous+les+champs');
    exit();
}

// Check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . '/auth/login?error=Email+invalide');
    exit();
}

// Check if email is in our list
if (!isset($users[$email])) {
    header('Location: ' . BASE_URL . '/auth/login?error=Email+non+autorisé');
    exit();
}

// Check password
if ($password !== $users[$email]['password']) {
    header('Location: ' . BASE_URL . '/auth/login?error=Mot+de+passe+incorrect');
    exit();
}

// SUCCESS! Set session
$_SESSION['user_email'] = $email;
$_SESSION['logged_in'] = true;

// Set role based on email
if (strpos($email, 'chef') !== false) {
    $_SESSION['user_role'] = 'chef';
} elseif (strpos($email, 'serveur') !== false) {
    $_SESSION['user_role'] = 'serveur';
} elseif (strpos($email, 'gerant') !== false) {
    $_SESSION['user_role'] = 'gerant';
}

// REDIRECT - NO OUTPUT BEFORE THIS LINE!
header('Location: ' . BASE_URL . $users[$email]['dashboard']);
exit();
?>