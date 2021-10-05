<?php
    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users where email = '{$email}'");
            if(mysqli_num_rows($sql)>0){
                echo "$email - email already existe";
            }else{
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_tmp = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extiention = ['png', 'jpeg', 'jpg'];

                    if (in_array($img_ext, $extiention)) {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($img_tmp, "images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            $sql2 = mysqli_query($conn, "INSERT INTO users (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) 
                            VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')" ) ;
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
                                if(mysqli_fetch_row($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }else{
                                echo " probreme ";
                            }

                        }else{
                            echo "o non else moveko";
                        }
                    } else {
                       echo "please select the Image file - jpeg jpg png";
                    }
                    
                } else {
                    echo "please select an image field";
                }
                
            }
        }else{
            echo "the $email fiel is incorrect";
        }
    }else{
        echo "All input field are required !";
    }
?>