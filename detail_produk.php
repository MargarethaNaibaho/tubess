
<?php session_start(); ?>
<?php
include 'koneksi.php';
?>
<?php
//mendapatkan id_prouk dari url
$id_produk = $_GET['id_produk'];
//query ambil data
$detail = mysqli_fetch_array(mysqli_query($koneksi, ("SELECT * FROM produk JOIN user ON produk.id_supplier = user.id_pengguna WHERE id_produk='$id_produk'")));
?>

<style>
	.checked{
		color:gold;
	}
</style>

<br><br><br><br><br><br><br><br>
<section class="konten">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_produk"]; ?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
				<h4>Nama Supplier: <?php echo $detail["nama"]; ?></h4>
				<h4>Banyak dibeli: <?php echo $detail["stok_terjual"]; ?></h4>
				<h5>Stok: <?php echo $detail['stok_produk']; ?></h5>
				<p>Berat: <?php echo $detail["berat_produk"] ?> gram</p>
			 	<hr>
				<form method="POST" action="index.php?laman=beli1?id=<?php echo $detail['id_produk']; ?>&id_supplier=<?= $detail['id_supplier'] ?>">
					<div class ="form-group">
						<div class="input-group">
							<input type="number" min="1" max="<?php echo $detail['stok_produk']; ?>" class="form-control" name="jumlah">
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Beli</button>
							</div>
						</div><br></form>
						<hr><h2>Deskripsi: </h2>
						<p><?php echo $detail["deskripsi_produk"]; ?></p><hr>
						<h2>Penilaian dan Ulasan</h2><br>
						<?php if(isset($_SESSION['pelanggan']['nama'])) { ?>
						<form id="form_komen">
		<input type="number" value="<?= $id_produk ?>" name="id_produk" hidden>
		<span class="rating"> &#9733; </span>
		<span class="rating"> &#9733; </span>
		<span class="rating"> &#9733; </span>
		<span class="rating"> &#9733; </span>
		<span class="rating"> &#9733; </span>
						<input type="number" name="bintang" id="bintang" hidden>
						<textarea style="margin-top:20px;" class="form-control" id ="alamat" name="komentar" rows="4" cols="40" placeholder="Masukkan Komentar"></textarea>
						<input type="text" name="id_supplier" value="<?= $detail['id_supplier'] ?>" hidden>
						<input type="text" name="nama_produk" value="<?= $detail['nama_produk'] ?>" hidden>
				<button style="margin-top:20px;" type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
				</form>
<?php } else { ?>
	<form method="POST">
	<input type="number" value="<?= $id_produk ?>" name="id_produk" hidden <?= "disabled" ?>>
	<span class="rating"> &#9733; </span>
	<span class="rating"> &#9733; </span>
	<span class="rating"> &#9733; </span>
	<span class="rating"> &#9733; </span>
	<span class="rating"> &#9733; </span>
	<input type="number" name="bintang" id="bintang" hidden <?= "disabled" ?>>
	<textarea style="margin-top:20px;" class="form-control" id ="alamat" name="komentar" rows="4" cols="40" placeholder="Masukkan Komentar" <?= "disabled" ?>></textarea>
				<button style="margin-top:20px;" type="submit" class="btn btn-success" name="submit" value="submit" <?= "disabled" ?>>Submit</button>
				</form>

<?php
}
?><br>
<div id="tampilKomentar"> </div>
</div>
		<br><a href="index.php" class="btn btn-success">Kembali</a>
	</div>
	<script>
		$("#tampilKomentar").load("tampil_komentar.php?id=<?= $id_produk ?>");
		$(".rating").hover(function(){
			var i;
			var selected_index = $(this).index() - 1;
			for (i = 0; i <= selected_index; i++){
				$(".rating:eq("+i+")").attr("class","rating checked");
			}
			for (i = selected_index + 1; i < 5; i++){
				$(".rating:eq("+i+")").attr("class","rating");
			}
			$("#bintang").val(selected_index + 1);
		})

		$("#form_komen").submit(function(e){
			e.preventDefault();
			var i, count_star = 0;
			for(i = 0; i < 5; i++){
				$class_name = $(".rating:eq("+i+")").attr("class").split(" ").pop();
				if($class_name == "checked"){
					count_star++;
				}
			}
			var id_produk = $("#id_produk").val();
			$.ajax({
				url : "detailphp.php",
				method : "POST",
				data: new FormData(this),
				processData : false,
				contentType : false,
				cache : false,
				success : function(data){
					$("#tampilKomentar").load("tampil_komentar.php?id="+id_produk);
					location.reload();
				}
			})
		})
	</script>
			</div>
		</div>
	</div>
</section><br>
<?php include 'footer.php'; ?>