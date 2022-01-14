<!-- Header -->
<?php $this->load->view('templates_cms/header'); ?>
<!-- End of Header -->
<!-- Sidebar -->
<?php $this->load->view('templates_cms/sidebar'); ?>
<!-- End of Sidebar -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
  <!-- Topbar-->
  <?php $this->load->view('templates_cms/topbar'); ?>
  <!-- End of Topbar -->
  <!-- Header-->
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Milestone & Task</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
           
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="content mt-3">
   <div class="card">
        <div class="card-header">
            <h4>List Milestone & Task</h4>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4">
              <label>Nama Project Type</label>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-8">
              <form action="milestone" method="GET" id="form_projecttype">
                
             
              <select class="form-control form-control-sm" id="slc_projecttype" name="slc_projecttype">
                  <option value="jhpyxebo5n" <?php if($slc_project==""){ echo "selected"; }else{}?>>-- select project type --</option>
                    <?php
                foreach($project->result() as $projecttype){
                     ?>
                    <option value="<?php echo $projecttype->ID?>" <?php if($slc_project==$projecttype->ID){ echo"selected"; }else{}?>><?php echo $projecttype->NAME?></option>
                    <?php
                }
               ?>
              </select>
               </form>
            </div>
          </div>
          <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addMilestone"><i class="fa fa-plus"></i> Milestone</a>
           <table class="table"  id="example" class="display" style="margin-top: 10px;" >
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">PROJECT TYPE</th>
                  <th scope="col">MILESTONE</th>
                  <th scope="col">TASK</th>
                  <th scope="col">ACTION</th>
                
                </tr>
              </thead>
              <tbody>
               <?php
                $i=1;
                foreach ($milestone->result() as $GetMilestone) {
                  ?>
                    <tr>
                      <td><?php echo $i?></td>
                      <td><?php echo $GetMilestone->PROJECTTYPE_NAME?></td>
                      <td><?php echo $GetMilestone->MILESTONE_NAME?></td>
                      <td>
                        <?php 
                         $task=$this->cms->getSingularData('g_task','MILESTONE_ID',$GetMilestone->REC_ID);
                         // echo $task->num_rows();
                        ?>
                         <table class="table table-dashboard">
                             <?php

                                foreach ($task->result() as $GetTask) {
                                  ?>
                                  <tr>
                                    <td><?php echo $GetTask->TASK_NAME?></td>
                                    <td>
                                      <a href="#" class="edit-task" data-toggle="modal" data-target="#editTask" data-id="<?= $GetTask->REC_ID; ?>" title="Edit" href="#" role="button"><i class="fa fa-pencil"></i></a>
                                      <a href="#" class="hapus_tsk" data-toggle="tooltip" data-placement="top" data-id="<?= $GetTask->REC_ID; ?>" title="Hapus" href="#" role="button"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php
                                }
                              ?>
                              <tr>
                                <td> <a class="btn btn-sm btn-primary identifyingClass" href="#" role="button" data-toggle="modal" data-target="#addTask" data-id="<?php echo $GetMilestone->REC_ID?>" data-name="<?php echo $GetMilestone->MILESTONE_NAME?>"><i class="fa fa-plus"></i> Task</a></td>
                              </tr>
                         </table>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#editMilestone" data-id="<?= $GetMilestone->REC_ID; ?>" title="Edit" href="#" role="button">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-sm btn-danger hapus_ms" data-toggle="tooltip" data-placement="top" data-id="<?= $GetMilestone->REC_ID; ?>" title="Hapus" href="#" role="button">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                 $i++;
                }
               ?>
              </tbody>
            </table>
        </div>
    </div>
     <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_milestone_task'); ?>
    <!-- End of Add Modal Perusahaan -->
  </div>
  <!-- End of Content -->
</div>

<div class="modal fade" id="editMilestone" tabindex="-1" aria-labelledby="Edit Milestone" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" action="<?= base_url('General/Milestone/editMilestone'); ?>" method="POST" novalidate>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Edit Milestone</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-edit">
              Loading
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
</div>

<div class="modal fade" id="editTask" tabindex="-1" aria-labelledby="Edit Task" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" action="<?= base_url('General/Milestone/editTask'); ?>" method="POST" novalidate>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Edit Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-edit-task">
              Loading
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

   $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

   $(document).on('click', '.edit', function(event){


    var button = $(event.relatedTarget);
          var id = $(this).data('id');
          var getAccount = '<?php echo base_url('General/Milestone/getMilestone?id='); ?>';

          $('.modal-edit').load(getAccount + id, function() {
            
          });


   });

   $(document).on('click', '.edit-task', function(event){


    var button = $(event.relatedTarget);
          var id = $(this).data('id');
          var get = '<?php echo base_url('General/Milestone/getTask?id='); ?>';
          var slc_project = '<?php echo $slc_project; ?>';

          $('.modal-edit-task').load(get + id + '&slc_project=' + slc_project, function() {
            
          });


   });
  
  $(document).on('click', '.hapus_ms', function(event) {

      let ID = $(this).data('id');

      Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'General/Milestone/deleteMilestone', {
            REC_ID:ID
          }, function(resp) {
            if (resp.code == 200) {
              Swal.fire({
                title: 'Proses Berhasil',
                text: 'Data telah dihapus',
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



  $(document).on('click', '.hapus_tsk', function(event) {

      let ID = $(this).data('id');

      Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'General/Milestone/deleteTask', {
            REC_ID:ID
          }, function(resp) {
            if (resp.code == 200) {
              Swal.fire({
                title: 'Proses Berhasil',
                text: 'Data telah dihapus',
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

<script type="text/javascript">
   jQuery(document).ready(function($) {
    "use strict";
      $('MilestoneTable').DataTable();
       $(".identifyingClass").click(function () {
            var my_id_value = $(this).data('id');
             document.getElementById('hiddenValue').value=my_id_value;
             var global_message = $(this).data('name');;
            document.getElementById("LabelMilestone").innerText = 'Milestone : '+global_message;
        });

      $("#slc_projecttype").change(function () {
        if ($(this).val() != 'jhpyxebo5n') {
          document.getElementById('form_projecttype').submit();
        }else{
          let url = window.location.href;
          $(location).prop('href', url.split('?')[0] );
        };
      });

   });

</script>
<?php if ($this->session->userdata('query') == 'error') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Gagal',
        text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
        icon: 'error',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });

    });
  </script>
<?php
   $this->session->set_userdata('query', '');
 } ?>
<?php if ($this->session->userdata('query') == 'success_milestone') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Berhasil',
        text: 'Proses Berhasil',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php 
  $this->session->set_userdata('query', '');
} ?>


<?php if ($this->session->userdata('query') == 'success_task') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Berhasil',
        text: 'Proses Berhasil',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php 
  $this->session->set_userdata('query', '');
} ?>
<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->