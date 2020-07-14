<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" href="css/contact.css" media="(max-width: 1440px) and (min-width: 414px)"type="text/css">
        <link rel="stylesheet" href="css/contact_mobile.css" media="(max-width: 414px) and (min-width: 100px)"type="text/css">
        <link rel="stylesheet" href="css/mobile_header.css" media="(max-width: 414px) and (min-width: 100px)" type="text/css">
        <link rel="stylesheet" href="css/tablet_header.css" media="(max-width: 890px) and (min-width: 414px)" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main_header.css" media="(max-width: 1440px) and (min-width: 890px)">
		<link rel="stylesheet" type="text/css" href="css/gallery.css">
        <title>Home</title>
    </head>
    <body>
        <!----------------------------------------------Container Div--------------------------------------------------------------->
        <div id="container">
            <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> 
            <!-- header section-->
            <div id="t_s_h">
                <div id="right-div">
                    <div id="i_t_h"><!-- Inner Top Header -->
                        <div id="login" id="login_div" onclick="login()"><img src="img/profile.png" id="account_profile"></div>
                        <div id="cart_icon"><img src="img/cart_icon.jpg" id="c_icon">Cart</div>
                        <div id="c_q"><div id="c_i_q">0</div></div>

                        <div id="account_det">
                            <div id="logout_div"><!-- log out button goes here -->
                                <button id="logout_btn" onclick='logout()'>LOG OUT</button>
                            </div>
                        </div>

                    </div>
                    <div id="i_b_h"><!-- Inner Bottom Header-->
                        <form action="search.php" method="post">
                        <select name="type" id="select_t">
                            <option value="category">CATEGORY</option>
                            <option value="product_name">PRODUCT NAME</option>

                        </select>
                        <input type="text" placeholder="Type here to search products..." name="search" id="search_t">
                        <input type="submit" value="search" id="search_btn">
                        </form>
                    </div>
                </div>
                <div id="clr-f"></div>
                <!-- Nav -->
                <nav id="nav" class="nav">
                    <center>
                        <ul id="nav_li">
                            <li><a href="index.php">HOME</a></li>
							<li><a href="gallery.php">GALLERY</a></li>
                            <li><a href="about.html">ABOUT</a></li>
                            <li><a href="contactpage.php">CONTACT</a></li>
                        </ul>
                    </center>

                    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </nav>
            </div>
            <!----------------------------------------------End header section----------------------------------------------------------->
			<!----------------------------------------------START SECTION---------------------------------------------------------------->
			<section>
				<div id="p_f_div"><span id="p_f_h"><center>Products Photo Gallery</center></span>
				<article class="p_f_g" id="p_f_g">
					<div class="p_i_g"><a href="img/car.jpeg"><img src="img/car.jpeg"></a></div>
					<div class="p_i_g"><a href="img/car2.jpg"><img src="img/car2.jpg"></a></div>
					<div class="p_i_g"><a href="img/car3.jpg"><img src="img/car3.jpg"></a></div>
					<div class="p_i_g"><a href="img/car4.jpg"><img src="img/car4.jpg"></a></div>
					<div class="p_i_g"><a href="img/car5.jpg"><img src="img/car5.jpg"></a></div>
					<div class="p_i_g"><a href="img/kettle.jpg"><img src="img/kettle.jpg"></a></div>
					<div class="p_i_g"><a href="img/kettle2.jpg"><img src="img/kettle2.jpg"></a></div>
					<div class="p_i_g"><a href="img/kettle3.jpg"><img src="img/kettle3.jpg"></a></div>
					<div class="p_i_g"><a href="img/kettle4.jpg"><img src="img/kettle4.jpg"></a></div>
					<div class="p_i_g"><a href="img/lamp.jpg"><img src="img/lamp.jpg"></a></div>
					<div class="p_i_g"><a href="img/lamp3.jpg"><img src="img/lamp3.jpg"></a></div>
					<div class="p_i_g"><a href="img/lamp4.jpg"><img src="img/lamp4.jpg"></a></div>
					<div class="p_i_g"><a href="img/plasma.png"><img src="img/plasma.png"></a></div>
					<div class="p_i_g"><a href="img/plasma.jpg"><img src="img/plasma.jpg"></a></div>
					<div class="p_i_g"><a href="img/plasma2.jpg"><img src="img/plasma2.jpg"></a></div>
					<div class="p_i_g"><a href="img/samsung tv model 2x.jpg"><img src="img/samsung tv model 2x.jpg"></a></div>
					<div class="p_i_g"><a href="img/smarttv.jpg"><img src="img/smarttv.jpg"></a></div>
					<div class="p_i_g"><a href="img/smarttv2.jpg"><img src="img/smarttv2.jpg"></a></div>
					<div class="p_i_g"><a href="img/stove2.jpg"><img src="img/stove2.jpg"></a></div>
					<div class="p_i_g"><a href="img/stove3.jpg"><img src="img/stove3.jpg"></a></div>
					<div class="p_i_g"><a href="img/toaster.jpg"><img src="img/toaster.jpg"></a></div>
					<div class="p_i_g"><a href="img/toaster2.jpg"><img src="img/toaster2.jpg"></a></div>
					<div class="p_i_g"><a href="img/twin lamps.jpg"><img src="img/twin lamps.jpg"></a></div>
					<div class="p_i_g"><a href="img/watch 4.jpg"><img src="img/watch 4.jpg"></a></div>
					<div class="p_i_g"><a href="img/watch.jpg"><img src="img/watch.jpg"></a></div>
					<div class="p_i_g"><a href="img/watch2.jpg"><img src="img/watch2.jpg"></a></div>
					<div class="p_i_g"><a href="img/watch3.jpg"><img src="img/watch3.jpg"></a></div>
                </article> 
			</section>
			<!----------------------------------------------END SECTION---------------------------------------------------------------->
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
                                <textarea name="message" id="txt_area">
                                
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
        <script type="text/javascript" src="script/to_location.js"></script>
		<script type="text/javascript" src="script/DOMhelp.js"></script>
		<script type="text/javascript" src="script/gallery.js"></script>
	</body>
</html>
