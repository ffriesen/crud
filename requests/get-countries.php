<?php
global $conn;
$conn = pg_connect('dbname=belcar_2015 user=postgres password=fel host=localhost port=5432'); 
if (!$conn) { 
//echo "Not connected : " . pg_error(); //Show in error container in GUI
header("Location: /orders/error/");
exit; 
}

$q = "select country from countries order by country asc;";
$rs = pg_query($conn,$q);
//header('Content-Type: application/json');
$data = pg_fetch_all($rs);
echo json_encode($data);
