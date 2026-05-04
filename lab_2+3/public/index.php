<?php
// public/index.php

// 1. Load the database connection (which also starts the session)
require_once '../config/db.php';

// 2. Check if the user is currently logged in
$is_logged_in = isset($_SESSION['user_id']);

// 3. Determine what page the user wants. 
// If they didn't ask for a specific page, default to 'home' if logged in, or 'login' if not.
$page = $_GET['page'] ?? ($is_logged_in ? 'home' : 'login');

// 4. Access Control (Security)
// If they are NOT logged in, and they try to visit a protected page, force them to login.
// We only allow guests to see 'login' and 'register'.
$public_pages = ['login', 'register'];

if (!$is_logged_in && !in_array($page, $public_pages)) {
    $page = 'login';
}

// 5. Route to the correct view file hidden in your resources folder
$view_file = "../app/view/{$page}.php";

// 6. Safely load the file if it exists, otherwise show a 404 error
if (file_exists($view_file)) {
    //require $view_file;
    header("Location: $view_file");
    exit;
} else {
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h1>404 - Page Not Found</h1>";
    echo "<a href='index.php'>Go back home</a>";
    echo "</div>";
}
?>