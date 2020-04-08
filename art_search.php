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
        
<?php

    require_once "login.php";

    $sql="SELECT * FROM art_object WHERE art_id = ? " ;

    if($stmt = mysqli_prepare($link,$sql))
    {
        mysqli_stmt_bind_param($stmt,"i",$param_id);
        $param_id=mysqli_real_escape_string($link,$_REQUEST['art_id']);

        if(mysqli_stmt_execute($stmt))
        {
            $result= mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result)>0)
            {
                echo "<table>";
                echo "<tr>";
                    echo "<th>Art ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Artist</th>";
                    echo "<th>Date</th>";
                   // echo "<th>Price</th>";
                    echo "<th>Available</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['art_id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['artist_id'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        //echo "<td>" . $row['price'] . "</td>";
                        if($row['sold']===0)
                        {
                            echo "<td> Available </td>";
                        }
                        else
                        {
                            echo "<td> Solded </td>";
                        }
                        //echo "<td>" . $row['sold'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                $img = $param_id .".jpg"; 
                echo "<img src='images/" . $img . "' alt='error' id='img'>";
                // Free result set
                 mysqli_free_result($result);
            }
            else
            {
                echo "No records matching your query were found.";
            }
        }
    }    
    else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

    mysqli_close($link);
?>
<div  id="footer">
            <p>Copyright © <a href="dbmsproj.rf.gd">dbmsproj.rf.gd</a> All Rights Reserved</p>
        </div>
    </body>
</html>
