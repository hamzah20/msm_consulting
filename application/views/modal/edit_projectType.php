<?php foreach($gm_project_type->result() as $p_type) ?>
  	
  						<div class="form-group">
                <label for="NAME" class="col-form-label">Nama Project Type :</label>
                <input type="text" class="form-control form-control-sm" id="NAME" name="NAME" required value="<?= $p_type->NAME ?>">
                <label for="DESCRIPTION" class="col-form-label">Description:</label>
                <input type="text" class="form-control form-control-sm" id="DESCRIPTION" name="DESCRIPTION" value="<?= $p_type->DESCRIPTION ?>">
                <input type="text" name="ID" hidden value="<?= $p_type->ID ?>">
                <div class="invalid-feedback">
                  Nama tidak boleh kosong
                </div>
              </div>

  					