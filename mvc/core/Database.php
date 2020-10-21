<?php 
	class Database {
		private $con = "";
		function __construct()
		{
			if(!$this->con){
				$this->con = mysqli_connect('localhost','root','','miniproject') or die();
			}
		}
		function do_sql($sql){
			return mysqli_query($this->con, $sql);
		}
		function get_rows($sql){
			$result = $this->do_sql($sql);
			$row = $result->fetch_assoc();
			return $row;
		}
	}
?>