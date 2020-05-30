<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['field']))
{
   if($_POST['field'] == "all")
   {
       echo "I welcome you all";
   }else if($_POST['field'] == "test")
   {
       echo "testing...";
   }
}
?>

<form action="test.php" method="POST">
    <input type="text" name="field">
    <input type="submit" value="send">
</form>