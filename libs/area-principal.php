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

$errors = false;
$error_validation = array();

$urls = array();

if (isset($_POST['url']) && isset($_POST['number_carac']))
{
	if(validateURL($_POST['url'])) {
		$parts = explode("www",$_POST['url']);

		$parts_http = explode("http://",$_POST['url']);
		$parts_https = explode("https://",$_POST['url']);

		if(empty($parts[0])) {
			$user_url = $_POST['url'];
			$url = "http://$user_url";
		} else if(!empty($parts_https[0]) && !empty($parts_http[0]) && !empty($parts[0])) {
			$user_url = $_POST['url'];
			$url = "http://$user_url";	
		} else {
			$url = $_POST['url'];
		}

		if (empty($_POST['url_opcional']) && !empty($_POST['number_carac'])) {
			$new_url = $func->generateURL($_POST['number_carac']);
			$func->registerURL($url, $new_url, "");
		} else if (isset($_POST['url_opcional'])) {
			if (strlen($_POST['url_opcional']) >= 3) {
				$veriricar_url_opcional = $func->verificarURLOpcional($_POST['url_opcional']);
				if($veriricar_url_opcional) {
					$errors = true;
					$error_validation['url_opcional'] = 'Já existe url com esse nome!';
				} else {
					$new_url = $_POST['url_opcional'];
					$func->registerURL($url, "", $_POST['url_opcional']);
				}
			} else {
				$errors = true;
				$error_validation['url_opcional'] = 'Must be >= 3';
			}
		}
	} else {
		$errors = true;
		$error_validation['url'] = 'Wrong url!';
	}
} 

$urls = array(
	'url' 			=> isset($_POST['url']) ? ($_POST['url']) : '',
	'number_carac' 	=> isset($_POST['number_carac']) ? ($_POST['number_carac']) : '',
	'url_opcional'	=> isset($_POST['url_opcional']) ? ($_POST['url_opcional']) : ''
);

include "./views/area-principal.php";