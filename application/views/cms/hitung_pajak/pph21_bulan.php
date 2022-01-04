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
          <h1>PPh 21</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPh 21</a> / Bulanan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPPH21PerusahaanBulan">Tambah Data</a>
        <?php foreach ($correction->result() as $data);?>
        <a class="btn btn-sm btn-info ml-3" href="<?= base_url('pph_21/history?cid=' . $data->COMPANY_ID .'&yid=' . $data->PERIOD_YEAR); ?>">Lihat History</a>
        <hr>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-4">Nama Perusahaan</th>
              <th scope="col-1" class="text-center">Periode / Masa</th>
              <th scope="col-1" class="text-center">Pembetulan</th>
              <th scope="col-1" class="text-center">Total Penghasilan Bruto</th>
              <th scope="col-1" class="text-center">PPh 21</th>
              <th scope="col-1" class="text-center">KB (LB)</th>
              <th scope="col-3" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php if ($companies->num_rows() != 0) { ?>
              <?php foreach ($correction->result() as $company) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?= $company->COMPANY_NAME; ?></td>
                  <td class="text-center"><?= strtoupper($company->PERIOD_MONTH) . '-' . $company->PERIOD_YEAR; ?></td>
                  <td class="text-center text-danger"><?= $company->TOTAL_PEMBETULAN; ?></td>
                  <td class="text-center"><?= ($company->COMPANY_BRUTO == null ? '-' : number_format($company->COMPANY_BRUTO)); ?></td>
                  <td class="text-center"><?= ($company->COMPANY_PPHVAL == null ? '-' : number_format($company->COMPANY_PPHVAL)); ?></td>
                  <td class="text-center"><?= ($company->COMPANY_KBLB == null ? '-' : number_format($company->COMPANY_KBLB)); ?></td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?= base_url('pph_21/bulan/summary?pid=' . $company->PPH_ID . '&cid=' . $company->COMPANY_ID . '&mid=' . $company->PERIOD_MONTH . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Approve" href="<?= base_url('pph_21/bulan/approve?pid=' . $company->PPH_ID . '&cid=' . $company->COMPANY_ID . '&mid=' . $company->PERIOD_MONTH . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-check-circle"></i></a>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan', $companies); ?>
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
        text: 'ID Dokumen tidak ditemukan, silahkan coba lagi',
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

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->