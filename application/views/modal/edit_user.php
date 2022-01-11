<?php foreach($s_user->result() as $user) ?>

<?php 

if (@$user->STATUS == 'ACTIVE') {
  $active = 'SELECTED';
} else {
  $inactive = 'SELECTED';
}

 ?>
  	
  						<div class="form-group">
  							<label for="id_user" class="col-form-label">Id</label>
                <input type="text" name="rec_id" hidden value="<?= $user->REC_ID ?>">
  							<input type="text" class="form-control form-control-sm" id="id_user" name="id_user" required value="<?= $user->ID?>">
                <label for="pass_user" class="col-form-label">Pass</label>
                <input type="text" class="form-control form-control-sm" id="pass_user" name="pass_user" required>
                <label for="name_user" class="col-form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name_user" name="name_user" required value="<?= $user->NAME?>">
                <label for="group_id_user" class="col-form-label">Group Id</label>
                <input type="text" class="form-control form-control-sm" id="group_id_user" name="group_id_user" required value="<?= $user->GROUP_ID?>">
                <label for="status_user_user" class="col-form-label">Status</label>
                <select name="status_user" class="form-control form-control-sm">
                  <option value="ACTIVE" <?= @$active ?> >ACTIVE</option>
                  <option value="INACTIVE" <?= @$inactive ?> >INACTIVE</option>
                </select>
                <!-- <input type="text" class="form-control form-control-sm" id="status_user" name="status_user" required value="<?= $user->STATUS?>"> -->
                <!-- <label for="attempted_login_user_user" class="col-form-label">Attempted login</label>
                <input type="number" class="form-control form-control-sm" id="id_user" name="attempted_login_user" required value="<?= $user->ATTEMPTED_LOGIN?>"> -->
  							<div class="invalid-feedback">
  								tidak boleh kosong
  							</div>
  						</div>

  					