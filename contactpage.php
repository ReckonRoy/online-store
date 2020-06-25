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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/contact.css" type="text/css">
        <link rel="stylesheet" href="css/contact_mobile.css" media="(max-width: 414px) and (min-width: 100px)"type="text/css">
        <link rel="stylesheet" type="text/css" href="css/contactpage.css" media="(max-width: 1440px) and (min-width: 890px)">
        <link rel="stylesheet" type="text/css" href="css/contactpage_tablet.css" media="(max-width: 890px) and (min-width: 414px)">
        <link rel="stylesheet" href="css/contactpage_mobile.css" media="(max-width: 414px) and (min-width: 100px)" type="text/css">
        
        <title>Contact Us</title>
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
                         </form>
                        </select>
                        <input type="text" placeholder="Type here to search products..." name="search" id="search_t">
                        <input type="submit" value="search" id="search_btn">
                    </div>
                </div>
                <div id="clr-f"></div>
                <!-- Nav -->
                <nav id="nav" class="nav">
                    <center>
                        <ul id="nav_li">
                            <li><a href="index.php">HOME</a></li>
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

    <section id="section">
    <div class="s_h">Feel free to keep intouch and contact us!</div><!-- section header-->
        <article class="map"><!-- article conatins an iframe containing google map-->
            <div class="a_h">Our Location</div><!--article header -->    
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.9213540375868!2d18.508816414793788!3d-33.81434258067124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc5f4874ca9a21%3A0xab6946bfe499eec1!2sBournemouth%20Bend%2C%20Milnerton%20Rural%2C%20Cape%20Town%2C%207441!5e0!3m2!1sen!2sza!4v1592905138968!5m2!1sen!2sza" id="g_m" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </article>
        
        <article class="r_a"><!--right positioned article-->
            <div class="a_h">Contact Information</div><!--article header -->        
            <div class="c_i"><!-- Contact Info div-->
                <ul>
                    <li>Contact: 081 787 4355</li>
                    <li>Email: jongweleroy@yahoo.com</li>
                    <li>Address: Bournemouth Bend, Milnerton Rural, Cape Town, 7441 </li>
                </ul>    
            </div>
            <div class="a_h" id="o_h_h">Office Hours/Working Hours</div><!--article header  o_h -> office hours-->       
            <div class="c_i"><!-- Contact Info div--> 
                <li>Week Days: 8am - 5:39pm</li>    
            </div>

            <div class="a_h" id="p_o_h">Public Holidays</div><!--article header p_o_h -> public office header-->      
            <div class="c_i"><!-- Contact Info div-->
                <li>Week Days: 8am - 12pm</li>    
            </div>
        </article>
        <div></div>
    </section>

<!----------------------------------------------FOOTER--------------------------------->
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
    </body>
</html>
