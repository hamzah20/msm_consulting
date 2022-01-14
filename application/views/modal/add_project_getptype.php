<label for="recipient-name" class="col-form-label" style="float:left;">Milestone & Task :</label> 

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="select-all" id="select-all">
  <label class="form-check-label" style="margin-top:5px;">
    Pilih Semua
  </label>
</div>

<br>
<table style="border-left: 1px solid #d4d4d4;border-right: 1px solid #d4d4d4">
<?php
if ($milestone) {
$int=0;
$arr_1 = 0;
$arr_2 = 0;
	
	foreach ($milestone->result() as $GetMilestone) {
		$arr_1++;
		?>
		<tr style="border-top:1px solid #d4d4d4;border-bottom:1px solid #d4d4d4">
			<td colspan="3" style="padding:10px; color:orange">
				<i class="fa fa-arrow-right"> </i> <?php echo $GetMilestone->MILESTONE_NAME?>
			</td>
		</tr>
		<input type="text" name="project[<?= $arr_1 ?>][name]" value="<?= $GetMilestone->MILESTONE_NAME?>" hidden>
		<?php 
     	$task=$this->cms->getSingularData('g_task','MILESTONE_ID',$GetMilestone->REC_ID);
     	$totalTask=$task->num_rows();
     	if($totalTask>0){
   	?>
			<?php
				foreach ($task->result() as $GetTask) { $arr_2++;
			?>
			<tr id="input_<?= $int++ ?>" style="border-top:1px solid #d4d4d4;border-bottom:1px solid #d4d4d4">
				<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_milestone]" value="<?= $GetMilestone->REC_ID?>" hidden>
				<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_task]" value="<?= $GetTask->REC_ID?>" hidden>

				<td style="width: 0.7in; padding:10px";>
					<input type="checkbox" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][checkbox]" class="checkbox_task" style="float:right;"> 
				</td>

				<td style="padding:10px 0px; word-wrap: break-word">
					<div style="width: 1.8in;float:left;color:green">
						<?php echo $GetTask->TASK_NAME?>
					</div>
				</td>

				<td id="td_input" style="padding:10px 0px;color:green">

					<span style="margin-right: 5px;margin-top:5px;float:left;">PIC : </span>
					<select required name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][pic]" class="form-control form-control-sm" style=" width: 20%;float:left;" disabled>
						<option></option>
						<?php foreach ($s_user->result() as $user): ?>
						<option value="<?= $user->REC_ID ?>"><?= $user->NAME ?></option>
						<?php endforeach ?>
					</select>

					<span style="margin-right: 5px;margin-top:5px;margin-left:20px;float:left;">Start : </span>
					<input required type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][start_date]" class="form-control form-control-sm start_date" style=" width:1.9in;float:left;" placeholder="Start Date" disabled > 

					<span style="margin-right: 5px;margin-top:5px;margin-left:20px;float:left;">End : </span>
					<input required type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][end_date]" class="form-control form-control-sm end_date" style=" width:1.9in;float:left;" placeholder="End Date" disabled>

					<span style="margin-right: 5px;margin-top:5px;margin-left:20px;float:left;">Duration : </span>
					<input required type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][planned_hours_only]" class="form-control form-control-sm" style=" width: 0.5in;float:left;" placeholder="Hours" disabled> 

					<span style="margin-right: 5px;margin-top:5px;margin-left:5px;float:left;">:</span>
					<select required name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][planned_minutes_only]" class="form-control form-control-sm" style=" width: 0.7in;float:left;" disabled>
						<option value="0" disabled selected>Minutes</option>
						<option value="0">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>
			</tr>
						
					

       				<?php } ?>
		<?php } ?>
	
	<?php }



}else{
	echo "Silahkan Pilih Project Type";
}
?>
<table>
<script>
jQuery(document).ready(function($) {	

$(".start_date").change(function () {
	let parent = $(this).parent().parent().attr('id');
	$('#'+parent).children('#td_input').children('.end_date').attr('min', $(this).val() );
});

$('.checkbox_task').change(function(event){
	if (this.checked) {
		let parent = $(this).parent().parent().attr('id');
		$('#'+parent).children('#td_input').children('input[type="text"]').prop('disabled', false);
		$('#'+parent).children('#td_input').children('input[type="datetime-local"]').prop('disabled', false);
		$('#'+parent).children('#td_input').children('select').prop('disabled', false);
	}else{
		let parent = $(this).parent().parent().attr('id');
		$('#'+parent).children('#td_input').children('input[type="text"]').prop('disabled', true);
		$('#'+parent).children('#td_input').children('input[type="datetime-local"]').prop('disabled', true);
		$('#'+parent).children('#td_input').children('select').prop('disabled', true);
	}
});

	$('#select-all').change(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $(':checkbox').each(function() {
	            this.checked = true;

	            let parent = $(this).parent().parent().attr('id');
							$('#'+parent).children('#td_input').children('input[type="text"]').prop('disabled', false);
							$('#'+parent).children('#td_input').children('input[type="datetime-local"]').prop('disabled', false);
							$('#'+parent).children('#td_input').children('select').prop('disabled', false);
	            
	        });
	    } else {
	        $(':checkbox').each(function() {
	            this.checked = false; 

	            let parent = $(this).parent().parent().attr('id');
							$('#'+parent).children('#td_input').children('input[type="text"]').prop('disabled', true);
							$('#'+parent).children('#td_input').children('input[type="datetime-local"]').prop('disabled', true);
							$('#'+parent).children('#td_input').children('select').prop('disabled', true);  
	        });
	    }
	}); 

});
</script>