  	<div class="modal fade" id="addPerusahaan" tabindex="-1" aria-labelledby="addPerusahaan" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<form class="needs-validation" id="formAddCompany" action="<?= base_url('General/Client/addCompany'); ?>" method="POST" novalidate>
  					<div class="modal-header">
  						<h5 class="modal-title" id="addPerusahaan">Tambah Perusahaan</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="recipient-name" class="col-form-label">Nama Perusahaan :</label>
  							<input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan" required>
  							<div class="invalid-feedback">
  								Nama tidak boleh kosong
  							</div>
  						</div>

  					</div>
  					<div class="modal-footer">
  						<button type="submit" class="btn btn-primary btn-sm" id="btnSubmitCompany">Simpan</button>
  						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>