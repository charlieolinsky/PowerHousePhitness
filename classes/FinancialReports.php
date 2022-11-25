<?php
   include_once("../include/global_inc.php"); 

   Roles::access(4, "../forms/denied.php");

   $sql ="SELECT SUM(grand_total) AS sum FROM cart";
   $result = mysqli_query($dbconn, $sql);
   while($row = mysqli_fetch_assoc($result))
   {
       $totalSales = $row['sum'];
   }
   
// get product details
$query = "SELECT PROD_ID, prod_name, prod_price FROM `prod-data`";
$result = $dbconn->query($query);
// get sales 
$query = "SELECT * FROM `cart_items`";
$result2 = $dbconn->query($query);


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
        .test-result-table {
            border: 1px solid black;
            width: 500px;
        }
        .test-result-table-header-cell {
            border-bottom: 1px solid black;
            background-color: silver;
        }
        .test-result-step-command-cell {
            border-bottom: 1px solid gray;
        }
        .test-result-step-description-cell {
            border-bottom: 1px solid gray;
        }
        .test-result-step-result-cell-ok {
            border-bottom: 1px solid gray;
            background-color: white;
        }
        .test-result-step-result-cell-failure {
            border-bottom: 1px solid gray;
            background-color: white;
        }
        .test-result-step-result-cell-notperformed {
            border-bottom: 1px solid gray;
            background-color: white;
        }
        .test-result-describe-cell {
            background-color: tan;
            font-style: italic;
        }
        .test-cast-status-box-ok {
            border: 1px solid black;
            float: left;
            margin-right: 10px;
            width: 45px;
            height: 25px;
            background-color: green;
        }
        </style>
    </head>
    <body>
        <h1 class="test-results-header">
            Z Report
        </h1>
        <table class="test-result-table" cellspacing="0">
            <thead>
                <tr>
                    <td class="test-result-table-header-cell">
                    Sales and Tax Summary
                    </td>
                    <td class="test-result-table-header-cell">
                        YTD
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        Total net sales:
                    </td>
                    <td class="test-result-step-description-cell">
                        <?php
                        echo "$" . round($totalSales, 2);
                        ?>
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-alttwo">
                    <td class="test-result-step-command-cell">
                        Tax:
                    </td>
                    <td class="test-result-step-description-cell">
                    <?php    
                    echo "$" . round($totalSales*.08, 2); 
                    ?>              
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        Total Sales:
                    </td>
                    <td class="test-result-step-description-cell">
                        <?php 
                         echo "$" . round($totalSales*1.08, 2);
                        ?>
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        Debit:
                    </td>
                    <td class="test-result-step-description-cell">
                        <!-- *debit total* -->
                        <?php 
                        echo "$" . round($totalSales*.7, 2);
                        ?>
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        Credit:
                    </td>
                    <td class="test-result-step-description-cell">
                        <!-- credit total* -->
                        <?php 
                        echo "$" . round($totalSales*.3, 2);
                        ?>
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        Discounts:
                    </td>
                    <td class="test-result-step-description-cell">
                        <!-- *total discounts* -->
                        <?php 
                        echo "$" . round($totalSales*.10, 2);
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

        <h1 class="test-results-header">
         Sales by Item
        </h1>

        <table class="test-result-table" cellspacing="0">
            <thead>
                <tr>
                    <td class="test-result-table-header-cell">
                        Item Code
                    </td>
                    <td class="test-result-table-header-cell">
                        Item Name
                    </td>
                    <td class="test-result-table-header-cell">
                        Price
                    </td>
                    <td class="test-result-table-header-cell">
                        Quantity
                    </td>
                    <td class="test-result-table-header-cell">
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
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                    <h5><?php 

                    $ids = array($rows['PROD_ID']);
                    $index = 0;
                    echo $ids[$index];
                    ?></h5>
                    </td>
                    <td class="test-result-step-description-cell">
                    <h5><?php echo $rows['prod_name']; ?></h5>
                    </td>
                    <td class="test-result-step-result-cell">
                    <h5><?php echo $rows['prod_price']; ?></h5>
                    </td>
                    <td class="test-result-step-result-cell">
                    <h5><?php 
                    
                    $sql ="SELECT SUM(quantity) AS quant FROM cart_items WHERE PROD_ID = $ids[$index]";
                    $result3 = mysqli_query($dbconn, $sql);
                    while($row3 = mysqli_fetch_assoc($result3))
                    {
                        echo $row3['quant'];
                    }
                    ?></h5>
                    </td>
                    <td class="test-result-step-result-cell">
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
    </body>
</html>
    </body>
</html>
