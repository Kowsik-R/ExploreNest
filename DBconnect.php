<?php
	$conn = new mysqli("localhost","root","","ExploreNest");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>