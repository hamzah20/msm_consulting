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
            <li class="active">Karyawan Perusahaan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <table class="table" id="employeeTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-5">Nama Perusahaan (Client)</th>
              <th scope="col-3" class="text-center">NPWP</th>
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
                  <td class="text-center"><a class="btn btn-sm btn-primary" href="<?php echo base_url('employee/detail?cid=' . $company->COMPANY_ID); ?>" role="button">Detail</a></td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <!-- End of Content -->
</div>
<!-- /#right-panel -->


<script>
  jQuery(document).ready(function($) {

    "use strict";

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $('#employeeTable').DataTable();

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

<!-- Right Panel -->

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->