<?php

$messagecontent = strip_tags(htmlspecialchars($_POST['message_content']));

if (!empty($messagecontent) && !ctype_space($messagecontent)) {

    $groupId = $_POST['group_id'];
    
    session_start();
    $userId = $_SESSION["user_id"];

    require_once('../models/db.php');

    $replaced_message = str_replace("'", "\'", $messagecontent); // ' -> \'

    $sql = "INSERT INTO message (message_content,message_sender_id,message_group_id,message_date) VALUES ('$replaced_message', $userId, $groupId, NOW());";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

}

header("Location: ../views/page-chat.php?id=$groupId");

?>