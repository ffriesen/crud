<?php
$data = json_decode(file_get_contents("php://input"));

$params = (array) $data->data;
$table = $data->table;

global $conn;
$conn = pg_connect('dbname=belcar_2015 user=postgres password=fel host=localhost port=5432'); 
if (!$conn) { 
//echo "Not connected : " . pg_error(); //Show in error container in GUI
header("Location: /orders/error/");
exit; 
}

$res = pg_delete($conn, 'customers', $params);


$data = [];
$data['success'] = false;
$data['message'] = "Nothing was deleted";
if($res){
	$data['success'] = true;
	$data['message'] = "Successfully deleted customer.";
}



echo json_encode($data);