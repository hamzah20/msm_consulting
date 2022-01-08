<div class="modal fade " id="addProject" tabindex="-1" aria-labelledby="addProject" aria-hidden="true" >
	<div class="modal-dialog modal-lg" style="padding-left: 0px; width: 1200px;">
		<form class="needs-validation" id="formAddProjecttype" action="<?= base_url('General/Project/AddProject'); ?>" method="POST">
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
						<input type="text" class="form-control form-control-sm" name="project_name" required>
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>

					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nama Customer :</label>
						<input type="text" class="form-control form-control-sm" name="company_name" id="company_name" required>
						<input type="hidden" name="companyID" id="companyID">
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Start Date :</label>
						<input type="date" class="form-control form-control-sm" name="project_start" id="project_start" required>
						<div class="invalid-feedback">
							Date tidak boleh kosong
						</div>
					</div>
				
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">End Date :</label>
						<input type="date" class="form-control form-control-sm" name="project_end" id="project_end" required >
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



<script src="<?= base_url('assets/autocomplete/jquery.autocomplete.js'); ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/autocomplete/autocomplete.css'); ?>">
<script>
	jQuery(document).ready(function($) {

		$("#project_start").change(function () {
			$('#project_end').attr('min',$(this).val());

   		});
		
		//1. Nampilin semua nama perusahaan dari DB
	    var companies = [];

	    $.get(baseUrl + 'Middleware/API/getAllCompany', function(resp) {

	      $.each(resp.data, function(_index, value) {
	        let ctgData;

	        ctgData = {
	          value: value.COMPANY_NAME,
	          data: value.COMPANY_ID
	        };

	        companies.push(ctgData);
	      });
	    });
	    //EoL 1

	    //2. Autocomplete buat Nama Perusahaan
	    $('#company_name').autocomplete({
	      lookup: companies,
	      onSelect: function(suggestion) {
	        console.log(suggestion);

	        $('#companyID').val(suggestion.data);
	      }
	    });
	    //EoL 2



		$("#ptid_select").change(function () {
			var button = $(event.relatedTarget);
			var id = $('option:selected',this).data("id");
			var getAccount = '<?php echo base_url('General/Project/getPtype?ptid_milestone='); ?>';

			$('.loadptype').load(getAccount + id, function() {});


   		});
	});
</script>