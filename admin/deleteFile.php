<?php 

	require '../dbconnect.php';
    // include '../dbconnect.php';
		$idproduk= $_GET['hapus'];
		// $data[] = $id;
		$sql = "DELETE FROM produk WHERE idproduk='$idproduk'";
        $query = mysqli_query($conn,$sql);
		// $row = $config -> prepare($sql);
		// $row -> execute($data);
        // var_dump($row);
        if($query){
            header('location:produk.php');
        }else{
            die("gagal menghapus");
        }
		echo '<script>window.location="produk.php"</script>';
?>