  	<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addKaryawanPerusahaan" aria-hidden="true">
  		<div class="modal-dialog">
  			<form class="needs-validation" id="formAddUser" action="<?= base_url('General/User/addUser'); ?>" method="POST" novalidate>
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="addUser">Tambah User</h5>
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  					</div>
  					<div class="modal-body">
  						<div class="form-group">
  							<label for="id_user" class="col-form-label">ID</label>
  							<input type="text" class="form-control form-control-sm" id="id_user" name="id_user" required>
                <label for="pass_user" class="col-form-label">Pass</label>
                <input type="text" class="form-control form-control-sm" id="pass_user" name="pass_user" required>
                <label for="name_user" class="col-form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name_user" name="name_user" required>
                <label for="group_id_user" class="col-form-label">Group Id</label>
                <input type="text" class="form-control form-control-sm" id="group_id_user" name="group_id_user" required>
                <label for="status_user_user" class="col-form-label">Status</label>
                <select name="status_user" class="form-control form-control-sm">
                  <option value="ACTIVE">ACTIVE</option>
                  <option value="INACTIVE">INACTIVE</option>
                </select>
                <!-- <input type="text" class="form-control form-control-sm" id="status_user" name="status_user" required> -->
                <!-- <label for="attempted_login_user_user" class="col-form-label">Attempted login</label>
                <input type="number" class="form-control form-control-sm" id="id_user" name="attempted_login_user" required> -->
  							<div class="invalid-feedback">
  								tidak boleh kosong
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