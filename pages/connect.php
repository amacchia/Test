<?php
    create_connection();
    
    function create_connection()
    {
        $servername = "localhost";
        $username = "macchiaa8";
        $password = "sleepyhorse";
        $dbname = "macchiaa8";
    
        // Create connection
        $GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($GLOBALS['conn']->connect_error) {
            die("Connection failed: " . $GLOBALS['conn']->connect_error);
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } 
    }
?>    