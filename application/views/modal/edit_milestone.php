<?php foreach($g_milestone->result() as $milestone) ?>

              <div class="form-group">
                <label for="project_type" class="col-form-label">Project Type</label>
                <select name="txt_project_id" class="form-control form-control-sm">
                  <?php foreach ($gm_project_type->result() as $ptype) { 
                    if ($milestone->PROJECT_TYPE_ID == $ptype->ID) {
                      $selected = 'selected';
                    }else{
                      $selected = '';
                    }
                    ?>
                    <option value="<?= $ptype->ID ?>" <?= $selected ?> ><?= $ptype->NAME ?></option>  
                  <?php } ?>
                </select>
                <div class="invalid-feedback">
                  tidak boleh kosong
                </div>
              </div>
  						<div class="form-group">
                <label for="txt_milstone-name" class="col-form-label">Nama Milestone :</label>
                <input type="text" class="form-control form-control-sm" id="txt_milestone" name="txt_milestone" required value="<?= $milestone->MILESTONE_NAME ?>">
                <div class="invalid-feedback">
                  tidak boleh kosong
                </div>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description:</label>
                <input type="text" class="form-control form-control-sm" id="txt_description" name="txt_description" value="<?= $milestone->DESCRIPTION ?>" >
                <input type="text" class="form-control form-control-sm" id="txt_description" name="REC_ID" value="<?= $milestone->REC_ID ?>" hidden>
              </div>