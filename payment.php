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
                                          
           /* $art_id = mysqli_real_escape_string($link,$_REQUEST['art_id']);
            $sql = "SELECT sold FROM art_object WHERE art_id= $art_id";
            $result=mysqli_query($link,$sql);*/
            
            $sql = "INSERT INTO customer(c_id,name,contact,addr) VALUES (?,?,?,?)";
        
            if($stmt= mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"isds",$c_id,$name,$contact,$addr);
            
                    
                $c_id = mysqli_real_escape_string($link,$_REQUEST['c_id']);
                $name = mysqli_real_escape_string($link,$_REQUEST['name']);
                $contact = mysqli_real_escape_string($link,$_REQUEST['contact']);
                $addr = mysqli_real_escape_string($link,$_REQUEST['addr']);
                $art_id = mysqli_real_escape_string($link,$_REQUEST['art_id']);
        
               if(mysqli_stmt_execute($stmt))
               {
                    echo "Records inserted successfully";
               }
               else
                {
                    echo "Error:Could not prepare query:$sql" . mysqli_error($link);
                }
                
            }
            else
            {
                echo "Error:Could not prepare query:$sql" . mysqli_error($link);
            }
        
            mysqli_stmt_close($stmt);
           
            $sql = "INSERT INTO payment(p_id,date,amount,c_id,art_id) VALUES (?,?,?,?,?)";
        
            if($stmt= mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"isiii",$p_id,$date,$amount,$c_id,$art_id);
            
                    
                $p_id = mysqli_real_escape_string($link,$_REQUEST['p_id']);
                $date = date("Y-m-d");
                $amount = mysqli_real_escape_string($link,$_REQUEST['amount']);
                $c_id = mysqli_real_escape_string($link,$_REQUEST['c_id']);
                $art_id = mysqli_real_escape_string($link,$_REQUEST['art_id']);
        
               if(mysqli_stmt_execute($stmt))
               {
                    echo "<div id=bill>";
                    echo "<p><strong>Customer Id:</strong>" . $c_id . "<p>";
                    echo "<p><strong>Customer Name:</strong>" . $name . "<p>";
                    echo "<p><strong>Contact:</strong>" . $contact ."<p>";
                    echo "<p><strong>Address:</strong>" . $addr . "<p>";
                    echo "<p><strong>Payment:</strong>" . $p_id . "<p>";
                    echo "<p><strong>Date:</strong>" . $date . "<p>";
                    echo "<p><strong>Art ID:</strong>" . $art_id . "<p>";
                    echo "<p><strong>Amount:</strong>" . $amount . "<p>";
                    echo "</div>";
                    echo "Records inserted successfully";
               }
               else
                {
                    echo "Error:Could not prepare query:$sql" . mysqli_error($link);
                }
                
            }
            else
            {
                echo "Error:Could not prepare query:$sql" . mysqli_error($link);
            }
        
            mysqli_stmt_close($stmt);
             
            $sql = "UPDATE art_object SET sold = 1 WHERE art_id=$art_id";
            if(mysqli_query($link, $sql)){
                echo "art object status updated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            mysqli_close($link);
        ?>
        <div  id="footer">
            <p>Copyright © <a href="dbmsproj.rf.gd">dbmsproj.rf.gd</a> All Rights Reserved</p>
        </div> 
    </body>
</html>