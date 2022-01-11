<?php 
		$id_project = $this->input->get('id_project');
	?>
<?php if (null == $this->input->get('id_task')) {?>
	
	<!-- https://pastebin.com/YvYUGyW8 -->


	<h6>Dokumen Task Untuk Project : <u> <?= $g_project->row()->PROJECT_NAME ?></u></h6>
	<br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Milestone Name</th>
				<th scope="col">Task Name</th>
				<th scope="col">File Name</th>
				<th scope="col">Jenis Dokumen</th>
				<th scope="col">Uploader</th>
				<th scope="col">Upload Date</th>
				<th scope="col">Action</th>
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
				<td>
					
				</td>
			</tr>

			<?php foreach ($dokumen_list_task->result() as $dokumen_task){
				$task = $this->cms->getSingularData('g_task', 'REC_ID', $dokumen_task->TASK_ID);
				$files = $this->cms->getSingularDataTriple('v_g_project_doc', 'PROJECT_ID', 'MILESTONE_ID','TASK_ID',$id_project ,$dokumen_milestone->MILESTONE_ID,$dokumen_task->TASK_ID);
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
							<?= $file->NAMA_JENIS_DOKUMEN ?>
						</td>
						<td>
							<?= $file->USER_NAME ?>
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

	$dokumen_list_task = $this->cms->getSingularDataTriple('v_g_project_doc', 'PROJECT_ID', 'MILESTONE_ID' ,'TASK_ID', $id_project, $this->input->get('id_milestone'), $this->input->get('id_task'));
	$g_task = $this->cms->getSingularData('g_task', 'REC_ID', $this->input->get('id_task'));
	$g_project_detail = $this->cms->getSingularDataTriple('v_g_project_detail', 'PROJECT_ID', 'MILESTONE_ID' ,'TASK_ID', $id_project, $this->input->get('id_milestone'), $this->input->get('id_task'));
	$status_project_detail = $g_project_detail->row()->STATUS;
 ?>
	
	<table class="table table-striped">
        <tr>
            <td>PIC</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td style="width:5in;"><?= $g_project_detail->row()->PIC ?></td>
        </tr>
        <tr>
            <td>CUSTOMER</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><?= $g_project_detail->row()->COMPANY_NAME ?></td>
        </tr>
        <tr>
            <td>PROJECT</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><?= $g_project_detail->row()->PROJECT_NAME ?></td>
        </tr>
        <tr>
            <td>TASK</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><?= $g_project_detail->row()->TASK_NAME ?></td>
        </tr>
        <tr>
            <td>START & END DATE</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><span class='badge badge-primary' style='font-size: 10px;'><?= $g_project_detail->row()->START_DATE ?></span> - <span class='badge badge-danger' style='font-size: 10px;'><?= $g_project_detail->row()->END_DATE ?></span></td>
        </tr>
        <tr>
            <td>PLANNED & ACTUAL HOURS</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td><span class='badge badge-primary' style='font-size: 10px;'><?= $g_project_detail->row()->TOTAL_HOURS ?> Hours</span> - <span class='badge badge-danger' style='font-size: 10px;'><?= $g_project_detail->row()->ACTUAL_HOURS ?> Hours</span></td>
        </tr>
        <!-- <tr>
            <td>RELATED DOC</td>
            <td>&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td>
                <input type="file" name="uploadDoc" disabled>
            </td>
        </tr> -->
    </table>

	<h6>Dokumen Task <u><?= $g_task->row()->TASK_NAME ?></u></h6>
	<br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">File Name</th>
				<th scope="col">Jenis Dokumen</th>
				<th scope="col">Uploader</th>
				<th scope="col">Upload Date</th>
				<th scope="col">Action</th>
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
					<?= $dokumen_task->NAMA_JENIS_DOKUMEN ?>
				</td>
				<td>
					<?= $dokumen_task->USER_NAME ?>
				</td>
				<td>
					<?= $dokumen_task->UPLOAD_DATE ?>
				</td>
				<td>
					<a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
	                  <i class="fa fa-download"></i>
	                </a>
	                <?php if ($status_project_detail == 'ONPROGRESS' || $status_project_detail == 'REVISE'): ?>
	                	<a class="btn btn-sm btn-danger hapus" data-toggle="tooltip" data-placement="top" data-recid="<?= $dokumen_task->REC_ID; ?>" title="Hapus File" href="#" role="button">
							<i class="fa fa-trash"></i>
                    	</a>
	                <?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>

<script>

jQuery(document).ready(function($) {


	$(document).on('click', '.hapus', function(event) {

      let REC_ID = $(this).data('recid');

      Swal.fire({
        title: 'Hapus File',
        text: 'Apakah Anda yakin ingin menghapus file ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'General/Project/deleteFile', {
            REC_ID:REC_ID
          }, function(resp) {
            if (resp.code == 200) {
              Swal.fire({
                title: 'Proses Berhasil',
                text: 'File telah dihapus',
                icon: 'success',
                confirmButtonText: 'Ok'
              }).then((result) => {
                location.reload();
              });
            } else {

              Swal.fire({
                title: 'Proses Gagal',
                text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
                icon: 'error',
                showCancelButton: false,
                confirmButtonText: 'Tutup'
              });
            }
          });
        }
      });
    });


});
	
</script>


<?php } ?>