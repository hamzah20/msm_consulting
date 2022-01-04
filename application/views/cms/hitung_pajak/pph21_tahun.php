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

  <!-- CSS Internal for PPH 21 Tahun -->
  <style type="text/css">
    div.dataTables_wrapper {
          width: 900px;
          margin: 0 auto;
      }
  </style>
  <!-- CSS Internal for PPH 21 Tahun -->

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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPh 21</a> / Tahunan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body"> 
        <h5><span class="badge badge-success mb-4">SUMMARY DETAIL (PERIODE 1 TAHUN)</span></h5>  
        <?php 
          $cid=$this->input->get('cid');
          $yid=$this->input->get('yid');
        ?>
        <a class="btn btn-sm btn-info mb-5" title="Tambah" href="<?= base_url('pph_21/tahun?cid=' . $cid . '&yid=' . $yid); ?>"></i> Hitung Ulang</a>
        <table class="table table-tahun" id="PPH21TahunTable">
          <thead class="thead-dark">
            <tr> 
              <th scope="col-" rowspan="2">No</th>  
              <th scope="col-" rowspan="2">Nama Pegawai</th>  
              <th scope="col-" rowspan="2">NPWP*</th>  
              <th scope="col-" rowspan="2">SK/T*</th>  
              <th scope="col-" rowspan="2">MK* <br> Bulan</th>  
              <th scope="col-" rowspan="2">BK* <br> Bulan</th>  
              <th scope="col-" rowspan="2"> PPH</th>  
              <th scope="col-" colspan="8" class="text-center">(JAN-DES)</th> 
              <th scope="col-" colspan="8" class="text-center">JAN</th>   
              <th scope="col-" colspan="8" class="text-center">FEB</th>   
              <th scope="col-" colspan="8" class="text-center">MAR</th>   
              <th scope="col-" colspan="8" class="text-center">APR</th>   
              <th scope="col-" colspan="8" class="text-center">MEI</th>   
              <th scope="col-" colspan="8" class="text-center">JUN</th>   
              <th scope="col-" colspan="8" class="text-center">JUL</th>   
              <th scope="col-" colspan="8" class="text-center">AUG</th>   
              <th scope="col-" colspan="8" class="text-center">SEP</th>   
              <th scope="col-" colspan="8" class="text-center">OCT</th>   
              <th scope="col-" colspan="8" class="text-center">NOV</th>   
              <th scope="col-" colspan="8" class="text-center">DES</th>   
            </tr>

            <tr>   
              <?php for($i=1; $i<=13; $i++){ ?>
                <th scope="col-">GP</th>  
                <th scope="col-">TP</th>  
                <th scope="col-">TL</th>  
                <th scope="col-">HI</th>  
                <th scope="col-">PA</th>  
                <th scope="col-">NA</th>  
                <th scope="col-">TB</th>  
                <th scope="col-">PB</th> 
              <?php  } ?>        
            </tr>
          </thead>
          <tbody>   
            <?php foreach ($companies->result() as $data) { ?> 
            <tr>  
              <td><?= $counter++; ?></td> 
              <td><?= $data->EMPLOYEE_NAME; ?></td> 
              <td>00.000.000.0-000.000</td> 
              <td>TK/0</td> 
              <td>01</td> 
              <td>01</td>   
              <td><?= number_format($data->EMPLOYEE_PPHVAL_TERHUTANG); ?></td>   

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_YEAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_YEAR); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_JAN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_JAN); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_FEB); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_FEB); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_MAR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_MAR); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_APR); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_APR); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_MEI); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_MEI); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_JUN); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_JUN); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_JUL); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_JUL); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_AUG); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_AUG); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_SEP); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_SEP); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_OCT); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_OCT); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_NOV); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_NOV); ?></td> 

              <td><?= number_format($data->EMPLOYEE_GAJI_POKOK_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_PPH_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TUNJANGAN_LAINNYA_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_HONARIUM_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_PREMI_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_NATURA_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_TANTIEMBONUS_DES); ?></td> 
              <td><?= number_format($data->EMPLOYEE_BRUTO_DES); ?></td> 

               
            </tr> 
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

    $(document).ready(function() {
    $('#PPH21TahunTable').DataTable( {
        "scrollX": true
    } );
} );


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