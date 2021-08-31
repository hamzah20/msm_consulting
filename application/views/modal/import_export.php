  	<div class="modal fade" id="ImportExport" tabindex="-1" aria-labelledby="ImportExport" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="ImportExport">Import / Export</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form id="formImport" method="POST" enctype="multipart/form-data" action="<?= base_url('General/Employee/importXLSLFile'); ?>">
  					<div class="modal-body">
  						<a class="btn btn-success btn-sm col-12" href="<?= base_url('General/Employee/generateXLSFile?companyID=' . $this->input->get('cid')) ?>" target="_blank">Download File (.xlsx)</a>
  						<small class="bg bg-warning font-weight-bold"><i>*Download terlebih dahulu file excel</i></small>

  						<div class="input-group mt-3 mb-3">
  							<div class="custom-file">
  								<input type="file" class="custom-file-input" id="fileImport" name="fileImport" aria-describedby="Import File Pegawai" required>
  								<input type="hidden" name="companyID" value="<?= $this->input->get('cid'); ?>" readonly>
  								<label class="custom-file-label" for="fileImport">Import file</label>
  							</div>

  							<!-- JS for Show The Name File in Input File -->
  							<script type="application/javascript">
  								$('#custom-file-label').on('change', function() {
  									// Ambil nama file 
  									let fileName = $(this).val().split('\\').pop();
  									// Ubah "Choose a file" label sesuai dengan nama file yag akan diupload
  									$(this).next('.custom-file-label').addClass("selected").html(fileName);
  								});
  							</script>

  						</div>
  					</div>
  					<div class="modal-footer">
  						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>