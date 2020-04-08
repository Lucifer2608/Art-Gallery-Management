<!DOCTYPE html>
    <head>
        <title>Art Gallery Management</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div id="header">
            <img src="images/artgallery-header.png" alt="ART GALLERY MANAGEMENT" width="100%" height="100%">
        </div>
        <div id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="exhibition.html">Exhibition</a></li>
                <li><a href="artist.html">Artists</a></li>
                <li><a href="art_object.html">Art</a></li>
                <li style="float: right"><a href="payment.html">$</a></li>
              </ul>
        </div>
        <div  id="footer">
            <p>Copyright © <a href="dbmsproj.rf.gd">dbmsproj.rf.gd</a> All Rights Reserved</p>
        </div>
    </body>
</html>
<?php
        
        require_once "login.php";    

        $sql="UPDATE art_object SET title=?, artist_id=?, date=? WHERE art_id=?";
    
        if($stmt= mysqli_prepare($link,$sql))
        {
            mysqli_stmt_bind_param($stmt,"sisi",$title,$artist_id,$date,$art_id);
        
                
            $art_id = mysqli_real_escape_string($link,$_REQUEST['art_id']);
            $title = mysqli_real_escape_string($link,$_REQUEST['title']);
            $artist_id = mysqli_real_escape_string($link,$_REQUEST['artist_id']);
            $date = mysqli_real_escape_string($link,$_REQUEST['date']);
    
           if( mysqli_stmt_execute($stmt))
           {
                echo "Records updated successfully";
           }
           else
            {
                echo "Error:" . mysqli_error($link);
            }
            
        }
        else
        {
            echo "Error:Could not prepare query:$sql" . mysqli_error($link);
        }
    
        mysqli_stmt_close($stmt);
    
        mysqli_close($link);
    ?>