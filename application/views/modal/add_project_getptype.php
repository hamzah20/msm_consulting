<label for="recipient-name" class="col-form-label" style="float:left;">Milestone & Task :</label> 

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="select-all" id="select-all">
  <label class="form-check-label" style="margin-top:5px;">
    Pilih Semua
  </label>
</div>

<br>

<?php
if ($milestone) {
$int=0;
$arr_1 = 0;
$arr_2 = 0;
	
	foreach ($milestone->result() as $GetMilestone) {
		$arr_1++;
		?>
		<li class="list-group-item">
			<i class="fa fa-arrow-right"> </i> <?php echo $GetMilestone->MILESTONE_NAME?>
			<input type="text" name="project[<?= $arr_1 ?>][name]" value="<?= $GetMilestone->MILESTONE_NAME?>" hidden>
       <?php 
       	$task=$this->cms->getSingularData('g_task','MILESTONE_ID',$GetMilestone->REC_ID);
       	$totalTask=$task->num_rows();
       	if($totalTask>0){
       		?>
       		<ul class="list-unstyled">
       			<?php
       			foreach ($task->result() as $GetTask) {
       				$arr_2++;

       				?>
					<li id="input_<?= $int++ ?>" >
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_milestone]" value="<?= $GetMilestone->REC_ID?>" hidden>
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_task]" value="<?= $GetTask->REC_ID?>" hidden>
						<input type="checkbox" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][checkbox]" class="checkbox_task"> 
						<?php echo $GetTask->TASK_NAME?>

						<select required name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][planned_minutes_only]" class="form-control form-control-sm" style="float: right; width: 0.7in;" disabled>
							<option value="0" disabled selected>Minutes</option>
							<option value="0">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>


						<span style="float: right;margin-right: 5px;margin-top:5px;margin-left:5px;">:</span>
						
						<input required type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][planned_hours_only]" class="form-control form-control-sm" style="float: right; width: 0.5in;" placeholder="Hours" disabled> 
						<span style="float: right;margin-right: 5px;margin-top:5px;margin-left:20px;">Duration : </span>
						
						<input required type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][end_date]" class="form-control form-control-sm end_date" style="float: right; width:1.9in;" placeholder="End Date" disabled> 
						<span style="float: right;margin-right: 5px;margin-top:5px;margin-left:20px;">End : </span>

						<input required type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][start_date]" class="form-control form-control-sm start_date" style="float: right; width:1.9in;" placeholder="Start Date" disabled > 
						<!-- <input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][pic]" class="form-control form-control-sm" style="float: right; width: 30%;" > -->
						<span style="float: right;margin-right: 5px;margin-top:5px;margin-left:20px;">Start : </span>

						<select required name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][pic]" class="form-control form-control-sm" style="float: right; width: 20%;" disabled>
							<option></option>
							<?php foreach ($s_user->result() as $user): ?>
								<option value="<?= $user->REC_ID ?>"><?= $user->NAME ?></option>
							<?php endforeach ?>
						</select>
						<span style="float: right;margin-right: 5px;margin-top:5px">PIC : </span>
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
}else{
	echo "Silahkan Pilih Project Type";
}
?>

<script>
jQuery(document).ready(function($) {	

$(".start_date").change(function () {
	let parent = $(this).parent().attr('id');
	$('#'+parent).children('.end_date').attr('min', $(this).val() );
});

$('.checkbox_task').change(function(event){
	if (this.checked) {
		let parent = $(this).parent().attr('id');
		$('#'+parent).children('input[type="text"]').prop('disabled', false);
		$('#'+parent).children('input[type="datetime-local"]').prop('disabled', false);
		$('#'+parent).children('select').prop('disabled', false);
	}else{
		let parent = $(this).parent().attr('id');
		$('#'+parent).children('input[type="text"]').prop('disabled', true);
		$('#'+parent).children('input[type="datetime-local"]').prop('disabled', true);
		$('#'+parent).children('select').prop('disabled', true);
	}
});

	$('#select-all').change(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $(':checkbox').each(function() {
	            this.checked = true;

	            let parent = $(this).parent().attr('id');
							$('#'+parent).children('input[type="text"]').prop('disabled', false);
							$('#'+parent).children('input[type="datetime-local"]').prop('disabled', false);
							$('#'+parent).children('select').prop('disabled', false);
	            
	        });
	    } else {
	        $(':checkbox').each(function() {
	            this.checked = false; 

	            let parent = $(this).parent().attr('id');
							$('#'+parent).children('input[type="text"]').prop('disabled', true);
							$('#'+parent).children('input[type="datetime-local"]').prop('disabled', true);
							$('#'+parent).children('select').prop('disabled', true);  
	        });
	    }
	}); 

});
</script>