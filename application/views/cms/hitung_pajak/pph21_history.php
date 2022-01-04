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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPh 21</a> / <a href="<?php echo base_url('pph_21/bulan?cid=' . $this->input->get('cid')) ?>">Bulanan</a> / History</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">  
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-4">Nama Perusahaan</th>
              <th scope="col-1" class="text-center">Periode / Masa</th> 
              <th scope="col-1" class="text-center">Total Penghasilan Bruto</th>
              <th scope="col-1" class="text-center">PPh 21</th> 
            </tr>
          </thead>
          <tbody>

            <?php if ($companies->num_rows() != 0) { ?>
              <?php foreach ($data_history->result() as $history) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?php foreach ($companies->result() as $company); echo $company->COMPANY_NAME; ?></td>
                  <td class="text-center"><?= strtoupper($history->PERIOD_MONTH) . '-' . $history->PERIOD_YEAR; ?></td> 
                  <td class="text-center"><?= ($history->COMPANY_BRUTO == null ? '0' : number_format($history->COMPANY_BRUTO)); ?></td>
                  <td class="text-center"><?= ($history->COMPANY_PPHVAL == null ? '0' : number_format($history->COMPANY_PPHVAL)); ?></td> 
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