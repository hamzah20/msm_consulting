<div class="modal fade " id="addProject" tabindex="-1" aria-labelledby="addProject" aria-hidden="true" >
	<div class="modal-dialog modal-lg" style="padding-left: 0px; width: 1200px;">
		<form class="needs-validation" id="formAddProjecttype" action="<?= base_url('General/Project/AddProject'); ?>" method="POST" novalidate>
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
						<input type="text" class="form-control form-control-sm" id="txt_projecttype" name="project_name" required>
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Start Date :</label>
						<input type="date" class="form-control form-control-sm" id="txt_projecttype" name="project_start" required>
						<div class="invalid-feedback">
							Date tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">End Date :</label>
						<input type="date" class="form-control form-control-sm" id="txt_projecttype" name="project_end" required>
						<div class="invalid-feedback">
							Date tidak boleh kosong
						</div>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Project Type :</label>
						<select class="form-control form-control-sm" id="ptid_select" name="project_type_id">
							<option value="0"></option>
							<?php
								foreach($project_type->result() as $GetProject){
									?>
									<option class="ptid_l" data-id="<?= $GetProject->ID; ?>" value="<?= $GetProject->ID?>" ><?= $GetProject->NAME?></option>
									<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Milestone & Task :</label>
							 <ul class="list-group loadptype">
							 	Silahkan Pilih Project Type
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

<script>
	jQuery(document).ready(function($) {
		$("#ptid_select").change(function () {
			var button = $(event.relatedTarget);
			var id = $('option:selected',this).data("id");
			var getAccount = '<?php echo base_url('General/Project/getPtype?ptid_milestone='); ?>';

			$('.loadptype').load(getAccount + id, function() {});


   		});
	});
</script>