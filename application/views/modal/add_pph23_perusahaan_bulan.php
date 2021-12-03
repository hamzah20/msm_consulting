  	<div class="modal fade" id="addPPH23PerusahaanBulan" tabindex="-1" aria-labelledby="addPPH23PerusahaanBulan" aria-hidden="true">
  	  <div class="modal-dialog">
  	    <form class="needs-validation" id="formAddCompany" method="POST" novalidate action="<?= base_url('PPH/Pph23/addCompany'); ?>">
  	      <div class="modal-content">
  	        <div class="modal-header">
  	          <h5 class="modal-title" id="addPPH23PerusahaanBulan">Tambah Periode - PPH 23</h5>
  	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	            <span aria-hidden="true">&times;</span>
  	          </button>
  	        </div>
  	        <div class="modal-body">
  	          <div class="row">

  	            <div class="col-12">
  	              <div class="form-group">
  	                <label for="recipient-name" class="col-form-label">Nama Perusahaan (Client) :</label>
  	                <input type="text" class="form-control form-control-sm" id="nama_karyawan" name="nama_karyawan" readonly value="<?= $companies->row()->COMPANY_NAME; ?>">
  	                <div class="invalid-feedback">
  	                  Nama Perusahaan Tidak Boleh Kosong
  	                </div>
  	              </div>
  	            </div>

  	            <div class="col-6">
  	              <div class="form-group">
  	                <label for="recipient-name" class="col-form-label">Periode / Masa (Bulan) :</label>
  	                <select class="form-control option-pegawai" name="addPeriodeBulan">
  	                  <option value="Januari">Januari</option>
  	                  <option value="Februari">Februari</option>
  	                  <option value="Maret">Maret</option>
  	                  <option value="April">April</option>
  	                  <option value="Mei">Mei</option>
  	                  <option value="Juni">Juni</option>
  	                  <option value="Juli">Juli</option>
  	                  <option value="Agustus">Agustus</option>
  	                  <option value="September">September</option>
  	                  <option value="Oktober">Oktober</option>
  	                  <option value="November">November</option>
  	                  <option value="Desember">Desember</option>
  	                </select>
  	              </div>
  	            </div>

  	            <div class="col-6">
  	              <div class="form-group">
  	                <label for="recipient-name" class="col-form-label">Periode / Masa (Tahun) :</label>
  	                <select class="form-control option-pegawai" name="addPeriodeTahun" id="addPeriodTahun">
  	                  <option value="2021">2021</option>
  	                  <option value="2021">2020</option>
  	                  <option value="2021">2019</option>
  	                  <option value="2021">2018</option>
  	                  <option value="2021">2017</option>
  	                </select>
  	              </div>
  	            </div>

  	          </div>

  	          <input type="hidden" name="companyID" id="companyID" value="<?= $companies->row()->COMPANY_ID; ?>">
  	          <input type="hidden" name="pphFlag" id="pphFlag" value="true">

  	        </div>
  	        <div class="modal-footer">
  	          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  	          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
  	        </div>
  	      </div>
  	    </form>
  	  </div>
  	</div>