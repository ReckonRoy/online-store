<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/contact.css" type="text/css">
        <link rel="stylesheet" href="css/basket.css" type="text/css">
        <title>Cart</title>
    </head>
    <body>
        <div id="container">
            
            <!-- header section-->
            <header id="header">
                
                <!-- div contains hero image and search bar-->
                <div>
                    <div>
                        
                    </div>
                    
                    <!-- search bar div-->
                    <div id="search_div">
                        <div id="cart">
                        <div id="content">
                             <?php 
                            if(isset($_SESSION['name']) && isset($_SESSION['surname']))
                            {
                            ?>
                            <div id="cart_icon"></div>
                            <div id="cart_quantity"></div>
                            <!-- <div id="cart_total"></div> -->
                            <?php
                            }else{
                            ?>
                            <div id="cart_icon"></div>
                            <div id="cart_quantity2">0</div>
                            <!--<div id="cart_total2">0</div>-->
                             <?php
                            }
                            ?>
                        </div>
                          
                    </div>
                        
                        <div id="search_c_d">
                            <form action="search.php" method="post">
                                <select name="type" id="select">
                                    <option value="category">CATEGORY</option>
                                    <option value="product_name">PRODUCT NAME</option>
                                </select>
                                <input type="text" placeholder="Type here to search products..." name="search" id="search">
                                <input type="submit" value="search" id="search_btn">
                            </form>
                        </div>    
                         <?php 
                        if(isset($_SESSION['name']))
                            { 
                            ?>
                                <div id="profile_img"><img src="img/profile.png" alt="profile"></div>   
                        <?php
                            }
                        ?>
                        <div id="account_det">
                            <div id="u_n_div"><!-- user's name goes here -->
                                <?php 
                                    if(isset($_SESSION['name']))
                                    {
                                        echo $_SESSION['name'];
                                    }
                                ?>
                            </div>
                            
                            <div id="logout_div"><!-- log out button goes here -->
                                <button id="logout_btn" onclick='logout()'>LOG OUT</button>
                            </div>
                        </div>
                    </div>
                    <!-- close search bar div-->
                    
                    
                
                <!-- Nav -->
                <nav id="nav">
                    <center>
                        <ul id="nav_li">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="about.html">ABOUT</a></li>
                            <li><a href="contact.html">CONTACT</a></li>
                        </ul>
                    </center>
                    
                </nav>
            </header>
<!----------------------------------------------End header section----------------------------------------------------------->
            <section id="main">
                <div id="header_div">Shopping Cart</div>
                <article id="products">
                    
                </article>
            </section>
        </div>
        <script type="text/javascript" src="script/basket.js"></script>
        <script type="text/javascript" src="script/deleteItem.js"></script>
        <script type="text/javascript" src="script/logout.js"></script>
        <script type="text/javascript" src="script/cart.js"></script>
        <script type="text/javascript" src="script/in_cart.js"></script>
        <script type="text/javascript" src="script/cartManager.js"></script>
    </body>
</html>