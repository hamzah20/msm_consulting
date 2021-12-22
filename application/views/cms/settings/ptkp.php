<?php $counter = 1 ?>
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
          <h1>Pengaturan PTKP</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Pengaturan PTKP</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPTKP">Tambah Data</a>
        <hr>
        
        <table class="table" id="example" class="display">

          <br>
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-1" class="text-center">PTKP ID</th>
              <th scope="col-1" class="text-center">PTKP NAME</th>
              <th scope="col-1" class="text-center">PTKP TARIF</th>
              <th scope="col-1" class="text-center">PTKP ORDER</th>
              <th scope="col-1" class="text-center">YEARS</th>
              <th scope="col-1" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($m_ptkp->num_rows() != 0) { ?>
              <?php foreach ($m_ptkp->result() as $ptkp) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td class="text-center"><?= $ptkp->TK_ID; ?></td>
                  <td class="text-center"><?= $ptkp->TK_NAME; ?></td>
                  <td class="text-center"><?= $ptkp->TK_TARIF; ?></td>
                  <td class="text-center"><?= $ptkp->TK_ORDER; ?></td>
                  <td class="text-center"><?= $ptkp->PERIOD_YEAR; ?></td>
                  <td class="text-center">
                  	<a class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#editPTKP" data-id="<?= $ptkp->REC_ID; ?>" title="Edit PTKP" href="#" role="button">
                      <i class="fa fa-edit"></i>

                    </a>
                  	<a class="btn btn-sm btn-danger hapus" data-toggle="tooltip" data-placement="top" data-id="<?= $ptkp->REC_ID; ?>" title="Hapus PTKP" href="#" role="button">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>

              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal -->
    <?php $this->load->view('modal/add_ptkp'); ?>
    <!-- End of Add Modal -->
    <!-- End of Add Modal -->

    <!-- Edit Modal

  </div>
  <!End of Content -->
</div>
<!-- /#right-panel -->

<div class="modal fade" id="editPTKP" tabindex="-1" aria-labelledby="editPTKP" aria-hidden="true">
  		<div class="modal-dialog">
  			<form class="needs-validation" id="formAddUser" action="<?= base_url('Settings/Ptkp/editPTKP'); ?>" method="POST" novalidate>
  				<div class="modal-content">
  					<div class="modal-header">
  						<h5 class="modal-title" id="editUser">Edit PTKP</h5>
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


<!-- Right Panel --> 




<script>
jQuery(document).ready(function($) {

   $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

   $(document).on('click', '.edit', function(event){


		var button = $(event.relatedTarget);
          var id = $(this).data('id');
          var getAccount = '<?php echo base_url('Settings/Ptkp/getPTKP?id='); ?>';

          $('.modal-edit').load(getAccount + id, function() {
            
          });


   });
	
	$(document).on('click', '.hapus', function(event) {

      let REC_ID = $(this).data('id');

      Swal.fire({
        title: 'Hapus Data',
        text: 'Apakah Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {

          $.post(baseUrl + 'Settings/Ptkp/deletePTKP', {
            REC_ID: REC_ID
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