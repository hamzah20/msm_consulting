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
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addProject">
          <i class="fa fa-plus"></i> 
          Project
        </a>
        <table class="table" style="margin-top: 10px;width: 1200px;">
          <thead>
            <tr>
              <th scope="col" style="width:0.2in">NO</th>
              <th scope="col" style="width:2.6in">PROJECT INFO</th>
              <th scope="col" style="width:2.2in">CUSTOMER</th>
              <th scope="col" style="width:2.2in">STATUS</th>
              <th scope="col" style="width:1.5in">START DATE</th>
              <th scope="col" style="width:1.5in">END DATE</th>
              <th scope="col" style="width:1.2in">DURATION</th>
              <th scope="col" style="width:0.5in">ACTION</th>
            </tr>
          </thead>
          <tbody>




          <?php
          $no = 0;
          foreach ($project_list->result() as $plist): 
            $nbsp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            $project_id = $plist->PROJECT_ID;
            $project_milestone = $this->cms->getMilestoneProject('g_project_detail', $project_id);
            $start_project = date('Y-m-d', strtotime($plist->START_DATE));
            $end_project = date('Y-m-d', strtotime($plist->END_DATE));
            $days = $this->incube->calculateDays($start_project, $end_project);
            $no++
            ?>
            <tr>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;"><?= $no ?></td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-weight: bold;font-size: 14px;"><?= $plist->PROJECT_NAME ?></label><br>
                <label style="font-size: 12px;">Project OWNER : AJI PRATAMA</label><br>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-weight: bold;font-size: 14px;">INCUBESOLUTIONS</label><br>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <h6><span class="badge badge-success">Check Inventory & COGS</span></h6>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-size:12px;" class="badge badge-primary"><?= $start_project ?></label>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-size:12px;" class="badge badge-danger"><?= $end_project ?></label>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-size:12px;font-weight: bold;" >
                  <?= $days ?> Day(s)
                </label>
              </td>
              <td style="background: #ebebeb">
                <a class="btn btn-sm btn-primary text-white uploadDokumen" title="Upload Dokumen" data-toggle="modal" data-target="#uploadDokumen" data-idproject="<?= $plist->REC_ID ?>">
                  <i class="fa fa-file"></i>
                </a>
              </td>
            </tr>

            <tr>
              <td colspan="8">
              <div class="collapse" id="collapse<?= $plist->REC_ID ?>">
                <?php foreach ($project_milestone->result() as $proj_milestone) {
                  $milestone_data = $this->cms->getSingularData('g_milestone', 'REC_ID', $proj_milestone->MILESTONE_ID);
                  $project_task = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID)
                ?>

                <table>
                  <thead>
                        <tr>
                          <th style="width:0.2in"></th>
                          <th class="text-warning" style="width:2.7in">
                            <i class="fa fa-arrow-right"> </i> <?= $milestone_data->row()->MILESTONE_NAME  ?>
                          </th>
                          <th style="width:2.2in">
                            PIC
                          </th>
                          <th style="width:2.2in">
                            STATUS
                          </th>
                          <th style="width:1.5in">
                            START DATE
                          </th>
                          <th style="width:1.5in">
                            END DATE
                          </th>
                          <th style="width:1.2in">
                            DURATION
                          </th>
                          <th style="width:0.5in"></th>

                        </tr>
                        </thead>

                          <?php foreach ($project_task->result() as $proj_task) {
                            $task_data = $this->cms->getSingularData('g_task', 'REC_ID', $proj_task->TASK_ID);
                            $duration = $this->incube->hoursToTime($proj_task->TOTAL_HOURS);
                          ?>

                            <tr>
                              <td></td>
                              <td class="text-success">
                                <?= $nbsp ?><i class="fa fa-arrow-right "> </i> <?= $task_data->row()->TASK_NAME ?>
                              </td>
                              <td>
                                <?= $proj_task->PIC ?>
                              </td>
                              <td>
                                <!-- Logic Status Belum -->
                                <span class="badge badge-success" style="font-size: 12px;">DONE</span>
                              </td>
                              <td>
                                <?= $proj_task->START_DATE ?>
                              </td>
                              <td>
                                <?= $proj_task->END_DATE ?>
                              </td>
                              <td>
                                <?= $duration ?>
                              </td>
                              <td></td>

                            </tr>

                          <?php } ?>
                </table>


                <?php } ?>
              </div>
              </td>
          <?php endforeach ?>
      </tr>


          </tbody>
        </table>
      </div>
    </div>
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_project'); ?>
    <!-- End of Add Modal Perusahaan -->



    <div class="modal fade" id="uploadDokumen" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" action="<?= base_url('General/Project/uploadDokumen'); ?>" method="POST" novalidate enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Upload Dokumen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-uploadDokumen">
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





  </div>
  <!-- End of Content -->
</div>



<script>
  
jQuery(document).ready(function($) {

   $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

   $(document).on('click', '.uploadDokumen', function(event){


    var button = $(event.relatedTarget);
          var id_project = $(this).data('idproject');
          var getAccount = '<?php echo base_url('General/Project/getUploadDokumen?id_project='); ?>';

          $('.modal-uploadDokumen').load(getAccount + id_project, function() {});


   });

  $(document).on('hidden.bs.modal', function (e) {
    $( ".modal-uploadDokumen" ).empty();
  });
  
  $(document).on('click', '.hapus', function(event) {

      let userID = $(this).data('user');

      Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'General/User/deleteUser', {
            userID: userID
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