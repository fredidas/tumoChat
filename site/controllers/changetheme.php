<?php
require_once '../models/db.php';
session_start();
$user_id = $_SESSION['user_id'];
$theme = $_GET['theme'];
$sql="UPDATE USERS
SET user_theme = $theme
WHERE user_id = $user_id";
mysqli_query($conn, $sql);
mysqli_close(($conn));
$_SESSION['user_theme']= $theme;


?> 