<?php
require_once('DBconnect.php');

if(isset($_POST['product_id'])){
	$product_code = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$loc = $_POST['loc'];
	$product_image = "pic/" . $product_image;
	$sql = " INSERT INTO package VALUES( '$product_code', '$product_name', '$product_price', '$product_image','$loc', '') ";
	
	$result = mysqli_query($connection, $sql);
    $product_type = $product_code[0];
     // Determine product table name based on product type
        $product_table = [  //dictonary
            'a' => 'activity', //key(code) : value(table name)
            'p' => 'premade',
            't' => 'tourGuide',
            'h' => 'hotel',
            'c' => 'carRental'
        ];

    $product = $product_table[$product_type];

	if ($product=='premade'){
		$nights = $_POST['nights'];
		$sql =" INSERT INTO $product VALUES( '$product_code','$nights') ";
	}elseif($product=='carRental'){
		$car_model = $_POST['car_model'];
		$sql =" INSERT INTO $product VALUES( '$product_code','$car_model') ";
	}else{
		$sql =" INSERT INTO $product VALUES( '$product_code') ";
	}
	$result = mysqli_query($connection, $sql);
	if ($result){
		echo "Inserted successfully";
	}else{
		echo "Insertion Failed";
	}
}

?>