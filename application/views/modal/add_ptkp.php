  	<div class="modal fade" id="addPTKP" tabindex="-1" aria-labelledby="addKaryawanPerusahaan" aria-hidden="true">
  		<div class="modal-dialog">
  			<form class="needs-validation" id="formAddUser" action="<?= base_url('Settings/Ptkp/addPTKP'); ?>" method="POST" novalidate>
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="addUser">Tambah PTKP</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="TK_ID" class="col-form-label">PTKP ID</label>
  							<input type="text" class="form-control form-control-sm" id="TK_ID" name="TK_ID" required>
                <label for="TK_NAME" class="col-form-label">PTKP NAME</label>
                <input type="text" class="form-control form-control-sm" id="TK_NAME" name="TK_NAME" required>
                <label for="TK_TARIF" class="col-form-label">PTKP TARIF</label>
                <input type="text" class="form-control form-control-sm" id="TK_TARIF" name="TK_TARIF" required>
                <label for="TK_ORDER" class="col-form-label">PTKP ORDER</label>
                <input type="text" class="form-control form-control-sm" id="TK_ORDER" name="TK_ORDER" required>
                <label for="PERIOD_YEAR" class="col-form-label">YEARS</label>
                <input type="text" class="form-control form-control-sm" id="PERIOD_YEAR" name="PERIOD_YEAR" required>
  							<div class="invalid-feedback">
  								tidak boleh kosong
  							</div>
  						</div>

  					</div>
  					<div class="modal-footer">
  						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  					</div>
  				</div>
  			</form>
  		</div>
  	</div>