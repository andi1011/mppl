
<div class="featurette">
	<img src="<?php echo base_url('/temp/dist/img/'. $barang->foto);?>" class="featurette-image pull-left" style="width: 400px; height: 400px; margin-right:75px ">
	<h3 style="text-transform:uppercase"><?php echo $barang->nama_barang; ?> </h3>
		
	<?php $harga_akhir=$barang->harga-($barang->harga*($barang->diskon/100));
		
		if ($barang->diskon==0){?>
<p style="color:red;font-size:14px;font-weight:bold">Rp. <?php echo number_format($barang->harga); ?></p>
		<?php } else {?>
		<p style="color:red;font-size:14px;font-weight:bold"><s>Rp. <?php echo number_format($barang->harga); ?></s></p>
		<p style="font-size:14px;font-weight:bold"><b>Rp. <?php echo number_format($harga_akhir); ?></b></p>
		<?php }?>

	<div class="input-group" style="width:100px">
		<input type="hidden" value="<?php echo $barang->id_barang; ?>" id="id_barang">
		
		M<input type="number" min="1" class="form-control" value="0" name="M"id="M"> <BR>
		L<input type="number" min="1" class="form-control" value="0" name="L"id="L"> <BR>
		XL<input type="number" min="1" class="form-control" value="0" name="XL"id="XL"> <BR>
		XXL<input type="number" min="1" class="form-control" value="0" name="XXL"id="XXL"> <BR>
		XXXL<input type="number" min="1" class="form-control" value="0" name="XXXL"id="XXXL"> <BR>
		
		<div class="input-group-btn">
			<button class="btn btn-success" type="submit" id="btn_pesan">
				<i class="glyphicon glyphicon-shopping-cart"></i>
			</button>
		</div>
  </div>
</div>	
<br><br>
<div class="col-md-05 col-xs-12">
<b>DESCRIPTION</b>
			<div >
		
			Bahan : <?php echo $barang->bahan;?><br>
			Warna : <?php echo $barang->warna;?><br><br>
	
		</div>

			<b>SIZING</b>
			<div >
		
<img src="<?php echo base_url('/temp/dist/img/STANDARISASI-UKURAN-JAKET-MOTOR-ADN.jpg');?>" class="featurette-image pull-left" style="width: 500px; height: 300px; ">
	
		</div>
</div>

<script type="text/javascript">
	$('#btn_pesan').on('click', function(){
		//alert('Hello world');
		
		var QUANTITY = $('#M','#L','#XL','#XXL','#XXXL').val();
		var ID_BARANG = $('#id_barang').val();
		
		$.ajax({
			url: '<?php echo base_url(); ?>' + 'home/order',
			type: 'POST',
			cache: false,
			data: {
				QUANTITY: QUANTITY,
				ID_BARANG: ID_BARANG
			},
			success: function (response) {
				console.log(response);
				swal("Informasi!", "Barang '" + response + "' berhasil dipesan!", "success");
				
				//window.location.href = CURRENT_PAGE;

			}
		});
	})
</script>
