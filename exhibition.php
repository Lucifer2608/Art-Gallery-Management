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

    $sql = "SELECT * FROM exhibtion" ;

    if($stmt = mysqli_prepare($link,$sql))
    {

        if(mysqli_stmt_execute($stmt))
        {
            $result= mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result)>0)
            {
                echo "<table>";
                echo "<tr>";
                    echo "<th>Exhibition ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Start Date</th>";
                    echo "<th>End Date</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['e_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        //echo "<td>" . $row['artist_id'] . "</td>";
                        echo "<td>" . $row['start_date'] . "</td>";
                        echo "<td>" . $row['end_date'] . "</td>";
                        //echo "<td>" . $row['sold'] . "</td>";
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

    //mysqli_close($link);

    $sql = "SELECT * FROM art_in_exhibition" ;

    if($stmt = mysqli_prepare($link,$sql))
    {

        if(mysqli_stmt_execute($stmt))
        {
            $result= mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result)>0)
            {
                echo "<table>";
                echo "<tr>";
                    echo "<th>Exhibition ID</th>";
                    echo "<th>Art ID</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['e_id'] . "</td>";
                        echo "<td>" . $row['art_id'] . "</td>";
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
    echo "<form name='exbition_form' action='addex.php'>";
    echo "Exhibition ID:<input type='text' name='e_id'>";
    echo "Start Date:<input type='date' name='start_date'>";
    echo "End Date:<input type='date' name='end_date'><br>";
    echo "Exhibition Name:<input type='text' name='name'>";
    echo "<input type='submit' value='Add'>";
    echo "</form>";
    echo "<form name='exbition_form' action='addexhi.php'>";
    echo "Exhibition ID:<input type='text' name='e_id'>";
    echo "Art ID:<input type='text' name='art_id'>";
    echo "<input type='submit' value='Add'>";
    echo "</form>";

    ?>
    <div  id="footer">
            <p>Copyright © <a href="dbmsproj.rf.gd">dbmsproj.rf.gd</a> All Rights Reserved</p>
        </div>
        


