<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" href="css/contact.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Login</title>
    </head>
    <body>
<!-- This aside contains product related content i.e, view cart, empty cart, checkout products in cart, delete cart-->
            <center><div class="aside">
                <?php
                if(!isset($_SESSION['name'])){
                ?>
                <form action="accountLogin.php" method="POST">
                <div class="loginField">
                    <input type="text" name="username" placeholder="Username..." id="username">
                </div>

                <div class="loginField">
                    <input type="password" name="password" placeholder="Password..." id="password">
                </div>

                <div id="btn_l_field">
                    <button id="login_btn" onclick="request_login()">LOGIN</button>
                    
                </div>
                <div id="misc">
                    <center><p>Don't have an account? <input type="button" id='registerBtn' value="Sign Up" onclick='openRegisterModal()'></p></center>
                    <center><p><a href="recovery.php">Forgot your password?</a></p></center>
                </div>
                </form>
            <?php
                }
            ?>
			
			<!---------------------------------register modal--------------------------------->
        <div id="form">
            <span class="closeBtn">&times;</span>
            <form method="POST" action="register.php">
            
                    <div class="field">
                    <label>Name</label>
                        <br>
                        <input type="text" name="name">
                    </div>

                    <div class="field">
                        <label>Surname</label>
                        <br>
                        <input type="text" name="surname">
                    </div>
                
            
                <div>
                    <div class="field">
                        <label>Username</label>
                        <br>
                        <input type="text" name="username">
                    </div>

                    <div class="field">
                        <label>password</label>
                        <br>
                        <input type="password" name="password">
                    </div>
                </div>
            <div id="email_field">
                <label>Email</label>
                <br>
                <input type="email" name="email">
             </div>
            
            <div id="gender_div">
                <label>Gender</label>
                <br>
                <input type="radio" name="gender" value="female">female
                <input type="radio" name="gender" value="male">male
            </div>
            
            <div id="btn_div"><input type="submit" value="REGISTER NOW"></div>
            
        </form>
        </div>
        </center>
        <!---------------------------------Close register modal--------------------------------->
            <script type="text/javascript" src="script/modal.js"></script>
       
	</body>
</html>