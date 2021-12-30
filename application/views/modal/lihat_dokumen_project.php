<?php if ($dokumen_list->num_rows() < 1){ ?>
	Tidak ada dokumen
<?php }else{ ?>
	<table class="table">
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Nama File</th>
			<th scope="col">Tanggal Upload</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<?php 
	$no = 1;
	foreach ($dokumen_list->result() as $dokumen):
		$addr = $dokumen->FILE_ADDRESS
	 ?>
		<tr>
			<td>
				<?php echo $no;$no++; ?>
			</td>
			<td>
				<?= $dokumen->FILE_NAME ?>
			</td>
			<td>
				<?= $dokumen->UPLOAD_DATE ?>
			</td>
			<td>
				<a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
                  <i class="fa fa-download"></i>
                </a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php } ?>