<table class="table">
<?php
include 'koneksi.php';			
$id = $_GET['id'];
$ambil = mysqli_query($koneksi,"SELECT * FROM komentar WHERE id_produk = '$id'");
				if(empty($ambil)) {
					echo "<h2>0 komentar</h2>";
				}
				else {
					while($pecah = mysqli_fetch_array($ambil)){?>
						
							<tr>
								<td><b><?php echo $pecah['nama'];?></b>&nbsp;
								<?php for($i = 0; $i < $pecah['nilai']; $i++) { ?>
									<span class="rating checked"> &#9733; </span>
								<?php } ?>
								<?php for($i = $pecah['nilai']; $i < 5; $i++) { ?>
									<span class="rating"> &#9734; </span>
								<?php } ?> </td>
							</tr>
							<tr>
								<td><?php echo $pecah['komentar']; ?></td>
							</tr>
						 
					<?php } ?>
			<?php	} ?>
</table>