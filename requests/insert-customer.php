<?php 
$data = json_decode(file_get_contents("php://input"));
$customer_name = isset($data->customer_name) ? pg_escape_string($data->customer_name) : null;
$customer_address = isset($data->customer_address) ? pg_escape_string($data->customer_address) : null;
$customer_address_2 = isset($data->customer_address_2) ? pg_escape_string($data->customer_address_2) : null;
$customer_city = isset($data->customer_city) ? pg_escape_string($data->customer_city) : null;
$customer_state = isset($data->customer_state) ? pg_escape_string($data->customer_state) : null;
$customer_postal_code = isset($data->customer_postal_code) ? pg_escape_string($data->customer_postal_code) : null;
$customer_country = isset($data->customer_country) ? pg_escape_string($data->customer_country) : null;
$customer_phone = isset($data->customer_phone) ? pg_escape_string($data->customer_phone) : null;
$customer_fax = isset($data->customer_fax) ? pg_escape_string($data->customer_fax) : null;
$customer_email = isset($data->customer_email) ? pg_escape_string($data->customer_email) : null;
$customer_memo = isset($data->customer_memo) ? pg_escape_string($data->customer_memo) : null;

$assoc = array(
	"customer_name"=>$customer_name,
	"customer_address"=>$customer_address,
	"customer_address_2"=>$customer_address_2,
	"customer_city"=>$customer_city,
	"customer_state"=>$customer_state,
	"customer_postal_code"=>$customer_postal_code,
	"customer_country"=>$customer_country,
	"customer_phone"=>$customer_phone,
	"customer_fax"=>$customer_fax,
	"customer_email"=>$customer_email,
	"customer_memo"=>$customer_memo
	);


global $conn;
$conn = pg_connect('dbname=belcar_2015 user=postgres password=fel host=localhost port=5432'); 
if (!$conn) { 
//echo "Not connected : " . pg_error(); //Show in error container in GUI
header("Location: /orders/error/");
exit; 
}

$res = pg_insert($conn,'customers',$assoc);
if ($res) {
	echo "POST data is successfully logged\n";
} else {
	echo "User must have sent wrong inputs\n";
}




// $q = "select country from countries order by country asc;";
// $rs = pg_query($conn,$q);
// //header('Content-Type: application/json');
// $data = pg_fetch_all($rs);
