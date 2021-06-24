<?php

	class DB {
		private $server;
		private $user;
		private $password;
		private $database;

		public function __construct($server, $user, $password, $database) {
			$this->server = $server;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
		}
		
		public function connect() {
			return mysqli_connect($this->server, $this->user, $this->password, $this->database);
		}

		public function setStudent($doc, $docType, $name, $lastName, $age) {
			return mysqli_query($this->connect(), "INSERT INTO tblestudiantes(documento, tipoDoc, nombre, apellido, edad) VALUES('$doc', '$docType', '$name', '$lastName', '$age')");
		}

		public function getEstudents() {
			return mysqli_query($this->connect(), "SELECT * FROM tblestudiantes");
		}

		public function getStudent($doc) {
			return mysqli_query($this->connect(), "SELECT * FROM tblestudiantes WHERE documento='$doc'");
		}

		public function updateStudent($doc, $docType, $name, $lastName, $age) {
			return mysqli_query($this->connect(), "UPDATE tblestudiantes SET tipoDoc='$docType', nombre='$name', apellido='$lastName', edad='$age' WHERE documento='$doc'");
			print($doc.$docType.$name.$lastName.$age);
		}

		public function deleteStudent($doc) {
			return mysqli_query($this->connect(), "DELETE FROM tblestudiantes WHERE documento='$doc'");
		}

		public function close() {
			return mysqli_close($this->connect());
		}
	}