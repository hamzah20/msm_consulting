<div class="modal fade " id="addProject" tabindex="-1" aria-labelledby="addProject" aria-hidden="true" >
	<div class="modal-dialog modal-lg" style="padding-left: 0px; width: 1200px;">
		<form class="needs-validation" id="formAddProjecttype" action="<?= base_url('General/ProjectType/addProjecttype'); ?>" method="POST" novalidate>
			<div class="modal-content" style="width: 1200px; margin-left: -150px;">
				<div class="modal-header">
					<h5 class="modal-title" id="addProject">Tambah Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
					<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nama Project :</label>
						<input type="text" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required>
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Start Date :</label>
						<input type="date" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required>
						<div class="invalid-feedback">
							Date tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">End Date :</label>
						<input type="date" class="form-control form-control-sm" id="txt_projecttype" name="txt_projecttype" required>
						<div class="invalid-feedback">
							Date tidak boleh kosong
						</div>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Project Type :</label>
						<select class="form-control form-control-sm">
							<?php
								foreach($project->result() as $GetProject){
									?>
									<option><?php echo $GetProject->NAME?></option>
									<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Milestone & Task :</label>
							 <ul class="list-group">
							 	<?php
							 		$milestone=$this->cms->getSingularData('v_g_milestone','PROJECT_TYPE_ID','1');
							 		foreach ($milestone->result() as $GetMilestone) {
							 			?>
							 			<li class="list-group-item">
					                       <i class="fa fa-arrow-right"> </i> <?php echo $GetMilestone->MILESTONE_NAME?>
					                       <?php 
					                       	$task=$this->cms->getSingularData('g_task','MILESTONE_ID',$GetMilestone->REC_ID);
					                       	$totalTask=$task->num_rows();
					                       	if($totalTask>0){
					                       		?>
					                       		<ul class="list-unstyled">
					                       			<?php
					                       			foreach ($task->result() as $GetTask) {
					                       				?>
						                        		  <li><input type="checkbox" name=""> <?php echo $GetTask->TASK_NAME?>
						                        		  <input type="text" name="" class="form-control form-control-sm" style="float: right; width: 10%;" placeholder="Total Hours"> 
						                        		   <input type="datetime-local" name="" class="form-control form-control-sm" style="float: right; width: 20%;" placeholder="End Date"> 
						                        		  <input type="datetime-local" name="" class="form-control form-control-sm" style="float: right; width: 20%;" placeholder="Start Date"> 
						                        		   <input type="text" name="" class="form-control form-control-sm" style="float: right; width: 30%;"> <span style="float: right;margin-right: 5px;">PIC : </span>
						                        		   
						                        		  
						                        		</li>
					                       				<?php
					                       			}
					                       			?>
					                       		</ul>
					                       		<?php
					                       	}
					                       ?>
					                      </li>
							 			<?php
							 		}
							 	?>
			                    </ul>
					
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