<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class Functions {

	public $mysqli;
	public $url;

	public function __construct($new_mysqli) {
		$this->mysqli = $new_mysqli;
	}
	
	public function registerURL($url, $new_url, $new_url_op) {

		$url = $this->mysqli->escape_string($url);
		$new_url = $this->mysqli->escape_string($new_url);
		$new_url_op = $this->mysqli->escape_string($new_url_op);

		$sql = "
			INSERT INTO url 
			(url_completa, final, final_opcional)
			VALUES
			( 
				'{$url}',
				'{$new_url}',
				'{$new_url_op}'
			)
		";

		$this->mysqli->query($sql); 
	}	

	public function generateURL($number_carac) {
		$carac = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$new_url = substr(str_shuffle($carac), 0, $number_carac);

		$sql = "SELECT * FROM url WHERE final = '$new_url' OR final_opcional = '$new_url'";	
		$resultado = $this->mysqli->query($sql);
		$verificar = $resultado->num_rows;

		if ($verificar == 1) {
			generateURL($number_carac);
		} else {
			return $new_url;
		}

		return $new_url;
	}

	public function verificarURLOpcional($url_opcional) {
		$sql = "SELECT * FROM url WHERE final = '$url_opcional' OR final_opcional = '$url_opcional'";	
		$resultado = $this->mysqli->query($sql);

		$verificar = $resultado->num_rows;

		if ($verificar == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function findURL($short) {
		$sql = "SELECT url_completa FROM url WHERE final = '$short' OR final_opcional = '$short'";
		$result = $this->mysqli->query($sql);

		$url = mysqli_fetch_assoc($result);

		return $url['url_completa'];
	}
}