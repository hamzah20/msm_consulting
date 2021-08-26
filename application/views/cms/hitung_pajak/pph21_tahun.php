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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / Tahunan</li>
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
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr> 
              <th scope="col-" rowspan="2">No</th>  
              <th scope="col-" rowspan="2">Nama Pegawai</th>  
              <th scope="col-" rowspan="2">NPWP*</th>  
              <th scope="col-" rowspan="2">SK/T*</th>  
              <th scope="col-" rowspan="2">MK* <br> Bulan</th>  
              <th scope="col-" rowspan="2">BK* <br> Bulan</th>  
              <th scope="col-" colspan="8" class="text-center">(JAN-DES)</th>
              <th scope="col-" colspan="8">JAN</th>   
              <th scope="col-" colspan="8">FEB</th>   
              <th scope="col-" colspan="8">MAR</th>   
              <th scope="col-" colspan="8">APR</th>   
              <th scope="col-" colspan="8">MEI</th>   
              <th scope="col-" colspan="8">JUN</th>   
              <th scope="col-" colspan="8">JUL</th>   
              <th scope="col-" colspan="8">AUG</th>   
              <th scope="col-" colspan="8">SEP</th>   
              <th scope="col-" colspan="8">OCT</th>   
              <th scope="col-" colspan="8">NOV</th>   
              <th scope="col-" colspan="8">DES</th>   
            </tr>
            <tr>          
              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>   

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>

              <th scope="col-">GP</th>  
              <th scope="col-">TP</th>  
              <th scope="col-">TL</th>  
              <th scope="col-">HI</th>  
              <th scope="col-">PA</th>  
              <th scope="col-">NA</th>  
              <th scope="col-">TB</th>  
              <th scope="col-">PB</th>
            </tr>
          </thead>
          <tbody>  
                <tr>  
                  <td>1</td> 
                  <td>Aris Abdullatif</td> 
                  <td>00.000.000.0-000.000</td> 
                  <td>TK/0</td> 
                  <td>01</td> 
                  <td>01</td>  
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td>

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td>

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td>

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td>

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                   
                </tr>  
                <tr>  
                  <td>1</td> 
                  <td>Maniartina</td> 
                  <td>00.000.000.0-000.000</td> 
                  <td>TK/0</td> 
                  <td>01</td> 
                  <td>03</td> 
                  <td>0</td> 
                  <td>20,000,000</td> 
                  <td>87,800</td> 
                  <td>400,000</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>20,487,800</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                   
                </tr>  
                <tr>  
                  <td>1</td> 
                  <td>Nathalie</td> 
                  <td>00.000.000.0-000.000</td> 
                  <td>K/2</td> 
                  <td>01</td> 
                  <td>03</td> 
                  <td>0</td> 
                  <td>40,000,000</td> 
                  <td>1,189,385</td> 
                  <td>1,000,000</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>42,189,385</td>  

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 

                </tr>  
               
          </tbody>
        </table> 

      </div>
    </div> 

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan'); ?>
    <!-- End of Add Modal Perusahaan -->
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/edit_pph21_kompensasi'); ?>
    <!-- End of Add Modal Perusahaan -->
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/import_pph21'); ?>
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

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->