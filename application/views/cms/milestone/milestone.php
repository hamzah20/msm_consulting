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
              <form action="milestone" method="POST" id="form_projecttype">
                
             
              <select class="form-control form-control-sm" onchange="ChangeProject()" id="slc_projecttype" name="slc_projecttype">
                  <option value="" <?php if($slc_project==""){ echo "selected"; }else{}?>>-- select project type --</option>
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
          <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addMilstone"><i class="fa fa-plus"></i> Milestone</a>
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
                                    <td><a href="#" ><i class="fa fa-trash"></i></a></td>
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
                        <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a> <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <?php $this->load->view('modal/add_miltonetask'); ?>
    <!-- End of Add Modal Perusahaan -->
  </div>
  <!-- End of Content -->
</div>
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
   });
  function ChangeProject(){
    document.getElementById('form_projecttype').submit();
    
  }
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
        text: 'Data Milestone  berhasil ditambahkan',
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
        text: 'Data Task  berhasil ditambahkan',
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