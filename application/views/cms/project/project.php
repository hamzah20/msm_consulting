<!-- https://pastebin.com/FSMEzjM6 Kodingan template -->
<!--Header -->
<?php $this->load->view('templates_cms/header'); ?>
<!-- End of Header -->
<!-- Sidebar -->
<?php $this->load->view('templates_cms/sidebar'); ?>
<!-- End of Sidebar -->
<!-- Right Panel -->
<style type="text/css">
  .list-group-item{
  color:orange;
  }
  .list-group-item ul{
  margin-top: 10px;
  margin-right: -15px;
  margin-bottom: -10px;
  color:green;
  }
  .list-group-item li{
  padding: 10px 15px 10px 3em;
  border-top: 1px solid #ddd;
  }
  .list-group-item li:before{
  content: '';
  display: block;
  position: absolute;
  left: 0;
  width: 100%;
  height: 1px;
  margin-top: -11px;
  background: #ddd;
  }
</style>
<div id="right-panel" class="right-panel">
  <!-- Topbar-->
  <?php $this->load->view('templates_cms/topbar'); ?>
  <!-- End of Topbar -->
  <!-- Header-->
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Project </h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Project </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-header">
        <h4>List Project </h4>
      </div>
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addProject"><i class="fa fa-plus"></i> Project </a>
        <table class="table table-striped" style="margin-top: 10px;width: 1200px;">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">PROJECT INFO</th>
              <th scope="col">CUSTOMER</th>
              <th scope="col">STATUS</th>
              <th scope="col">START DATE</th>
              <th scope="col">END DATE</th>
              <th scope="col">DURATION</th>
            </tr>
          </thead>
          <tbody>




          <?php foreach ($project_list->result() as $plist): 
            $project_id = $plist->PROJECT_ID;
            $project_milestone = $this->cms->getMilestoneProject('g_project_detail', $project_id);
            ?>
            <tr>
              <td>1</td>
              <td>
                <label style="font-weight: bold;font-size: 14px;"><?= $plist->PROJECT_NAME ?></label><br>
                <label style="font-size: 12px;">Project OWNER : AJI PRATAMA</label><br>
              </td>
              <td>
                <label style="font-weight: bold;font-size: 14px;">INCUBESOLUTIONS</label><br>
              </td>
              <td>
                <h6><span class="badge badge-success">Check Inventory & COGS</span></h6>
              </td>
              <td>
                <label style="font-size:12px;" class="badge badge-primary"><?= $plist->START_DATE ?></label>
              </td>
              <td>
                <label style="font-size:12px;" class="badge badge-danger"><?= $plist->END_DATE ?></label>
              </td>
              <td>
                <label style="font-size:12px;font-weight: bold;" >30 Days</label>
              </td>
            </tr>


            <tr>

              <td colspan=2>
                <ul class="list-group">


                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $milestone_data = $this->cms->getSingularData('g_milestone', 'REC_ID', $proj_milestone->MILESTONE_ID);
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item">
                      <i class="fa fa-arrow-right"> </i> <?= $milestone_data->row()->MILESTONE_NAME  ?>
                      <ul class="list-unstyled">
                        <?php foreach ($project_task->result() as $proj_task) {
                          $task_data = $this->cms->getSingularData('g_task', 'REC_ID', $proj_task->TASK_ID);
                         ?>
                          <li><i class="fa fa-arrow-right"> </i><?= $task_data->row()->TASK_NAME ?></li>
                        <?php } ?>
                      </ul>
                    </li>

                  <?php } ?>

                </ul>
              </td>


              <td>


                <ul class="list-group">
                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item" style="color:#040404; font-weight: bold;">
                      PIC
                      <ul class="list-unstyled" style="color:#807c7c;">

                        <?php foreach ($project_task->result() as $proj_task) {?>
                          <li><?= $proj_task->PIC ?></li>
                        <?php } ?>

                      </ul>
                    </li>

                  <?php } ?>

                </ul>
              </td>


              <td>
                <ul class="list-group">
                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item" style="color:#040404; font-weight: bold;">
                      Status
                      <ul class="list-unstyled" style="color:#807c7c;">
                        <?php foreach ($project_task->result() as $proj_task) {?>
                          <!-- Logic Status Belum -->
                          <li><span class="badge badge-success" style="width: 50%;font-size: 12px;">DONE</span></li>
                        <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                </ul>
              </td>


              <td>
                <ul class="list-group">
                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item" style="color:#040404; font-weight: bold;">
                      Start Date
                      <ul class="list-unstyled" style="color:#807c7c;">
                        <?php foreach ($project_task->result() as $proj_task) {?>
                          <li><?= $proj_task->START_DATE ?></li>
                        <?php } ?>
                      </ul>
                    </li>

                  <?php } ?>
                </ul>
              </td>


              <td>
                <ul class="list-group">
                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item" style="color:#040404; font-weight: bold;">
                      End Date
                      <ul class="list-unstyled" style="color:#807c7c;">
                        <?php foreach ($project_task->result() as $proj_task) {?>
                          <li><?= $proj_task->END_DATE ?></li>
                        <?php } ?>
                      </ul>
                    </li>

                  <?php } ?>
                </ul>
              </td>


              <td>
                <ul class="list-group">
                  <?php foreach ($project_milestone->result() as $proj_milestone) {
                    $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                  ?>

                    <li class="list-group-item" style="color:#040404; font-weight: bold;">
                      Duration
                      <ul class="list-unstyled" style="color:#807c7c;">
                        <?php foreach ($project_task->result() as $proj_task) {?>
                          <li>1 Day(s)</li>
                        <?php } ?>
                      </ul>
                    </li>

                  <?php } ?>
                </ul>
              </td>

            </tr>
          <?php endforeach ?>


          </tbody>
        </table>
      </div>
    </div>
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_project'); ?>
    <!-- End of Add Modal Perusahaan -->
  </div>
  <!-- End of Content -->
</div>
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
<?php if ($this->session->userdata('query') == 'success') { ?>
<script>
  jQuery(document).ready(function($) {
  
    "use strict";
  
    Swal.fire({
      title: 'Proses Berhasil',
      text: 'Data Project Type berhasil ditambahkan',
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
<!-- End of Footer