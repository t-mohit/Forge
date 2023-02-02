<?php 
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'forge');
    define('CHARSET', 'utf8mb4');
    
    if(defined("INITIALIZING_DATABASE"))
    {
        $dbconn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)
             OR die('Could not connect to MySQL: '.mysqli_connect_error());
        
    }
    else
    {
        $dbconn = @mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME)
             OR die('Could not connect to MySQL: '.mysqli_connect_error());
    }
    mysqli_set_charset($dbconn, CHARSET);
    
    