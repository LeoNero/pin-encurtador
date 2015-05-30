<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class Connection 
{
	private $host = "";
	private $user = "";
	private $pass = "";
	private $db = "";

	public function connection() {
		$connection = new mysqli($this->host, $this->user, $this->pass, $this->db);

		return $connection;
	}
}
