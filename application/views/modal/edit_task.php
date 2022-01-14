<?php foreach($g_task->result() as $task) ?>


  			<div class="form-group">
  				<input type="hidden" name="id_task" value="<?= $task->REC_ID ?>">
  				<input type="hidden" name="id_project" value="<?= $slc_project ?>">
                <label for="txt_milstone-name" class="col-form-label">Nama Task :</label>
                <input type="text" class="form-control form-control-sm" id="txt_task" name="txt_task" required value="<?= $task->TASK_NAME ?>">
                <div class="invalid-feedback">
                  tidak boleh kosong
                </div>
            </div>