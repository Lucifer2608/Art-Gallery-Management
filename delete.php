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
                <li><a href="exhibition.php">Exhibition</a></li>
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

    $sql = "DELETE FROM artist WHERE artist_id = ?";

    if($stmt = mysqli_prepare($link, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["artist_id"]);
        
        if(mysqli_stmt_execute($stmt))
        {
            echo "Records deleted successfully.";
        } 
        else
        {
            echo "Oops! Something went wrong. Please try again later." . mysqli_error($link);
        }
    }
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);


?>