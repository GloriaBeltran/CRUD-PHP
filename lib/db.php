<?php

	class DB {
		private $server;
		private $user;
		private $password;
		private $database;
		private $table;

		public function __construct($server, $user, $password, $database) {
			$this->server = $server;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
		}
		
		public function connect() {
			return mysqli_connect($this->server, $this->user, $this->password, $this->database);
		}

		public function setTable($table) {
			return $this->table = $table;
		}

		public function setStudent($doc, $docType, $name, $age) {
			return mysqli_query($this->connect(), "INSERT INTO $this->table(doc, docType, name, age) VALUES('$doc', '$docType', '$name', '$age')");
		}

		public function getEstudents() {
			return mysqli_query($this->connect(), "SELECT * FROM $this->table");
		}

		public function getStudent($doc) {
			return mysqli_query($this->connect(), "SELECT * FROM $this->table WHERE doc='$doc'");
		}

		public function updateStudent($doc, $docType, $name, $age) {
			return mysqli_query($this->connect(), "UPDATE $this->table SET docType='$docType', name='$name', age='$age' WHERE doc='$doc'");
		}

		public function deleteStudent($doc) {
			return mysqli_query($this->connect(), "DELETE FROM $this->table WHERE doc='$doc'");
		}

		public function close() {
			return mysqli_close($this->connect());
		}
	}