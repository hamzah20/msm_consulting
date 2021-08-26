    <div class="modal fade" id="addPPH21PerusahaanBulan" tabindex="-1" aria-labelledby="addPPH21PerusahaanBulan" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" id="formAddEmployee" action="#" method="POST" novalidate>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addPPH21PerusahaanBulan">Tambah Periode - PPH 21</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="txtNoUrutPerusahaan" class="col-form-label">No Urut Perusahaan :</label>
                    <input type="text" class="form-control form-control-sm" id="txtNoUrutPerusahaan" name="txtNoUrutPerusahaan" value="" placeholder="....." readonly> 
                  </div> 
                  <div class="form-group">
                    <label for="txtPeriodeBulan" class="col-form-label">Periode / Masa (Bulan) :</label>
                    <select class="form-control option-pegawai" id="txtPeriodeBulan" name="txtPeriodeBulan" value="" placeholder=".....">
                        <option value="">Januari</option> 
                        <option value="">Februari</option> 
                        <option value="">Maret</option> 
                        <option value="">April</option> 
                        <option value="">Mei</option> 
                        <option value="">Juni</option> 
                        <option value="">Juli</option> 
                        <option value="">Agustus</option> 
                        <option value="">September</option> 
                        <option value="">Oktober</option> 
                        <option value="">November</option> 
                        <option value="">Desember</option> 
                    </select> 
                  </div> 
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="txtNamaPerusahaan" class="col-form-label">Nama Perusahaan (Client) :</label>
                    <input type="text" class="form-control form-control-sm" id="txtNamaPerusahaan" name="txtNamaPerusahaan" value="" placeholder="....." readonly>
                    <div class="invalid-feedback">
                      Nama Perusahaan Tidak Boleh Kosong
                    </div> 
                  </div> 
                  <div class="form-group">
                    <label for="txtPeriodeTahun" class="col-form-label">Periode / Masa (Tahun) :</label>
                    <select class="form-control option-pegawai" id="txtPeriodeTahun" name="txtPeriodeTahun" value="" placeholder=".....">
                        <option value="">2021</option> 
                        <option value="">2020</option> 
                        <option value="">2019</option> 
                        <option value="">2018</option> 
                        <option value="">2017</option> 
                    </select> 
                  </div> 
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