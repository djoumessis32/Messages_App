<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime chat app</header>
            <form action="#" autocomplete="off">
                <div class="error-txt">this is and error message</div>
                    <div class="field input">
                        <label for="name">Email Address</label>
                        <input type="text" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="field input">
                        <label for="name">Password</label>
                        <input type="password" name = "password" placeholder="Enter your password">
                        <i class="far fa-eye"></i>
                    </div>
                    <div class="field button">
                       <input type="submit" value="continue to chat">
                    </div>
            </form>
            <div class="link">Not yet signed up ? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>