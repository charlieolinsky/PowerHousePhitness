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
    




    // $test = $result['grand_total'];
    // echo $test;

    //echo strval($result);

    // $row = fetch_assoc($result); 
    // $sum = $row['sum'];

    //$sum = $result->fetch_assoc();

//     $stmt = $dbconn->prepare('SELECT SUM(grand_total) AS total_sales FROM order_data');
//     $stmt->execute();

//    $row = $stmt->fetch(PDO::FETCH_ASSOC);
//    $sum = $row['total_sales'];

//    echo $sum;





?>