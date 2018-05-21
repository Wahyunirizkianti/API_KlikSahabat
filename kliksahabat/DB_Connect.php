<?php
class DB_Connect {
    private $conn;
 
		// koneksi ke database
		public function connect() {
			
        // koneksi ke mysql database
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		
		mysqli_set_charset($this->conn, 'utf8');
         
        // return database handler
        return $this->conn;
    }
}
 
?>