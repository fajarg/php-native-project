<?php
$conn = mysqli_connect("localhost","root","","db_gunung");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}
	return $rows;

}

function cari($keyword){
	$query = "SELECT * FROM tb_gunung
				WHERE 
				nama LIKE '%$keyword%' OR 
				bentuk LIKE '%$keyword%' OR 
				tinggi LIKE '%$keyword%' OR 
				letusan_terakhir LIKE '%$keyword%' 
			";
	return query($query);
}
?>