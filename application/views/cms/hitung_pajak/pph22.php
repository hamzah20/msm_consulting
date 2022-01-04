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
          <h1>PPh 22</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">PPh 22</li>
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
              <th scope="col-1" class="text-center">Total PPH</th> 
              <th scope="col-4" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($companies->num_rows() != 0) { ?>
              <?php foreach ($companies->result() as $company) { 
                 $total_pphval=0;
                 $r_employee=$this->cms->getSingularDataDetail('v_g_employee_pph22', 'COMPANY_ID', 'PERIOD_YEAR', $company->COMPANY_ID, $company->PERIOD_YEAR);
                foreach ($r_employee->result() as $employee) {
                  $tarifPresentase=0;
                  $pphVal=0;
                  $totalRatesSemen=0;
                  $totalRatesKertas=0;
                  $totalRatesBaja=0;
                  $totalRatesOtomotif=0;
                  $totalRatesPelumas=0;
                  $totalBarangMewah=0;
                  $totalIndustriMaterial=0;
                  $totalBusinessMining=0;
                  $totalBadan1=0;
                  $totalBadan2=0;
                  if($employee->PRODUCT_TYPE<>''){
                     $list_rates = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', $employee->PRODUCT_TYPE);
                    foreach ($list_rates->result() as $rates); 
                   $tarifPresentase=$rates->PRESENTASE;
                  }
                  $totalRatesSemen=$employee->BRUTO_SEMEN*$employee->BRUTO_SEMEN_RATES;
                  $totalRatesKertas=$employee->BRUTO_KERTAS*$employee->BRUTO_KERTAS_RATES;
                  $totalRatesBaja=$employee->BRUTO_BAJA*$employee->BRUTO_BAJA_RATES;
                  $totalRatesOtomotif=$employee->BRUTO_OTOMOTIF*$employee->BRUTO_OTOMOTIF_RATES;
                  //------------------------------------- Barang Mewah
                  if($employee->TRANSACTION_NPWP<>''){
                     $totalBarangMewah=(($tarifPresentase*2)/100)*$employee->SELLING_PRICE;
                  }
                  else{
                     $totalBarangMewah=($tarifPresentase/100)*$employee->SELLING_PRICE;
                  }
                  //--------------------------------------Industri Material
                  if($employee->TRANSACTION_NPWP<>''){
                     $totalIndustriMaterial=((0.25*2)/100)*$employee->SELLING_INDUSTRI_MATERIALS;
                  }
                  else{
                     $totalIndustriMaterial=(0.25/100)*$employee->SELLING_INDUSTRI_MATERIALS;
                  }
                  //--------------------------------------- Business Mining
                  if($employee->TRANSACTION_NPWP<>''){
                     $totalBusinessMining=((1.5*2)/100)*$employee->SELLING_BUSINESS_MINING;
                  }
                  else{
                     $totalBusinessMining=(1.5/100)*$employee->SELLING_BUSINESS_MINING;
                  }


                  $pphVal=($totalRatesSemen+$totalRatesKertas+$totalRatesBaja+$totalRatesOtomotif+$employee->BRUTO_FINAL+$employee->BRUTO_TIDAK_FINAL+$totalBarangMewah+$totalIndustriMaterial+$totalBusinessMining+$totalBadan1+$totalBadan2);

                  $total_pphval=$total_pphval+$pphVal;
                }
            
                ?>
                <tr>
                  <th scope="row" class="text-center"><?= $counter++; ?></th>
                  <td><?= $company->COMPANY_NAME; ?></td>
                  <td class="text-center"><?= ($company->COMPANY_NPWP == null ? '-' : $company->COMPANY_NPWP); ?></td>
                  <td class="text-center text-danger"><?= $company->PERIOD_YEAR; ?></td>
                  <td class="text-center"><?= ($company->TOTAL_COMPANY_PPHVAL22 == null ? '-' : number_format($company->TOTAL_COMPANY_PPHVAL22+ $total_pphval)); ?></td> 
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Summary Bulanan" href="<?= base_url('pph_22/bulan?cid=' . $company->COMPANY_ID . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Summary Tahunan" href="<?= base_url('pph_21/tahun'); ?>" role="button" role="button"><i class="fa fa-eye"></i></a>
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