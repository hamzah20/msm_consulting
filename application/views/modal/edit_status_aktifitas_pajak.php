  	<div class="modal fade" id="editStatusAktifitas" tabindex="-1" aria-labelledby="editStatusAktifitas" aria-hidden="true">
  		<div class="modal-dialog">
  			<form class="needs-validation" id="formAddEmployee" action="<?= base_url('General/Employee/addEmployee'); ?>" method="POST" novalidate>
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="editStatusAktifitas">Edit Status Aktifitas Pajak</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="row">
  							<div class="col-6">
  								<div class="form-group">
		  							<label for="recipient-name" class="col-form-label">Nama Perusahaan (Klien) :</label>
		  							<input type="text" class="form-control form-control-sm" id="txtNamaPerusahaan" name="txtNamaPerusahaan" value="PT. Wijaya Karya" readonly> 
		  						</div> 
  							</div>
  							<div class="col-6">
  								<div class="form-group">
		  							<label for="recipient-name" class="col-form-label">Masa Periode :</label>
		  							<input type="text" class="form-control form-control-sm" id="txtPeriode" name="txtPeriode" value="JAN-2021" readonly> 
		  						</div> 
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-6">
  								<div class="form-group">
		  							<label for="recipient-name" class="col-form-label">Jenis Pajak :</label>
		  							<input type="text" class="form-control form-control-sm" id="txtJenisPajak" name="txtJenisPajak" value="Pasal 21" readonly> 
		  						</div> 
  							</div>
  							<div class="col-6">
  								<div class="form-group">
		  							<label for="recipient-name" class="col-form-label">Jumlah KB (Kurang Bayar) :</label>
		  							<input type="text" class="form-control form-control-sm" id="txtKurangBayar" name="txtKurangBayar" value="454,320" readonly> 
		  						</div> 
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-12">
  								<div class="form-group">
					              <label for="" class="label-utama font-weight-bold">Status Aktifitas Pajak</label>
					              <div class="input-group">
					                <a class="btn btn-sm btn-danger mr-2" data-placement="top" title="Detail Status" href="#" data-toggle="modal" data-target="#detailAktifitasPajak"><i class="fa fa-eye"></i></a>
					                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtAktifitasPajak" value="[9] Selesai" readonly>
					              </div>  
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