<?php 
    session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" href="css/contact.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Home</title>
    </head>
    <body>
<!----------------------------------------------Container Div--------------------------------------------------------------->
        <div id="container">
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> 
            <!-- header section-->
            <div id="t_s_h">
			<div id="w_h_t">
				<p><span id="t_c_header">Online Store</span> We have everything you want!</p>
			</div>
			<div id="right-div">
				<div id="i_t_h"><!-- Inner Top Header -->
					<div id="login" id="login_div" onclick="login()"><img src="img/profile.png" id="account_profile"><span id="acc_log_txt">Login</span></div>
					<div id="cart_icon"><img src="img/cart_icon.jpg" id="c_icon">Cart</div>
					<div id="c_q"><div id="c_i_q">0</div></div>
					
					 <div id="account_det">
                            <div id="logout_div"><!-- log out button goes here -->
                                <button id="logout_btn" onclick='logout()'>LOG OUT</button>
                            </div>
                      </div>
						
				</div>
				<div id="i_b_h"><!-- Inner Bottom Header-->
					 <select name="type" id="select_t">
						<option value="category">CATEGORY</option>
						<option value="product_name">PRODUCT NAME</option>
						
					</select>
					<input type="text" placeholder="Type here to search products..." name="search" id="search_t">
					<input type="submit" value="search" id="search_btn">
				</div>
			</div>
			<div id="clr-f"></div>
			<!-- Nav -->
			<nav id="nav">
				<center>
					<ul id="nav_li">
						<li><a href="index.php">HOME</a></li>
						<li><a href="about.html">ABOUT</a></li>
						<li><a href="contactpage.php">CONTACT</a></li>
					</ul>
				</center>
			</nav>
		</div>
<!----------------------------------------------End header section----------------------------------------------------------->
<!----------------------------------------------Section section ------------------------------------------------------------->
            <section id="section">
                <!-- This article uses grid layout this is where the products are displayed. for this section we make use of vue.js-->
                
                <article class="products" id="products">

                </article> 
            </section>
<!---------------------------------------------End section ------------------------------------------------------------------->
            
            
        <div class="clrf"></div>
        
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
        <!---------------------------------Close register modal--------------------------------->
        <footer>
            
            <div id="f-b-div"><!-- footer content bottom div-->
                <div id="r_c_div"><!-- footer bottom right content div -->
                <h3>Check out my other projects on <em> <a href="#">github:</a></em></h3>
                <ul>
                    <li><a href="https://github.com/ReckonRoy/online-store.git">online-store</a></li>
                    <li><a href="https://github.com/ReckonRoy/todoapp.git">todoapp</a></li>
                    <li><a href="https://github.com/ReckonRoy/HotelApp.git">hotelapp</a></li>
                    <li><a href="https://github.com/ReckonRoy/recipeProject.git">recipe page</a></li>
                    <li><a href="https://github.com/ReckonRoy/tributePage.git">tribute page</a></li>
                </ul>
            </div>
            
            <div class="contact_form">
                    <div id="comment_msg_div">LEAVE US A COMMENT/MESSAGE</div>
                    <form action="contact.php" method="POST">
                        <div id="name_c_div"><input type="text" placeholder="Name..." name="name"></div><div id="email_c_div"><input type="email" placeholder="Email..." name="email"></div>
                        <div id="address_c_div"><input type="text" placeholder="Address..." id="address_c_field" name="address"></div>
                        <div id="message_c_div">
                            <textarea cols="69" rows="7" name="message">
                                
                            </textarea>
                        </div>
                        
                        <div id="button_c_div"><input type="submit" value="Send message"></div>
                    </form>
            </div>
            </div>
			
            <div><center>Copy right 2020</center></div>
        </footer>
            
            
        </div>

        <!-- <script type="text/javascript" src="script/vue.js"></script> -->
        <script type="text/javascript" src="script/login.js"></script>
        <script type="text/javascript" src="script/products.js"></script>
        <script type="text/javascript" src="script/logout.js"></script>
        <script type="text/javascript" src="script/cart.js"></script>
        <script type="text/javascript" src="script/in_cart.js"></script>
        <script type="text/javascript" src="script/cartManager.js"></script>
        <script type="text/javascript" src="script/modal.js"></script>
		<script type="text/javascript" src="script/session.js"></script>
    </body>
</html>
