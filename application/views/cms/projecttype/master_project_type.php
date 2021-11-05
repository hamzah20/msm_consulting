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
          <h1>Master Project Type</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Project Type</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="content mt-3">
   <div class="card">
        <div class="card-header">
            <h4>List Project Type</h4>
        </div>

        <div class="card-body">
          <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addProjectType"><i class="fa fa-plus"></i> Project Type</a>
           <table class="table table-striped" style="margin-top: 10px;">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">NAME</th>
                  <th scope="col">DESCRIPTION</th>
                  <th scope="col">ACTION</th>
                
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  foreach ($project->result() as $GetProject) {
                    ?>
                      <tr>
                        <td  scope="row"><?php echo $i?></td>
                        <td  scope="row"><?php echo $GetProject->NAME?></td>
                        <td  scope="row"><?php echo $GetProject->DESCRIPTION?></td>
                        <td  scope="row"><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a> <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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
    <?php $this->load->view('modal/add_projectType'); ?>
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
<!-- End of Footer -->