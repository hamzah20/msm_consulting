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
            <li class="active"> <a href="<?php echo base_url('pph_22'); ?>"> PPh 22</a> / PPH 22 Bulanan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addPPH22PerusahaanBulan">Tambah Data</a>
        <a class="btn btn-sm btn-info ml-3" href="#">Lihat History</a>
        <hr>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col-1" class="text-center">No</th>
              <th scope="col-4">Nama Perusahaan</th>
              <th scope="col-1" class="text-center">Periode / Masa</th>
              <th scope="col-1" class="text-center">Pembetulan</th> 
              <th scope="col-1" class="text-center">PPH</th>
              <th scope="col-3" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php if ($companies->num_rows() != 0) { ?>
              <?php 
              foreach ($correction->result() as $company) { 
                $total_pphval=0;
                $r_employee=$this->cms->getSingularDataTriple('v_g_employee_pph22', 'COMPANY_ID', 'PERIOD_YEAR','PERIOD_MONTH', $company->COMPANY_ID, $company->PERIOD_YEAR,$company->PERIOD_MONTH );
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
                  <td class="text-center"><?= strtoupper($company->PERIOD_MONTH) . '-' . $company->PERIOD_YEAR; ?></td>
                  <td class="text-center text-danger"><?= $company->TOTAL_PEMBETULAN; ?></td> 
                  <td class="text-center"><?= ($company->COMPANY_PPHVAL22 == null ? '-' : number_format($company->COMPANY_PPHVAL22+$total_pphval)); ?></td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?= base_url('pph_22/bulan/summary?pid=' . $company->PPH22_ID . '&cid=' . $company->COMPANY_ID . '&mid=' . $company->PERIOD_MONTH . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Approve" href="<?= base_url('pph_22/bulan/approve?pid=' . $company->PPH22_ID . '&cid=' . $company->COMPANY_ID . '&mid=' . $company->PERIOD_MONTH . '&yid=' . $company->PERIOD_YEAR); ?>"><i class="fa fa-check-circle"></i></a>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph22_perusahaan_bulan', $companies); ?>
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