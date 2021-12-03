  	<div class="modal fade" id="editLawanTransaksi" tabindex="-1" aria-labelledby="editLawanTransaksi" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<form class="needs-validation" id="formEditLawanTransaksi" action="<?= base_url('PPH/Pph22/update_lawan_transaksi'); ?>" method="POST" novalidate>
  					<div class="modal-header">
  						<h5 class="modal-title" id="editLawanTransaksi">Edit Lawan Transaksi</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
            <input type="hidden" class="form-control form-control-sm" id="txtID" name="editID" value="<?= $transaction->row()->TRANSACTION_ID; ?>" required> 
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="recipient-name" class="col-form-label">Nama Lawan Transaksi :</label>
  							<input type="text" class="form-control form-control-sm" id="txtNama" name="editNama" value="<?= $transaction->row()->TRANSACTION_NAME; ?>" required> 
  						</div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">NPWP Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtNPWP" name="editNPWP" value="<?= $transaction->row()->TRANSACTION_NPWP; ?>"> 
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Alamat Lawan Transaksi :</label>
                <input type="text" class="form-control form-control-sm" id="txtAlamat" name="editAlamat" value="<?= $transaction->row()->TRANSACTION_ADDRESS; ?>" required> 
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