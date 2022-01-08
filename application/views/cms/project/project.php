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
          //Kalo mau supaya user biasa bisa ngelihat semua task, ikuti perintah yang ada kode 2077
          $no = 0;
          foreach ($project_list->result() as $plist): 
            $data_task_done = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'STATUS', $plist->PROJECT_ID, 'DONE');
            $data_task = $this->cms->getSingularData('g_project_detail', 'PROJECT_ID', $plist->PROJECT_ID);

            $status_project = "<span class='badge badge-primary' style='font-size: 12px;'>ONPROGRESS</span>";
            if ($data_task_done->num_rows() == $data_task->num_rows()) {
              $status_project = "<span class='badge badge-success' style='font-size: 12px;'>DONE</span>";
            }

            $nbsp = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            $project_id = $plist->PROJECT_ID;
            $project_milestone = $this->cms->getMilestoneProject('v_g_project_detail', $project_id);
            $start_project = date('Y-m-d', strtotime($plist->START_DATE));
            $end_project = date('Y-m-d', strtotime($plist->END_DATE));
            $days = $this->incube->calculateDays($start_project, $end_project);
            $no++;
            $cek_project_pic_list = $this->cms->getSingularDataDetail('g_project_detail', 'PROJECT_ID', 'PIC', $plist->PROJECT_ID, $user_rec_id);//2077 hapus line ini
            if ($cek_project_pic_list->num_rows() > 0  || $elevated_group == true) {//2077 hapus line ini
            ?>
            <tr>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;"><?= $no ?></td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-weight: bold;font-size: 14px;"><?= $plist->PROJECT_NAME ?></label><br>
                <label style="font-size: 12px;">Project OWNER : <?= $plist->USER_NAME ?></label><br>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <label style="font-weight: bold;font-size: 14px;"><?= $plist->COMPANY_NAME ?></label><br>
              </td>
              <td data-toggle="collapse" data-target="#collapse<?= $plist->REC_ID ?>" style="background: #ebebeb;cursor: pointer;">
                <h6><?= $status_project ?></h6>
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
                <!-- <a class="btn btn-sm btn-primary text-white uploadDokumenProject" title="Upload Dokumen" data-toggle="modal" data-target="#uploadDokumenProject" data-idproject="<?= $plist->REC_ID ?>">
                  <i class="fa fa-file"></i>
                </a> -->
                <a class="btn btn-sm btn-primary text-white lihatDokumen" title="Lihat Dokumen" data-toggle="modal" data-target="#lihatDokumen" data-idproject="<?= $plist->PROJECT_ID ?>">
                  <i class="fa fa-list"></i>
                </a>
              </td>
            </tr>

            <tr>
              <td colspan="8">
              <div class="collapse" id="collapse<?= $plist->REC_ID ?>">
              <table>
                <?php foreach ($project_milestone->result() as $proj_milestone) {
                  $project_task = $this->cms->getSingularDataDetailTask('v_g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', $project_id, $proj_milestone->MILESTONE_ID);
                  $cek_milestone_pic_list = $this->cms->getSingularDataTriple('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', 'PIC', $project_id, $proj_milestone->MILESTONE_ID ,$user_rec_id);//2077 hapus line ini
                  if ($cek_milestone_pic_list->num_rows() > 0  || $elevated_group == true) {//2077 hapus line ini
                ?>

                
                  <thead>
                        <tr>
                          <th style="width:0.2in"></th>
                          <th class="text-warning" style="width:2.7in">
                            <i class="fa fa-arrow-right"> </i> <?= $proj_milestone->MILESTONE_NAME  ?>
                          </th>
                          <th style="width:2.4in">
                            PIC
                          </th>
                          <th style="width:2.4in">
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
                          <th style="width:0.5in">Action</th>

                        </tr>
                        </thead>

                          <?php foreach ($project_task->result() as $proj_task) {
                            $file_num_rows = $this->cms->getSingularDataTriple('g_project_doc', 'PROJECT_ID', 'MILESTONE_ID','TASK_ID', $project_id, $proj_milestone->MILESTONE_ID, $proj_task->TASK_ID)->num_rows();
                            //$duration = $this->incube->hoursToTime($proj_task->TOTAL_HOURS);
                            $duration= $proj_task->TOTAL_HOURS.' Hours';
                            $status = "";
                            if ($proj_task->STATUS == 'DONE') {
                              $status = "<span class='badge badge-success' style='font-size: 12px;'>DONE</span>";
                            }elseif($proj_task->STATUS == 'ONPROGRESS'){
                              $status = "<span class='badge badge-primary' style='font-size: 12px;'>ONPROGRESS</span>";
                            }elseif($proj_task->STATUS == 'WAITING FOR APPROVAL'){
                              $status = "<span class='badge badge-warning' style='font-size: 12px;'>WAITING FOR APPROVAL</span>";
                            }elseif($proj_task->STATUS == 'REVISE'){
                              $status = "<span class='badge badge-danger' style='font-size: 12px;'>REVISED</span>";
                            }elseif($proj_task->STATUS == 'PENDING'){
                              $status = "<span class='badge badge-danger' style='font-size: 12px;'>PENDING</span>";
                            }else{
                              $status = "<span class='badge badge-secondary' style='font-size: 12px;'>$proj_task->STATUS</span>";
                            }

                            if ($proj_task->NOTES_PIC == "") {
                              $NOTES_PIC = "...";
                            }else{
                              $NOTES_PIC = $proj_task->NOTES_PIC;
                            };

                            if ($proj_task->NOTES_SUPERUSER == "") {
                              $NOTES_SUPERUSER = "...";
                            }else{
                              $NOTES_SUPERUSER = $proj_task->NOTES_SUPERUSER;
                            };

                            $cek_milestone_pic_list = $this->cms->getSingularDataFour('g_project_detail', 'PROJECT_ID', 'MILESTONE_ID', 'TASK_ID', 'PIC', $project_id, $proj_milestone->MILESTONE_ID, $proj_task->TASK_ID, $user_rec_id);//2077 hapus line ini
                            if ($cek_milestone_pic_list->num_rows() > 0  || $elevated_group == true) {//2077 hapus line ini
                          ?>

                            <tr>
                              <td></td>
                              <td class="text-success" data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $nbsp ?><i class="fa fa-arrow-right "> </i> <?= $proj_task->TASK_NAME ?>
                              </td>
                              <td data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $proj_task->PIC ?>
                              </td>
                              <td data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $status; ?>
                              </td>
                              <td data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $proj_task->START_DATE ?>
                              </td>
                              <td data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $proj_task->END_DATE ?>
                              </td>
                              <td data-toggle="collapse" data-target="#collapse_notes<?= $proj_task->REC_ID ?>" style="cursor:pointer;">
                                <?= $duration ?>
                              </td>
                              <td>
                                

                                <?php if ($proj_task->STATUS != 'WAITING FOR APPROVAL' AND $proj_task->STATUS != 'DONE' AND $proj_task->STATUS != '-'): ?>
                                  <a class="btn btn-sm btn-primary text-white uploadDokumenTask" title="Upload Dokumen" data-toggle="modal" data-target="#uploadDokumenTask" data-idproject="<?= $plist->PROJECT_ID ?>" data-idtask="<?= $proj_task->TASK_ID ?>" data-idmilestone="<?= $proj_milestone->MILESTONE_ID ?>">
                                    <i class="fa fa-file"></i>
                                  </a>
                                <?php endif ?>

                                <a class="btn btn-sm btn-primary text-white lihatDokumenTask" title="Lihat Dokumen" data-toggle="modal" data-target="#lihatDokumen" data-idproject="<?= $plist->PROJECT_ID ?>" data-idtask="<?= $proj_task->TASK_ID ?>" data-idmilestone="<?= $proj_milestone->MILESTONE_ID ?>">
                                  <i class="fa fa-list"></i>
                                </a>

                                <?php if ($file_num_rows > 0 AND $proj_task->STATUS != 'WAITING FOR APPROVAL' AND $proj_task->STATUS != 'DONE' AND $elevated_group != true): ?>
                                  <a class="btn btn-sm btn-success text-white submitTask" title="Submit Task" data-toggle="modal" data-target="#submitTask" data-idprojdetail="<?= $proj_task->REC_ID ?>">
                                    <i class="fa fa-send"></i>
                                  </a>
                                <?php endif ?>

                              </td>

                            </tr>
                            <tr>
                              <td colspan="8" style="border:none;padding: 0;" >
                                <div class="row collapse" id="collapse_notes<?= $proj_task->REC_ID ?>" style="margin-left:0.5in;margin-right:0.5in;" >

                                  <div class="col">
                                    NOTES FROM PIC

                                    <div class="card">
                                      <div class="card-body">
                                        <?= nl2br($NOTES_PIC) ?>
                                      </div>
                                    </div>

                                  </div>

                                  <div class="col">
                                    NOTES FROM MANAGEMENT

                                    <div class="card">
                                      <div class="card-body">
                                        <?= nl2br($NOTES_SUPERUSER) ?>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </td>
                            </tr>

                          <?php }} //2077 hapus satu } ini ?>

                <?php }} //2077 hapus satu } ini ?>
                </table>
              </div>
              </td>
            <?php } //2077 hapus line ini ?>
          <?php endforeach ?>
      </tr>


          </tbody>
        </table>
      </div>
    </div>
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_project'); ?>
    <!-- End of Add Modal Perusahaan -->



    <div class="modal fade" id="uploadDokumenProject" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" action="<?= base_url('General/Project/uploadDokumen'); ?>" method="POST" enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Upload Dokumen Project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-uploadDokumenProject">
              Loading
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Upload</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="modal fade" id="uploadDokumenTask" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" action="<?= base_url('General/Project/uploadDokumen'); ?>" method="POST" enctype='multipart/form-data'>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Upload Dokumen Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-uploadDokumenTask">
              Loading
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Upload</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="modal fade" id="lihatDokumen" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Lihat Dokumen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modal-lihatDokumen">
              Loading
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Ok</button>
            </div>
          </div>
        
      </div>
    </div>

    <div class="modal fade" id="submitTask" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        
          <div class="modal-content modal-submitTask">
            Loading
          </div>
        
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

   $(document).on('click', '.uploadDokumenProject', function(event){
    var button = $(event.relatedTarget);
          var id_project = $(this).data('idproject');
          var url = '<?php echo base_url('General/Project/getUploadDokumen?id_project='); ?>';

          $('.modal-uploadDokumenProject').load(url + id_project, function() {});
   });

   $(document).on('click', '.uploadDokumenTask', function(event){
    var button = $(event.relatedTarget);
          var id_project = $(this).data('idproject');
          var id_task = $(this).data('idtask');
          var id_milestone = $(this).data('idmilestone');
          var url = '<?php echo base_url('General/Project/getUploadDokumen?id_project='); ?>';

          $('.modal-uploadDokumenTask').load(url + id_project + '&id_task=' + id_task + '&id_milestone=' + id_milestone, function() {});
   });

   $(document).on('click', '.lihatDokumen', function(event){

    var button = $(event.relatedTarget);
          var id_project = $(this).data('idproject');
          var url = '<?php echo base_url('General/Project/lihatDokumen?id_project='); ?>';

          $('.modal-lihatDokumen').load(url + id_project, function() {});


   });

   $(document).on('click', '.submitTask', function(event){

    var button = $(event.relatedTarget);
          var id = $(this).data('idprojdetail');
          var url = '<?php echo base_url('General/Project/modalSubmitTask?idprojdetail='); ?>';

          $('.modal-submitTask').load(url + id, function() {});


   });

   $(document).on('click', '.lihatDokumenTask', function(event){

    var button = $(event.relatedTarget);
          var id_project = $(this).data('idproject');
          var id_task = $(this).data('idtask');
          var id_milestone = $(this).data('idmilestone');
          var url = '<?php echo base_url('General/Project/lihatDokumen?id_project='); ?>';

          $('.modal-lihatDokumen').load(url + id_project + '&id_task=' + id_task + '&id_milestone=' + id_milestone, function() {});


   });

  $(document).on('hidden.bs.modal', function (e) {
    $( ".modal-uploadDokumenProject" ).empty();
    $( ".modal-uploadDokumenTask" ).empty();
    $( ".modal-lihatDokumen" ).empty();
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
      text: 'Data berhasil ditambahkan',
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