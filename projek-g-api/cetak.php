<?php
require 'function.php';

 $conn = mysqli_connect("localhost","root","","db_gunung");
 
require_once __DIR__ . '/vendor/autoload.php';


use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new Mpdf();


$data ='<!DOCTYPE html>
<html>
<head>
	<title>Daftar Gunung Api Indonesia</title>
</head>
<body>
	<h1>Daftar Gunung Api Indonesia</h1>
			<table border="1" cellpadding="10" cellspacing="0">
                        <tr >
                                <th>Nama</th>
                                <th>Bentuk</th>
                                <th>Tinggi</th>
                                <th>Letusan Terakhir</th>
                                <th>Gambar</th>
                                
                        </tr>';
                        $result = mysqli_query($conn, "SELECT * FROM tb_gunung");
                        while($row = mysqli_fetch_assoc($result)) :
                        	$data .= '<tr>
                        				<td>'.  $row["nama"] . '</td>
                        				<td>'.  $row["bentuk"] . '</td>
                        				<td>'.  $row["tinggi"]  . '</td>
                        				<td>'.  $row["letusan_terakhir"]  . '</td>
                        				<td><img src="gmbr/'. $row["gambar"] .'" width="70"></td>
                        			 </tr>';
                         endwhile;
			$data .= '</table>
</body>
</html>'; 
$mpdf->WriteHTML($data);
$mpdf->Output(Daftar-gunung.pdf, \Mpdf\Output\Destination::INLINE);

?>
