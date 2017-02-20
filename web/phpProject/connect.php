<?php
function get_db() {
	$db = NULL;

    $dbUrl = getenv('DATABASE_URL');

    if (!isset($dbUrl) || empty($dbUrl)) {
    	$dbUrl = "postgres://postgres:PoSq1793@127.0.0.1:5432/carMaintenance";
    }

    $dbOpts = parse_url($dbUrl);
    $dbHost = $dbOpts["host"];
    //echo $dbHost;
    $dbPort = $dbOpts["port"];
    //echo $dbPort;
    $dbUser = $dbOpts["user"];
    //echo $dbUser;
    $dbPassword = $dbOpts["pass"];
    //echo $dbPassword;
    $dbName = ltrim($dbOpts["path"],'/');
    //echo $dbName;
    //$user = PGUSER;
    //$password = PGPASSWORD;
    try {
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

    return $db;
}
?>