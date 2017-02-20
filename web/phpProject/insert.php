<?php

$carMake = $_POST['make'];
$carModel = $_POST['model'];
$carEngine = $_POST['engine'];
$carTrans = $_POST['trans'];
$carMileage = $_POST['mileage'];

require("connect.php");
$db = get_db();
try
{
	$query = 'INSERT INTO car(make_id, model_id, engine_size, is_manual, mileage) VALUES(:carMake, :carModel, :carEngine, :carTrans, :carMileage)';
	$statement = $db->prepare($query);

	$statement->bindValue(':carMake', $carMake);
	$statement->bindValue(':carModel', $carModel);
	$statement->bindValue(':carEngine', $carEngine);
	$statement->bindValue(':carTrans', $carTrans);
	$statement->bindValue(':carMileage', $carMileage);
	$statement->execute();
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

header("Location: index.php");
die();
?>