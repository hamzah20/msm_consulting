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
          <h1>PPH 25</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">PPH 25</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body"> 
        <ul class="nav nav-tabs nav-edit-perusahaan my-3"> 
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('pph_25'); ?>"><i class="fa fa-id-card mr-1"></i>Masukan</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-id-card mr-1"></i>Keluaran</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url('pph_25/fpdl') ?>"><i class="fa fa-id-card mr-1"></i>FP DL</a>
          </li>  
        </ul>
        <hr>
         <a class="btn btn-sm btn-danger mb-2" href="#" role="button" data-toggle="modal" title="Import" data-target="#importFPDL"><i class="fa fa-upload"></i> Upload</a>
        <table id="companyTable" class="table table-company">
          <!-- <thead class="thead-dark"> -->
            <tr class="thead-dark">
              <th scope="col-">No</th>
              <th scope="col-">Name</th> 
              <th scope="col-">NPWP</th>
              <th scope="col-">DPP</th> 
              <th scope="col-">PPN</th> 
              <th scope="col-">PPNBM</th>  
            </tr>
          <!-- </thead> -->
          <tbody> 
            <?php 
              foreach ($companies->result() as $data) {
            ?>
              <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $data->NAME; ?></td>
                <td><?php echo $data->NPWP; ?></td>
                <td><?php echo $data->TOTAL_DPP; ?></td>
                <td><?php echo $data->TOTAL_PPN; ?></td>
                <td><?php echo $data->TOTAL_PPNBM; ?></td> 
              </tr>
            <?php
              }
            ?> 


          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/import_pph25_fpdl'); ?>
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