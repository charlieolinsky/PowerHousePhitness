<?php

class FinancialReports {
    // need pdf for financial reports 
    // z report, weekly, ytd, monthly subscriptins? Automatic? 

// properties
private $equipmentSales;
private $rentalSales;
private $classSales;
private $membershipSales;
private $TotalSales;


function getEquipmentSales()
{
   
}
function getRentalSales()
{

}
function getClassSales()
{

}
function getMembershipSales()
{

}
function getTotalSales(){

    include_once("../sql/connect.php");

    $sql = sprintf("SELECT SUM(grand_total) FROM order_data");
    
    $result = $mysqli->query($sql);

    $this->totalSales = $result;
}

}
?>