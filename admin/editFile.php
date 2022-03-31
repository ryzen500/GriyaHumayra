<?php
session_start();
include '../dbconnect.php';

$id = $_GET['id'];

$sql =mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'");

$datas =mysqli_fetch_array($sql);
?>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<div class="card">

<div class="card-body">

<form action="proCessingUpdate.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
<div class="form-group">
									<label>Nama Produk</label>
									<input name="namaproduk" type="text" class="form-control" value="<?php echo $datas['namaproduk'] ?>" required autofocus>
								</div>
                                <div class="form-group">
									<label>Nama Kategori</label>
									<select name="idkategori" class="form-control">
									<option selected>Pilih Kategori</option>
									<?php
									$det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
										<?php
								}
								?>		
									</select>
									
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<input name="deskripsi" type="text" value="<?php echo $datas['deskripsi'] ?>" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Rating (1-5)</label>
									<input name="rate" type="number" class="form-control" value="<?php echo $datas['rate'] ?>" min="1" max="5" required>
								</div>
								<div class="form-group">
									<label>Harga Sebelum Diskon</label>
									<input name="hargabefore" type="number" value="<?php echo $datas['hargabefore'] ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga Setelah Diskon</label>
									<input name="hargaafter" type="number" value="<?php echo $datas['hargaafter'] ?>" class="form-control">
								</div>
                                
 

								<div class="form-group">
									<label>Gambar</label>
									<input name="uploadgambar" type="file" value="<?php echo $datas['uploadgambar'] ?>" class="form-control">
								</div>
                                
                                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" name="ubahfile" aria-label="Checkbox for following text input">
    </div>
  </div>
                            </div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addProduct" type="submit" class="btn btn-primary" value="Tambah">
							</div>
</form>
</div>
</div>