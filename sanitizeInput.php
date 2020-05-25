<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sanitizeInput
 *
 * @author le-roy
 */
class SanitizeInput 
{
    function sanitize($arg)
    {
        $string_entities = htmlentities($arg);
        $string_slashes = stripslashes($string_entities);
        $string_striptags = strip_tags($string_slashes);
        return $string_striptags;
    }
    
    function mysqlStringLiteral($conn, $arg)
    {
        $string = $conn -> real_escape_string($this -> sanitize($arg));
        return $string;
    }
}
