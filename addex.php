<?php
    require_once "login.php";    

    $sql = "INSERT INTO exhibtion(e_id,start_date,end_date,name) VALUES (?,?,?,?)";

    if($stmt= mysqli_prepare($link,$sql))
    {
        mysqli_stmt_bind_param($stmt,"isss",$e_id,$start_date,$end_date,$name);
    
        $e_id = mysqli_real_escape_string($link,$_REQUEST['e_id']);
        $start_date = mysqli_real_escape_string($link,$_REQUEST['start_date']);
        $end_date = mysqli_real_escape_string($link,$_REQUEST['end_date']);
        $name = mysqli_real_escape_string($link,$_REQUEST['name']);
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