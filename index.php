<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location:users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime chat app</header>
            <form action="#" method="POST"  enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="name">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="name">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" placeholder="Enter your Email" required>
                    </div>
                    <div class="field input">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <i class="far fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="name">Select Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                       <input type="submit" value="continue to chat">
                    </div>
            </form>
            <div class="link">Alreday signed up ? <a href="login.php">login now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>