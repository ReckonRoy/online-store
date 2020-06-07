<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventory
 *
 * @author Reckon
 */
require 'login.php';

    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if($connection -> connect_error)
    {
        die("Could not connect");
    }
    

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
                            </div>
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
<!----------------------------------------------End header section----------------------------------------------------------->>
<!----------------------------------------------Section section ------------------------------------------------------------->
            <section id="section">
                <!-- This article uses grid layout this is where the products are displayed. for this section we make use of vue.js-->
                
                <article class="products">
                    
                    
                <?php
                
                $inventoryObject = new Search();
        
                if(isset($_POST['search']) && isset($_POST['type']))
                {


                    if(!empty($_POST['search']))
                    {
                        $type_search = $_POST['type'];
                        $search_arg = $_POST['search'];


                        if( $type_search == "category")
                        {
                            $inventoryObject -> searchByCategory($connection, $search_arg);
                        }else if($type_search == "product_name")
                        {
                            $inventoryObject -> searchByProductName($connection, $search_arg);  
                        }
                    }
                }
                
                class Search 
                {               
                    //method searchByCategory queries the database by passing the string parameter
                    public function searchByCategory($conn, $string)
                    {
                        $query = "SELECT product_name, product_price, pr_description, image FROM inventory WHERE category = '".$string."'";
                        $result = $conn -> query($query);
                        if($result)
                        {
                            if($result -> num_rows != 0)
                            {
                                while( $row_array = $result -> fetch_assoc() )
                                {
                                    //$image = '<img src="data:image/jpeg;base64,'.base64_encode( $row_array['image'] ).'"/>';
                                    ?>
                                    <div class="product" id="product">
                                    <div id="pr_img" class="img-hover-zoom">
                                        <!--<img src="img/plasma.png" alt="">-->
                                        <img src="<?php echo $row_array['image']; ?>">
                                    </div>
                                    <div id="pr_name">
                                        <?php echo $row_array['product_name']; ?>
                                    </div>
                                    <div id="pr_title">
                                        <a href="product.php"><?php echo $row_array['pr_description']; ?></a>
                                    </div>
                                    <div id="pr_price">
                                        <?php echo $row_array['product_price']; ?>
                                    </div>
                                    </div>
                                <?php
                                }
                            }else{
                                echo "product not found";
                            }
                        }else{
                            echo "error could not run query";
                        }
                        $result -> close();
                        $conn -> close();
                    }//end method searchByCategory
    
                    public function searchByProductName($conn, $string)
                    {
                        $query = "SELECT product_name, product_price, pr_description, image FROM inventory WHERE product_name = '".$string."'";
                        $result = $conn -> query($query);
                        if($result)
                        {
                            if($result -> num_rows != 0)
                            {
                                while( $row_array = $result -> fetch_assoc() )
                                {
                                    //$image = '<img src="data:image/jpeg;base64,'.base64_encode( $row_array['image'] ).'"/>';
                                    ?>
                                    <div class="product" id="product">
                                    <div id="pr_img" class="img-hover-zoom">
                                        <!--<img src="img/plasma.png" alt="">-->
                                        <img src="<?php echo $row_array['image']; ?>">
                                    </div>
                                    <div id="pr_name">
                                        <?php echo $row_array['product_name']; ?>
                                    </div>
                                    <div id="pr_title">
                                        <a href="product.php"><?php echo $row_array['pr_description']; ?></a>
                                    </div>
                                    <div id="pr_price">
                                        <?php echo $row_array['product_price']; ?>
                                    </div>
                                    </div>
                                <?php
                                }
                            }else{
                                echo "product not found";
                            }
                        }else{
                            echo "error could not run query";
                        }
                        $result -> close();
                        $conn -> close();
                    }//end method searchByProductName
                    
                }   
                ?>    
                </article> 
                   
                
            </section>
<!---------------------------------------------End section ------------------------------------------------------------------->
            <!-- This aside contains product related content i.e, view cart, empty cart, checkout products in cart, delete cart-->
            <div class="aside">
            <form action="accountLogin.php" method="POST">
                <div class="loginField">
                    <input type="text" name="username" placeholder="Username...">
                </div>

                <div class="loginField">
                    <input type="password" name="password" placeholder="Password...">
                </div>

                <div id="btn_l_field">
                    <input type="submit" value="LOGIN">
                </div>
                <div id="misc">
                    <center><p>Don't have an account? <span><a href="register.html">Sign Up</a></span></p></center>
                    <center><p><a href="recovery.php">Forgot your password?</a></p></center>
                </div>
            </form>
        </div>
            
        <div class="clrf"></div>
        </div>
        
        <script type="text/javascript" src="script/logout.js"></script>
        <script type="text/javascript" src="script/cart.js"></script>
        <script type="text/javascript" src="script/in_cart.js"></script>
        <script type="text/javascript" src="script/cartManager.js"></script>
    </body>
</html>