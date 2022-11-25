<?php

   include_once("../sql/connect.php"); 
    
    //$sql ="SELECT SUM(grand_total) FROM order_data";
    $sql ="SELECT SUM(grand_total) AS sum FROM cart";
    $result = mysqli_query($dbconn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $totalSales = $row['sum'];
        echo $totalSales;
    }
    echo "<br>";
    echo $totalSales*.08;
    echo "<br>";
    echo $totalSales*1.08;
    
    echo "<br>";
    $tens = array(10,20,30,40);
    echo $tens[2];







?>