<?php

class UserManagement
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }
    
    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
    
   public function AddNewUser( //Get data from the form then parse it into the variables below
   
							)
    {
        
	
	$hiddenULID; //Get from session class
	$addy1= $_POST["addy1"];
	$addy2;
	$city;
	
	include_once("../dbconnector/connect.php");
	
	$sql = "INSERT INTO `user_info` (`ULID`, `addy1`, `addy2`, `city`, `state`, `zip`, `country`, `phone1`, `phone2`, `junk1`, `junk2`, `junk3`) 
	VALUES ('".$hiddenULID."', '".$addy1."', '".$addy2."', 'waerawe', 'aweawera', 'rt45', 'sg45', 's45gsg', 'sg454', '0', '0', '0');";
	
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
	mysqli_close($conn);
	
    }   
    
}

class Address extends UserManagement
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
$foo->printPHP();       // Output: 'PHP is great' 
$bar->printItem('baz'); // Output: 'Bar: baz'
$bar->printPHP();       // Output: 'PHP is great'

?>