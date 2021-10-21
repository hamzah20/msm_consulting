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
          <h1>Hitung Pajak</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">PPH 23</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPPH22Perusahaan">Tambah Data</a>
        <hr>
        <div class="row"> 
          <div class="col-2">
            <input type="text" id="FilterTahun" name="FilterTahun" class="form-control form-control-sm" placeholder="Periode" value="<?php echo date('Y'); ?>"> 
          </div> 
        </div> <span class="badge badge-info mt-1 mb-3">*Filter by Years</span>
        <table class="table" id="example" class="display">

          <br>
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-2">Nama Perusahaan</th>
              <th scope="col-1" class="text-center">NPWP</th>
              <th scope="col-1" class="text-center">Periode (Tahun)</th>
              <th scope="col-1" class="text-center">Total Penghasilan DPP</th> 
              <th scope="col-4" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($companies->num_rows() != 0) { ?>
              <?php foreach ($companies->result() as $company) { ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?= $company->COMPANY_NAME; ?></td>
                  <td class="text-center"><?= ($company->COMPANY_NPWP == null ? '-' : $company->COMPANY_NPWP); ?></td>
                  <td class="text-center text-danger"><?= $company->PERIOD_YEAR; ?></td>
                  <td class="text-center"><?= ($company->TOTAL_COMPANY_DPP == null ? '-' : number_format($company->TOTAL_COMPANY_DPP)); ?></td> 
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Summary Bulanan" href="<?= base_url('pph_23/bulan?cid=' . $company->COMPANY_ID . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Summary Tahunan" href="<?= base_url('pph_23/tahun'); ?>" role="button" role="button"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>

              <?php } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph22_perusahaan'); ?>
    <!-- End of Add Modal Perusahaan -->

  </div>
  <!-- End of Content -->
</div>
<!-- /#right-panel -->

<!-- Right Panel -->


<script src="<?= base_url('assets/autocomplete/jquery.autocomplete.js'); ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/autocomplete/autocomplete.css'); ?>">

<script>
  jQuery(document).ready(function($) {

    "use strict";

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });

    $('#companyTable').DataTable();

    //1. Nampilin semua nama perusahaan dari DB
    var countries = [];

    $.get(baseUrl + 'Middleware/API/getAllCompany', function(resp) {

      $.each(resp.data, function(_index, value) {
        let ctgData;

        ctgData = {
          value: value.COMPANY_NAME,
          data: value.COMPANY_ID
        };

        countries.push(ctgData);
      });
    });
    //EoL 1

    //2. Autocomplete buat Nama Perusahaan
    $('#nama_karyawan').autocomplete({
      lookup: countries,
      onSelect: function(suggestion) {
        console.log(suggestion);

        $('#companyID').val(suggestion.data);
      }
    });
    //EoL 2

    //$('#example').DataTable();

    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var FilterTahun = parseInt($('#FilterTahun').val(), 10);
        //var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat(data[3]) || 0; // use data for the age column

        if ((isNaN(FilterTahun)) ||
          (FilterTahun == age)) {
          return true;
        }
        return false;
      }
    );

    $(document).ready(function() {
      var table = $('#example').DataTable();

      // Event listener to the two range filtering inputs to redraw on input
      $('#FilterTahun').keyup(function() {
        table.draw();
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

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->