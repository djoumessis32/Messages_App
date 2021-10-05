<?php
    session_start();
    include_once "config.php";
    $sql = "SELECT *    
            FROM messages 
            LEFT JOIN users ON users.unique_id = messages.incoming_msg_id ";
    $r = mysqli_query($conn, $sql);
    if(mysqli_num_rows($r)){
        $row = mysqli_fetch_assoc($r);
        echo $row['msg'];
    }
  
?>