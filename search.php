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
require 'config/login.php';

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
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/register.css">
        <link rel="stylesheet" href="css/contact.css" media="(max-width: 1440px) and (min-width: 414px)"type="text/css">
        <link rel="stylesheet" href="css/contact_mobile.css" media="(max-width: 414px) and (min-width: 100px)"type="text/css">
        <link rel="stylesheet" href="css/mobile_main.css" media="(max-width: 414px) and (min-width: 100px)" type="text/css">
        <link rel="stylesheet" href="css/tablet_main.css" media="(max-width: 890px) and (min-width: 414px)" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css" media="(max-width: 1440px) and (min-width: 890px)">
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
                                        <?php 
                                            $p_n = $row_array['product_name'];
                                            echo $row_array['product_name'];
                                        ?>
                                    </div>
                                    <div id="pr_title">
                                        <a href="product.php"><?php echo $row_array['pr_description']; ?></a>
                                    </div>
                                    <div id="pr_price">
                                        <?php echo $row_array['product_price']; ?>
                                    </div>
                                    <div><button id="viewProduct_btn" onclick="go_to_product('<?php echo $p_n;?>');">View Product</button></div>    
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
                                        <?php
                                        echo $row_array['product_name'];
                                        ?>
                                    </div>
                                    <div id="pr_title">
                                        <a href="product.php"><?php echo $row_array['pr_description']; ?></a>
                                    </div>
                                    <div id="pr_price">
                                        <?php echo $row_array['product_price']; ?>
                                    </div>
                                        <div><button id="viewProduct_btn" onclick="go_to_product('<?php echo $p_n;?>');">View Product</button></div>  
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
           <div class="clrf"></div>
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
        
        <script type="text/javascript" src="script/logout.js"></script>
        <script type="text/javascript" src="script/cart.js"></script>
        <script type="text/javascript" src="script/in_cart.js"></script>
        <script type="text/javascript" src="script/cartManager.js"></script>
        <script type="text/javascript" src="script/to_location.js"></script>
    </body>
</html>