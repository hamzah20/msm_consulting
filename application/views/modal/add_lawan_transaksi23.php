  	<div class="modal fade" id="addLawanTransaksi23" tabindex="-1" aria-labelledby="addLawanTransaksi23" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<form class="needs-validation" id="formAddLawanTransaksi23" action="<?= base_url('PPH/Pph23/add_lawan_transaksi'); ?>" method="POST" novalidate>
  					<div class="modal-header">
  						<h5 class="modal-title" id="addLawanTransaksi">Tambah Lawan Transaksi</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="recipient-name" class="col-form-label">Nama Lawan Transaksi :</label>
  							<input type="text" class="form-control form-control-sm" id="txtNama" name="txtNama" required> 
  						</div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">NPWP Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtNPWP" name="txtNPWP" required> 
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">NIK Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtNIK" name="txtNIK" required> 
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Kota Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtCity" name="txtCity" required> 
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Profinsi Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtProvince" name="txtProvince" required> 
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