<?php
									
$milestone=$this->cms->getSingularData('v_g_milestone','PROJECT_TYPE_ID',$ptid_milestone);
if ($milestone) {

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
					<li>
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_milestone]" value="<?= $GetMilestone->REC_ID?>" hidden>
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][id_task]" value="<?= $GetTask->REC_ID?>" hidden>
						<input type="checkbox" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][checkbox]"> 
						<?php echo $GetTask->TASK_NAME?>
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][total_hours]" class="form-control form-control-sm" style="float: right; width: 10%;" placeholder="Total Hours"> 
						<input type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][end_date]" class="form-control form-control-sm" style="float: right; width: 20%;" placeholder="End Date"> 
						<input type="datetime-local" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][start_date]" class="form-control form-control-sm" style="float: right; width: 20%;" placeholder="Start Date"> 
						<input type="text" name="project[<?= $arr_1 ?>][<?= $arr_2 ?>][pic]" class="form-control form-control-sm" style="float: right; width: 30%;"> 
						<span style="float: right;margin-right: 5px;">PIC : </span>
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