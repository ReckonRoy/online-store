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
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
<!----------------------------------------------Container Div--------------------------------------------------------------->
        <div id="container">
            <!-- header section-->
            <header id="header">
                
                <!-- div contains hero image and search bar-->
                <div>
                    <div>
                        
                    </div>
                    
                    <!-- search bar div-->
                    <div id="search_div">
                        <form action="search.php" method="post">
                            <select name="type" id="select">
                                <option value="category">CATEGORY</option>
                                <option value="product_name">PRODUCT NAME</option>
                            </select>
                            <input type="text" placeholder="Type here to search products..." name="search" id="search">
                            <input type="submit" value="search" id="search_btn">
                        </form>
                    </div>
                    <!-- close search bar div-->
                    
                    <div id="cart">
                        <div id="content">
                            <div id="cart_icon"></div>
                            <div id="cart_quantity">5</div>
                            <div id="cart_total">total R1,200</div>
                        </div>
                    </div>
                </div>    
                
                <!-- Nav -->
                <nav id="nav">
                    <ul id="nav_li">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="login.html">Sign In</a></li>
                    </ul>
                </nav>
            </header>
<!----------------------------------------------End header section----------------------------------------------------------->
<!----------------------------------------------Section section ------------------------------------------------------------->
            <section id="section">
                <!-- This article uses grid layout this is where the products are displayed. for this section we make use of vue.js-->
                
                <article class="products" v-if='product_info.length'>
                    
                    <div class="product" id="product" v-for='element in product_info'>
                        <div id="pr_img" class="img-hover-zoom">
                            <!--<img src="img/plasma.png" alt="">-->
                            <img v-bind:src='element.image'>
                        </div>
                        <div id="pr_name">
                            {{element.product_name}}
                        </div>
                        <div id="pr_title">
                            <a href="product.php">{{element.pr_description}}</a>
                        </div>
                        <div id="pr_price">
                            {{element.product_price}}
                        </div>
                    </div>
                    </article> 
                   
                <p v-else>{{error_msg}}</p>
            </section>
<!---------------------------------------------End section ------------------------------------------------------------------->
            <!-- This aside contains product related content i.e, view cart, empty cart, checkout products in cart, delete cart-->
            <div class="aside">
            <?php 
                if(isset($_SESSION['name']) && isset($_SESSION['surname']))
                {
            ?>
                <div>
                    <img src="img/profile.png" alt="profile"/>
                </div>
                <div>
                  <h2>Welcome!</h2>
                  <h3><?php echo $_SESSION['name']." ".$_SESSION['surname']; ?></h3>
                </div>
                <div>
                    <div><button id="logout_btn" onclick='logout()'>LOG OUT</button></div>
                </div>
                    <?php
                }else{
                ?>
                <form action="accountLogin.php" method="POST">
                <div class="loginField">
                    <input type="text" name="username" placeholder="Username..." id="username">
                </div>

                <div class="loginField">
                    <input type="password" name="password" placeholder="Password..." id="password">
                </div>

                <div id="btn_l_field">
                    <input type="button" value="LOGIN" id="login_btn" onclick="request()">
                </div>
                <div id="misc">
                    <center><p>Don't have an account? <span><a href="register.html">Sign Up</a></span></p></center>
                    <center><p><a href="recovery.php">Forgot your password?</a></p></center>
                </div>
                </form>
            <?php
                }
            ?>
            
        </div>
            
        <div class="clrf"></div>
        </div>

        <script type="text/javascript" src="script/vue.js"></script>
        <script type="text/javascript" src="script/login.js"></script>
        <script type="text/javascript" src="script/products.js"></script>
        <script type="text/javascript" src="script/logout.js"></script>
    </body>
</html>
