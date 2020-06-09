<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
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
        <script type="text/javascript" src="script/cartManager.js"></script>
    </body>
</html>