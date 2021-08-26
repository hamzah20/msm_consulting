  	<div class="modal fade" id="addKaryawanPerusahaan" tabindex="-1" aria-labelledby="addKaryawanPerusahaan" aria-hidden="true">
  		<div class="modal-dialog">
  			<form class="needs-validation" id="formAddEmployee" action="<?= base_url('General/Employee/addEmployee'); ?>" method="POST" novalidate>
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="addKaryawanPerusahaan">Tambah Karyawan</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="recipient-name" class="col-form-label">Nama Karyawan :</label>
  							<input type="text" class="form-control form-control-sm" id="nama_karyawan" name="nama_karyawan" required>
  							<div class="invalid-feedback">
  								Nama tidak boleh kosong
  							</div>
  						</div>

  						<input type="hidden" name="companyID" value="<?= $this->input->get('cid'); ?>">

  					</div>
  					<div class="modal-footer">
  						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  					</div>
  				</div>
  			</form>
  		</div>
  	</div>