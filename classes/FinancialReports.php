<?php
   include_once("../include/global_inc.php"); 

   Roles::minAccess(4, "../forms/denied.php");

   $sql ="SELECT SUM(grand_total) AS sum FROM cart";
   $result = mysqli_query($dbconn, $sql);
   while($row = mysqli_fetch_assoc($result))
   {
       $totalSales = $row['sum'];
   }
   
   // get class totals 
   $sql ="SELECT SUM(current_capacity) AS quant FROM classes";
   $resultSum = mysqli_query($dbconn, $sql);
   while($row3 = mysqli_fetch_assoc($resultSum))
   {
    
       $classTotals = $row3['quant']*10;
   }
// get product details
$query = "SELECT PROD_ID, prod_name, prod_price FROM `prod-data`";
$result = $dbconn->query($query);
// get sales 
$query = "SELECT * FROM `cart_items`";
$result2 = $dbconn->query($query);

// get class details
$query = "SELECT CLASS_ID, class_name, current_capacity FROM `classes`";
$resultClasses = $dbconn->query($query);

?>
<html>
    <head>
        <title>
            Z Report
        </title>
        <style type="text/css">
            h1 {
            padding-left: 190px;
            }
        .table {
            border: 1px solid black;
            width: 500px;
        }
        .table-header-cell {
            border-bottom: 1px solid black;
            background-color: silver;
        }
        .cell {
            border-bottom: 1px solid gray;
        }
        .description-cell {
            border-bottom: 1px solid gray;
        }
        </style>
    </head>
    <body style="text-align: center">
        <h1 class="header" style="margin-left: -200px">
            Z Report
        </h1>
        <table class="table" cellspacing="0" style="margin-left: auto; margin-right: auto">
            <thead>
                <tr>
                    <td class="table-header-cell">
                    Sales and Tax Summary
                    </td>
                    <td class="table-header-cell">
                        Daily Sales
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="values">
                    <td class="cell">
                        Total Sales:
                    </td>
                    <td class="description-cell">
                        <?php
                          echo "$" . round(($totalSales + 530 + $classTotals )*1.08, 2);
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Tax:
                    </td>
                    <td class="description-cell">
                    <?php    
                    echo "$" . round(($totalSales + 530 + $classTotals)*.08, 2); 
                    ?>              
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Total Sales:
                    </td>
                    <td class="description-cell">
                        <?php 
                         // +530 from simulating memberships
                         echo "$" . round($totalSales + 530 + $classTotals, 2);
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Debit:
                    </td>
                    <td class="description-cell">
                        <!-- *debit total* -->
                        <?php 
                        echo "$" . round(($totalSales + 530 + $classTotals)*1.08*.7, 2);
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Credit:
                    </td>
                    <td class="description-cell">
                        <!-- credit total* -->
                        <?php 
                        echo "$" . round(($totalSales + 530 + $classTotals)*1.08*.3, 2);
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Discounts:
                    </td>
                    <td class="description-cell">
                        <!-- *total discounts simulated* -->
                        <?php 
                        echo "$" . round($totalSales*.10, 2); 
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Equipment:
                    </td>
                    <td class="description-cell">
                        <!-- *total from equp sales* -->
                        <?php 
                        echo "$" . round($totalSales, 2);
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Classes:
                    </td>
                    <td class="description-cell">
                        <!-- *amount from classes* -->
                        <?php 
                          echo "$" . $classTotals;
                        ?>
                    </td>
                </tr>
                <tr class="values">
                    <td class="cell">
                        Memberships:
                    </td>
                    <td class="description-cell">
                        <!-- *simulated amount from memberships* -->
                        <?php 
                        echo "$530.00"; // this is just to simulate since there are no values in the db
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- table for product detail -->
        <html>
    <head>
    </head>
    <body>

        <h1 class="header" style="margin-left: -200px">
         Sales by Item
        </h1>

        <table class="table" cellspacing="0" style="margin-left: auto; margin-right: auto">
            <thead>
                <tr>
                    <td class="table-header-cell">
                        Item Code
                    </td>
                    <td class="table-header-cell">
                        Item Name
                    </td>
                    <td class="table-header-cell">
                        Price
                    </td>
                    <td class="table-header-cell">
                        Quantity
                    </td>
                    <td class="table-header-cell">
                        Total Amount
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
        while ($rows = $result->fetch_assoc()) {
            $rows2 = $result2->fetch_assoc();
            //var_dump($rows);
            // echo $rows['PROD_ID'];
        ?>
        <div>
          <tbody>
                <tr class="values">
                    <td class="cell">
                    <h5><?php 

                    $ids = array($rows['PROD_ID']);
                    $index = 0;
                    echo $ids[$index];
                    ?></h5>
                    </td>
                    <td class="description-cell">
                    <h5><?php echo $rows['prod_name']; ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php echo $rows['prod_price']; ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php 
                    
                    $sql ="SELECT SUM(quantity) AS quant FROM cart_items WHERE PROD_ID = $ids[$index]";
                    $result3 = mysqli_query($dbconn, $sql);
                    while($row3 = mysqli_fetch_assoc($result3))
                    {
                        echo $row3['quant'];
                    }
                    ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php 
                    $sql ="SELECT SUM(item_cost) AS total FROM cart_items WHERE PROD_ID = $ids[$index]";
                    $result4 = mysqli_query($dbconn, $sql);
                    while($row4 = mysqli_fetch_assoc($result4))
                    {
                        echo $row4['total'];
                    }
                    $index++;
                    ?></h5>
                    </td>
                </tr>
            </tbody>
                        </div>
                </form>
            <?php
        }
            ?>
            </tbody>
        </table>
<!-- Classes -->
<html>
    <head>
    </head>
    <body>
        <h1 class="header" style="margin-left: -200px">
         Classes
        </h1>

        <table class="table" cellspacing="0" style="margin-left: auto; margin-right: auto">
            <thead>
                <tr>
                    <td class="table-header-cell">
                        Class Code
                    </td>
                    <td class="table-header-cell">
                        Class Name
                    </td>
                    <td class="table-header-cell">
                        Occupants
                    </td>
                    <td class="table-header-cell">
                        Cost
                    </td>
                    <td class="table-header-cell">
                        Total Amount
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
        while ($rows = $resultClasses->fetch_assoc()) {
        ?>
        <div>
          <tbody>
                <tr class="values">
                    <td class="cell">
                    <h5><?php 

                    $ids = array($rows['CLASS_ID']);
                    $index = 0;
                    echo $ids[$index];
                    ?></h5>
                    </td>
                    <td class="description-cell">
                    <h5><?php echo $rows['class_name']; ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php echo $rows['current_capacity']; ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php 
                        echo "$10";
                    ?></h5>
                    </td>
                    <td class="cell">
                    <h5><?php 
                    echo $rows['current_capacity']*10;
                    $index++;
                    ?></h5>
                    </td>
                </tr>
            </tbody>
                        </div>
                </form>
            <?php
        }
            ?>
            </tbody>
        </table>
    </body>
</html>