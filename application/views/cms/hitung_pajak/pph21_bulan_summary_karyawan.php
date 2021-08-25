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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_21/bulan/summary'); ?>">Summary</a> / Karyawan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body"> 
        <h5><span class="badge badge-success mb-4">PERIODE : JAN-2021</span></h5>  
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr> 
              <th scope="col-">Kode karyawan</th> 
              <th scope="col-">Nama Karyawan</th> 
              <th scope="col-">Tipe Karyawan</th> 
              <th scope="col-">Status Tanggungan</th> 
              <th scope="col-">NPWP</th> 
              <th scope="col-">Mulai Kerja</th> 
              <th scope="col-">Berhenti Kerja</th> 
            </tr>
          </thead>
          <tbody>  
                <tr> 
                  <td>PRF2102-00005</td>   
                  <td>Maniarti</td>   
                  <td>Lokal</td>   
                  <td>TK/0</td>
                  <td>00.000.000.0-000.000</td>
                  <td>01-JAN-2021</td>
                  <td>31-MAR-2021</td>
                </tr>  
               
          </tbody>
        </table>

        <div class="card mt-3 p-2">
        	<div class="row">
        		<div class="col-4">
        			<h6><span class="badge badge-success mb-4">Penghasilan</span></h6>  
        			<div class="form-group">
                        <label for="" class="label-utama">01. Gaji/Pensiun/THT/JHT :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="5.000.000" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">02. Tunjangan PPh :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="27.995" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">03. Tunjangan Lain, Uang Lembur, dan sebagainya :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="200.000" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">04. Honorarium dan Imbalan Lain Sejenisnya :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">05. Premi Asuransi yang dibayar Pemberi Kerja :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">06. Natura dan Kenikmatan Lainnya :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">07. Tantiem, Bonus dan THR :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
                    <hr>
                     <div class="form-group">
                        <label for="" class="label-utama">08. Penghasilan Bruto :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="5.227.995" readonly> 
                    </div>
        		</div>
        		<div class="col-4">
        			<h6><span class="badge badge-success mb-4">Pengurang</span></h6> 
        			<div class="form-group">
                        <label for="" class="label-utama">09. Biaya Jabatan :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="261.400" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">10. Iuran Pensiun atau Iuran JHT/THT :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div> 
        		</div>
        		<div class="col-4">
        			<h6><span class="badge badge-success mb-4">Perhitungan PPh 21</span></h6>  
        			<div class="form-group">
                        <label for="" class="label-utama">11. Penghasilan Bruto Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="62.735.940" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">12. Biaya Jabatan Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="3,136,797" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">13. Iuran Pensiun atau Iuran JHT/THT Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">14. Jumlah Pengurang Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="3.136.797" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">15. Penghasilan Neto Setahun/Disetahunkan :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="59.599.143" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">16. Penghasilan Tidak Kena Pajak (PTKP) :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="54.000.000" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">17. PKP Setahun/Disetahunkan :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="5.599.000" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">18. PPh 21 atas PKP :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="335.940" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">19. PPh 21 Terutang Setahun/Disetahunkan :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="335.940" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">20. PPh 21 Terutang Bulan <span class="text-danger font-weight-bold">JAN-2021</span> :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="27.995" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">21. PKP atas Penghasilan Teratur Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="5,599,000" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">22. PPh 21 atas Penghasilan Teratur Setahun :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="335,940" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="" class="label-utama">23. PPh 21 atas Penghasilan Tidak Teratur :</label>
                        <input type="text" class="form-control form-control-sm" id="" aria-describedby="" value="0" readonly> 
                    </div>
        		</div>
        	</div>
        </div>

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