	<?php
	foreach($list_barang as $barang){	
		?>
		
		<div class="col-md-3 col-xs-6">
			<div class="thumbnail center">
				<?php if ($barang->diskon>0){?>
				<div style="position:absolute; background:#000; z-index:100; color:#fff; font-size:10px; padding:10px"><?php echo $barang->diskon;?>%
				</div> <?php }?>
				<a href="<?php echo base_url('home/detail/' . $barang->id_barang); ?>">
					<img src="<?php echo base_url('/temp/dist/img/'. $barang->foto);?>" style="width: 250px; height:250px;">
				</a>
				<?php $harga_akhir=$barang->harga-($barang->harga*($barang->diskon/100));
					if ($barang->diskon==0){?>
					<div class="caption">
						<div style="font-weight:bold;text-align:center"><?php echo $barang->nama_barang; ?></div> 
						<div style="font-size:12px;text-align:center"><b>Rp. <?php echo number_format($barang->harga); ?>/ Pcs</b></div>				
						<br>
					</div>
				<?php }
					else {?>
					<div class="caption">
					<div style="font-weight:bold;text-align:center"><?php echo $barang->nama_barang; ?></div> 
					<div style="font-size:12px;color:red;text-align:center"><s>Rp. <?php echo number_format($barang->harga); ?>/ Pcs</s></font></div>				
					<div style="font-size:12px;text-align:center"><b>Rp. <?php echo number_format($harga_akhir); ?>/ Pcs</b></div>				
					</div>
					<?php					
					}?>
			</div>
		</div>
	<?php	
	}
		?>