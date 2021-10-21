  	<div class="modal fade" id="editPPH21BulanSummary" tabindex="-1" aria-labelledby="editPPH21BulanSummary" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<form class="needs-validation" id="formAddCompany" action="<?= base_url('General/Client/addCompany'); ?>" method="POST" novalidate>
  					<div class="modal-header">
  						<h5 class="modal-title" id="editPPH21BulanSummary">Edit Nilai Kompensasi (PPh21)</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="editNilaiKompensasi" class="col-form-label">Nilai Kompensasi :</label>
  							<input type="text" class="form-control form-control-sm" id="editNilaiKompensasi" name="editNilaiKompensasi" value="" placeholder="....." required>
  							<div class="invalid-feedback">
  								Nilai kompensasi tidak boleh kosong
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