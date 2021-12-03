    <div class="modal fade" id="editMasukan" tabindex="-1" aria-labelledby="editMasukan" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" >
          <div class="modal-header">
            <h5 class="modal-title" id="editMasukan">Edit Data PPh 25 / Masukan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formImport" method="POST" enctype="multipart/form-data" action="<?= base_url('PPH/Pph25/editMasukan'); ?>">
            <div class="modal-body modalpph" style="height: 500px;overflow-y:auto;">  
                <div class="row mb-3">
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