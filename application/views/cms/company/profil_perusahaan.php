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
          <h1>Klien</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Profil Perusahaan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPerusahaan">Tambah Data</a>
        <hr>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-5">Nama Perusahaan (Client)</th>
              <th scope="col-3" class="text-center">NPWP</th>
              <!-- <th scope="col-2" class="text-center">KLU</th> -->
              <th scope="col-1" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php if ($companies->num_rows() != 0) { ?>
              <?php foreach ($companies->result() as $company) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?= $company->COMPANY_NAME; ?></td>
                  <td class="text-center"><?= ($company->COMPANY_NPWP == null ? '...' : $company->COMPANY_NPWP); ?></td>
                  <!-- <td class="text-center">74100</td> -->
                  <td class="text-center">
                    <a class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat detail perusahaan" href="<?= base_url('company_profile/detail/utama?cid=' . $company->COMPANY_ID); ?>"><i class="fa fa-info-circle"></i></a>
                    <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Edit detail perusahaan" href="<?= base_url('company_profile/edit/utama?cid=' . $company->COMPANY_ID); ?>" role="button" role="button"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger hapus" data-toggle="tooltip" data-placement="top" title="Hapus data perusahaan" href="<?= base_url('company_profile/delete?cid=' . $company->COMPANY_ID); ?>" role="button"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_perusahaan'); ?>
    <!-- End of Add Modal Perusahaan -->

  </div>
  <!-- End of Content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->

<script>
  jQuery(document).ready(function($) {

    "use strict";

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $('#formAddCompany').on('submit', function(evt) {
      evt.preventDefault();

      let form = $('#formAddCompany');
      let companyName = $('#nama_perusahaan').val();

      if (companyName == null || companyName.length == 0) {
        form.addClass('was-validated');
      } else {
        form[0].submit();
      }

    });

    $('#companyTable').DataTable();

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
        text: 'ID Perusahaan tidak ditemukan, silahkan coba lagi',
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
        text: 'Data perusahaan berhasil ditambahkan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php } ?>

<?php if ($this->session->userdata('profil_perusahaan') == 'delete') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Hapus Data Berhasil',
        text: 'Data perusahaan berhasil dihapus',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php } ?>

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->