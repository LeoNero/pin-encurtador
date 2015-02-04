<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class Connection 
{
	private $host = "mysql.hostinger.com.br";
	private $user = "u330386330_root";
	private $pass = "generator";
	private $db = "u330386330_encur";

	public function connection() {
		$connection = new mysqli($this->host, $this->user, $this->pass, $this->db);

		return $connection;
	}
}