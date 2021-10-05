<?php
     while($rows = mysqli_fetch_assoc($sql)){
        $sql1 =  "SELECT * FROM messages WHERE (incoming_msg_id = {$rows['unique_id']}
                OR outgoing_msg_id = {$rows['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn,$sql1);

        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }
        (strlen($result)>28) ? $msg = substr($result, 0, 28):$msg = $result;
        ($outgoing_id == $row2['outgoing_msg_id'])?$you = "you" : $you =  "";
        ($rows['status'] == "Offline now")? $offline = "#ccc" : $offline = "";
        
        $output .= '
                <a href="chat.php?user_id='.$rows['unique_id'].'">
                    <div class="content">
                        <img src="php/images/'.$rows['img'].'" alt="">
                        <div class="details">
                            <span>'.$rows['fname']." ".$rows['lname'].'</span>
                            <p>'.$you .' ' .$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot" style="color:'.$offline.';" ><i class="fas blue fa-circle"></i></div>
                </a>'; 
    }
?>