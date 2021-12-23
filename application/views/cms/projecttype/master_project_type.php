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
                        <td  scope="row">
                          <a class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#editprojecttype" data-id="<?= $GetProject->ID; ?>" title="Edit" href="#" role="button"><i class="fa fa-edit"></i></a>

                          <a class="btn btn-sm btn-danger hapus" data-id="<?= $GetProject->ID ?>"><i class="fa fa-trash"></i></a>
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
    <?php $this->load->view('modal/add_projectType'); ?>
    <!-- End of Add Modal Perusahaan -->
  </div>
  <!-- End of Content -->
</div>

<div class="modal fade" id="editprojecttype" tabindex="-1" aria-labelledby="editprojecttype" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" id="formAddUser" action="<?= base_url('General/ProjectType/editProjecttype'); ?>" method="POST" novalidate>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUser">Edit User</h5>
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

<script>
jQuery(document).ready(function($) {

   $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

   $(document).on('click', '.edit', function(event){


    var button = $(event.relatedTarget);
          var id = $(this).data('id');
          var getAccount = '<?php echo base_url('General/ProjectType/getProjecttype?id='); ?>';

          $('.modal-edit').load(getAccount + id, function() {
            
          });


   });

   $(document).on('hidden.bs.modal', function (e) {
    $( ".modal-edit" ).empty();
  });
  
  $(document).on('click', '.hapus', function(event) {

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

          $.post(baseUrl + 'General/ProjectType/deleteProjecttype', {
            ID: ID
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
<?php } ?>

<?php if ($this->session->userdata('query') == 'invalid') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Gagal',
        text: 'tidak ditemukan, silahkan coba lagi',
        icon: 'error',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });

    });
  </script>
<?php } ?>

<?php if ($this->session->userdata('query') == 'success') { ?>
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
   $this->session->set_flashdata('query', '');
}
 ?>
<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->