<?php 
    require_once '../models/db.php';
    session_start();

    $usrbio = $_POST['bio'];
    if (strlen($usrbio) >=50) {
        header("Location: ../views/editProfile.php?id=1");
        exit();
    }
    $str = strip_tags(htmlspecialchars($usrbio)); // ' -> ''
    $str = str_replace("'", "''", $str);
    $usrid = $_SESSION['user_id'];

    $sql = "UPDATE users SET user_bio = '$str' WHERE user_id = $usrid";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../views/profile.php");
    exit();
?>