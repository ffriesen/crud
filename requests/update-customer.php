<?php
$data = json_decode(file_get_contents("php://input"));

$conditions = (array) $data->conditions;
$params = (array) $data->data;
$table = $data->table;

global $conn;
$conn = pg_connect('dbname=belcar_2015 user=postgres password=fel host=localhost port=5432'); 
if (!$conn) { 
//echo "Not connected : " . pg_error(); //Show in error container in GUI
header("Location: /orders/error/");
exit; 
}

$res = pg_update($conn, 'customers', $params, $conditions);


