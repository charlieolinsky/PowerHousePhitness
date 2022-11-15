<?php



// class testCartClass {
// //properties
//     $so = $_POST['PROD_ID'];
//     $prod_name = $_POST['prod_name'];
//     $prod_desc = $_POST['prod_desc'];
//     $prod_image = $_POST['prod_image'];
//     $prod_price = $_POST['prod_price'];
//     $prod_quantity = $_POST['prod_quantity'];
//     $VENDOR_ID = $_POST['VENDOR_ID'];
//     $prod_date_purchased = $_POST['prod_date_purchased'];
//     $prod_purchase_cost = $_POST['prod_purchase_cost'];

// //methods
// public function _testCartClass($n, $ln, $em, $pass)
// {
//     $this->firstName = $n;
//     $this->lastName = $ln;
//     $this->email = $em;
//     $this->password = $pass;
// }

//get Prod_data
session_start();

if(isset($_POST['addToCart'])){
    print_r($_POST['PROD_ID']);
}

// function getProd(){
//     include_once("../sql/connect.php");
//     $sql = "SELECT * FROM `prod-data`";
//     $result = $dbconn->query($sql);

//     if(mysqli_num_rows($result)>0){
//         return $result;
//     }
// }

?>
