<?php 
		$id_project = $this->input->get('id_project');
	?>
<?php if (null == $this->input->get('id_task')) {?>
	
	<h6>Dokumen Project <u><?= $g_project->row()->PROJECT_NAME ?></u></h5>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Nama File</th>
				<th scope="col">Tanggal Upload</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<?php 
		$no = 1;
		foreach ($dokumen_list_project->result() as $dokumen_project):
			$addr = $dokumen_project->FILE_ADDRESS
		 ?>
			<tr>
				<td>
					<?php echo $no;$no++; ?>
				</td>
				<td>
					<?= $dokumen_project->FILE_NAME ?>
				</td>
				<td>
					<?= $dokumen_project->UPLOAD_DATE ?>
				</td>
				<td>
					<a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
	                  <i class="fa fa-download"></i>
	                </a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>


	<h6>Dokumen Task Untuk <u>Project <?= $g_project->row()->PROJECT_NAME ?></u></h5>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Nama Milestone</th>
				<th scope="col">Nama Task</th>
				<th scope="col">Nama File</th>
				<th scope="col">Tanggal Upload</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<?php 
		$no = 1;
		foreach ($dokumen_list_milestone->result() as $dokumen_milestone):
		$milestone = $this->cms->getSingularData('g_milestone', 'REC_ID', $dokumen_milestone->MILESTONE_ID);
		$dokumen_list_task = $this->cms->getSingularDataDetailTask('v_g_project_doc', 'PROJECT_ID', 'MILESTONE_ID', $id_project, $dokumen_milestone->MILESTONE_ID);
		 ?>
			<tr>
				<td>
					<?= $milestone->row()->MILESTONE_NAME ?>
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>

			<?php foreach ($dokumen_list_task->result() as $dokumen_task){
				$task = $this->cms->getSingularData('g_task', 'REC_ID', $dokumen_task->TASK_ID);
				$files = $this->cms->getSingularDataTriple('g_project_doc', 'PROJECT_ID', 'MILESTONE_ID','TASK_ID',$id_project ,$dokumen_milestone->MILESTONE_ID,$dokumen_task->TASK_ID);
			 ?>
				<tr>
					<td>
						
					</td>
					<td>
						<?= $task->row()->TASK_NAME ?>
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
				</tr>

				<?php foreach ($files->result() as $file){
				$addr=$file->FILE_ADDRESS;
				 ?>
					<tr>
						<td>
							
						</td>
						<td>
							
						</td>
						<td>
							<?= $file->FILE_NAME ?>
						</td>
						<td>
							<?= $file->UPLOAD_DATE ?>
						</td>
						<td>
							<a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
			                  <i class="fa fa-download"></i>
			                </a>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
		<?php endforeach ?>
	</table>
<?php }else{

	$dokumen_list_task = $this->cms->getSingularDataTriple('g_project_doc', 'PROJECT_ID', 'MILESTONE_ID' ,'TASK_ID', $id_project, $this->input->get('id_milestone'), $this->input->get('id_task'));
	$g_task = $this->cms->getSingularData('g_task', 'REC_ID', $this->input->get('id_task'));
 ?>
	
	<h6>Dokumen Task <u><?= $g_task->row()->TASK_NAME ?></u></h5>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Nama File</th>
				<th scope="col">Tanggal Upload</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<?php 
		$no = 1;
		foreach ($dokumen_list_task->result() as $dokumen_task):
			$addr = $dokumen_task->FILE_ADDRESS
		 ?>
			<tr>
				<td>
					<?php echo $no;$no++; ?>
				</td>
				<td>
					<?= $dokumen_task->FILE_NAME ?>
				</td>
				<td>
					<?= $dokumen_task->UPLOAD_DATE ?>
				</td>
				<td>
					<a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
	                  <i class="fa fa-download"></i>
	                </a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>


<?php } ?>