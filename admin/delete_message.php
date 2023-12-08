<?php
include "connection.php";  

if(isset($_POST['id'])) {
    $messageId = $_POST['id'];
    
    $deleteMessage = "DELETE FROM tbl_messages WHERE mess_id = $messageId";
    $result = mysqli_query($conn, $deleteMessage);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
