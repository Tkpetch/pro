<?php
    $conn= mysqli_connect("localhost","root","","clothing_store",) 
    or die("Error:". mysqli_error($conn));
    mysqli_query($conn,"SET NAMES 'utf8' ");
?>