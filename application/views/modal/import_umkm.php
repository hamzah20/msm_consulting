    <div class="modal fade" id="importUMKM" tabindex="-1" aria-labelledby="importUMKM" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="importUMKM">Import Data UMKM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formImport" method="POST" enctype="multipart/form-data" action="<?= base_url('PPH/Pph42/importXLSLFileUMKM'); ?>">
            <div class="modal-body">
              <div class="input-group mt-3 mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fileImport" name="fileImport" aria-describedby="ImportDataPPH23" required>
                  <label class="custom-file-label" id="custom-file-label" for="fileImport">Import file</label>
                </div> 
              </div>
              <small class="bg bg-warning font-weight-bold"><i>*Max Size 1MB</i></small>  
              <input type="hidden" name="companyID" value="<?= $this->input->get('cid'); ?>" readonly>
              <input type="hidden" name="pphID" value="<?= $this->input->get('pid'); ?>" readonly> 
              <input type="hidden" name="monthID" value="<?= $this->input->get('mid'); ?>" readonly> 
              <input type="hidden" name="yearID" value="<?= $this->input->get('yid'); ?>" readonly> 
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>