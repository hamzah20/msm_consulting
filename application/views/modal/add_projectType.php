<div class="modal fade" id="addProjectType" tabindex="-1" aria-labelledby="addProjectType" aria-hidden="true">
	<div class="modal-dialog">
		<form class="needs-validation" id="formAddProjecttype" action="<?= base_url('General/ProjectType/addProjecttype'); ?>" method="POST" novalidate>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addProjectType">Tambah Project Type</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nama Project Type :</label>
						<input type="text" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required>
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control form-control-sm" id="txt_description" name="txt_description" >
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