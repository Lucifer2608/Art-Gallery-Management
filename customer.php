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
    </body>
    <?php
        require_once "login.php";

        $sql="SELECT * FROM payment,customer WHERE payment.c_id=customer.c_id" ;
    
        if($stmt = mysqli_prepare($link,$sql))
        {
            /*mysqli_stmt_bind_param($stmt,"i",$param_id);
            $param_id=mysqli_real_escape_string($link,$_REQUEST['art_id']);*/
    
            if(mysqli_stmt_execute($stmt))
            {
                $result= mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result)>0)
                {
                    echo "<table>";
                    echo "<tr>";
                        echo "<th>Customer ID</th>";
                        echo "<th>Customer Name</th>";
                        echo "<th>Contact</th>";
                        echo "<th>Address</th>";
                        echo "<th>Payment ID</th>";
                        echo "<th>Date</th>";
                        echo "<th>Art ID</th>";
                        echo "<th>Price</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            echo "<td>" . $row['c_id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            echo "<td>" . $row['addr'] . "</td>";
                            echo "<td>" . $row['p_id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['art_id'] . "</td>";
                            echo "<td>" . $row['amount'] . "</td>";
                           /* if($row['sold']===0)
                            {
                                echo "<td> Available </td>";
                            }
                            else
                            {
                                echo "<td> Solded </td>";
                            }
                            //echo "<td>" . $row['sold'] . "</td>";*/
                        echo "</tr>";
                    }
                    echo "</table>";
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
</html>