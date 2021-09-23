  	<div class="modal fade" id="importPPH21" tabindex="-1" aria-labelledby="importPPH21" aria-hidden="true">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h5 class="modal-title" id="importPPH21">Import Data PPh 21</h5>
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span>
  					</button>
  				</div>
  				<form id="formImport" method="POST" enctype="multipart/form-data" action="<?= base_url('PPH/Pph21/importXLSLFile'); ?>">
  					<div class="modal-body">
  						<div class="input-group mt-3 mb-3">
  							<div class="custom-file">
  								<input type="file" class="custom-file-input" id="fileImport" name="fileImport" aria-describedby="ImportDataPPH21" required>
  								<label class="custom-file-label" id="custom-file-label" for="fileImport">Import file</label>
  							</div> 
  						</div>
  						<small class="bg bg-warning font-weight-bold"><i>*Max Size 1MB</i></small>  
  						<input type="hidden" name="companyID" value="<?= $this->input->get('cid'); ?>" readonly>
  						<input type="hidden" name="pphID" value="<?= $this->input->get('pid'); ?>" readonly> 
  					</div>

  					<div class="modal-footer">
  						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>