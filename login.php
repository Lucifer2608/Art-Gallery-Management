<?php
        $user ='root';
        $pass = '';
        $db = 'test';
        
        $link = mysqli_connect("localhost",$user,$pass,$db);
        
        if($link === false)
        {
            die("Error: Could not connect:" .mysqli_connect_error());
        }
        //echo "Connection Established"
    ?>
