<?php
	$id=$_GET["id"];
	$conn=mysqli_connect("localhost","root","","db_gunung");
	mysqli_query($conn, "DELETE FROM tb_gunung WHERE id=$id");
		if (mysqli_affected_rows($conn) > 0) {
                echo "
                    <script>
                        alert('data berhasil dihapus');
                        document.location.href = '../utama.php';
                    </script>
                ";
            }
    	else{
                echo "
                    <script>
                        alert('data gagal dihapus');
                        document.location.href = '../utama.php';
                    </script>
                ";
         }
?>