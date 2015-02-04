<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once("Classes/Connection.php");
require_once("Classes/Functions.php");
require_once("helper.php");

$connection = new Connection();
$conn = $connection->connection();

$func = new Functions($conn);

if (isset($_GET['short'])) {
	$short = $_GET['short'];

	$url = $func->findURL($short);

	header("Location: $url");
}