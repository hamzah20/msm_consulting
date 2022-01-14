<div class="modal fade" id="addMilestone" tabindex="-1" aria-labelledby="addMilstone" aria-hidden="true">
	<div class="modal-dialog">
	<?php
		if($slc_project<>""){
		?>
		<form class="needs-validation" id="formAddMilestone" action="<?= base_url('General/Milestone/addMilestone'); ?>" method="POST" novalidate>
			<input type="hidden" name="txt_project_id" value="<?php echo $slc_project?>">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addMilstone">Tambah Milestone</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<?php
						$type=$this->cms->getSingularData('gm_project_type','ID',$slc_project);
						foreach ($type->result() as $key);
					?>
					<h6 class="modal-title" id="addMilstone">Project Type : <?php echo $key->NAME?></h6>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nama Milestone :</label>
						<input type="text" class="form-control form-control-sm" id="txt_milestone" name="txt_milestone" required>
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
		<?php	
		}else{
			?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addMilstone">Tambah Milestone</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Please Select One Project Type!!

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
				</div>
			</div>
			<?php
		}
	?>
	</div>
</div>
<!--  modal task -->
<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTask" aria-hidden="true">
	<div class="modal-dialog">
		<form class="needs-validation" id="formAddMilestone" action="<?= base_url('General/Milestone/addTask'); ?>" method="POST" novalidate>
			<input type="hidden" name="txt_milestone_id" id="hiddenValue">
			<input type="hidden" name="txt_project_id" value="<?php echo $slc_project?>">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addTask">Tambah task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6 class="modal-title" id="LabelMilestone"></h6>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nama Task :</label>
						<input type="text" class="form-control form-control-sm" id="txt_task" name="txt_task" required>
						<input type="text" class="form-control form-control-sm" name="slc_projecttype" required hidden value="<?php echo @$project_id ?>">
						<div class="invalid-feedback">
							Nama tidak boleh kosong
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





