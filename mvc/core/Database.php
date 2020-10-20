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
	}
?>