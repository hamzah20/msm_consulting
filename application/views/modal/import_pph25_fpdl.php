    <div class="modal fade" id="importFPDL" tabindex="-1" aria-labelledby="importFPDL" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="importFPDL">Import Data PPh 25 / FPDL</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formImport" method="POST" enctype="multipart/form-data" action="<?= base_url('PPH/Pph25/importFPDL'); ?>">
            <div class="modal-body">
              <div class="input-group mt-3 mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fileImport" name="fileImport" aria-describedby="ImportDataFPDL" required>
                  <label class="custom-file-label" id="custom-file-label" for="fileImport">Import file</label>
                </div> 
              </div>
              <small class="bg bg-warning font-weight-bold"><i>*Max Size 1MB</i></small>  
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>