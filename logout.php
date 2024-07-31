<?php
session_start();

// Get the referring URL
$referrer = $_SERVER['HTTP_REFERER'];

// Destroy all sessions
session_destroy();

// Redirect to the referring URL
header('Location: ' . $referrer);
exit;
?>