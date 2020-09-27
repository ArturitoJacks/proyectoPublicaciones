<?php
class Conexion{
	private $host = HOST;
	private $user = USER;
	private $pass = PASS;
	private $dbname = NAME;
	private $rows = array();
	private $dbh;

	public function __construct(){
		try {
			$this->dbh = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		} catch (mysqli_sql_exception $e) {
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$result = $this->dbh->query($query);
		return $result;
	}

	public function resultquery($query){
		$result = $this->dbh->query($query);
		$num = mysqli_num_rows($result);
		while ($row = $result->fetch_object()) {
			$rows[] = $row;
		}
		if ($num == 0) {
			$rows = array();
		}
		return $rows;
	}
}
?>