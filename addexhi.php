<?php
    require_once "login.php";    

    $sql = "INSERT INTO art_in_exhibition(e_id,art_id) VALUES (?,?)";

    if($stmt= mysqli_prepare($link,$sql))
    {
        mysqli_stmt_bind_param($stmt,"ii",$e_id,$art_id);
    
            
        $art_id = mysqli_real_escape_string($link,$_REQUEST['art_id']);
        $e_id = mysqli_real_escape_string($link,$_REQUEST['e_id']);
       if( mysqli_stmt_execute($stmt))
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
    if(!mysqli_error($link))
    {
    header("Location: exhibition.php");
    }
    mysqli_close($link);
    
?>