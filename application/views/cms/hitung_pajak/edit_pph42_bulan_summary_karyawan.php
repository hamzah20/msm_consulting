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
            <li class="active"> <a href="<?php echo base_url('pph_42'); ?>"> PPH 4(2)</a> / <a href="<?php echo base_url('pph_42/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_42/bulan/summary'); ?>">Summary</a> / Karyawan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
       

        <div class="card mt-3 p-2">
          <form method="POST" action="<?php echo base_url('PPH/Pph42/update_pph_42_bulan_summary_karyawan'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>">
          <input type="hidden" name="incomeID" value="<?php echo $this->input->get('eid') ?>">
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>">
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>">
          <h6><span class="badge badge-success mb-4">Data PPH 4(2)</span></h6> 
          <div class="row">
            <div class="col-4"> 
              <div class="form-group">
                <label class="label-utama">Nama WP Dipotong :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NAMA_WP_DIPOTONG; ?>" name="editNama">
              </div>   
               <div class="form-group">
                <label class="label-utama">NPWP WP Dipotong :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NPWP_WP_DIPOTONG; ?>" name="editNPWP">
              </div>   
               <div class="form-group">
                <label class="label-utama">NIK Lawan Transaksi (jika tidak memiliki NPWP) :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NIK_LAWAN_TRANSAKSI; ?>" name="editNIK">
              </div>   
              <div class="form-group">
                <label class="label-utama">Alamat WP Dipotong :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->ALAMAT_WP_POTONG; ?>" name="editAlamat">
              </div>  
               <div class="form-group">
                <label class="label-utama">Nomor Bukti Dipotong :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NOMOR_BUKTI_POTONG; ?>" name="editNoPotong">
              </div>   
               <div class="form-group">
                <label class="label-utama">Tanggal Bukti Dipotong :</label>  
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_BUKTI_POTONG; ?>" name="editTanggal">
              </div>   
               <div class="form-group">
                <label class="label-utama">Jenis Penghasilan :</label>   
                <select class="custom-select" name="editJenis">
                  <?php 
                    foreach ($NamaJenis->result() as $nama) { 
                      if ($nama->NAMA_OBJEK_PAJAK42 == $employee->row()->NAMA_OBJEK_PAJAK42) {
                        echo '<option value="'.$employee->row()->NAMA_OBJEK_PAJAK42.'" selected="selected">'.$employee->row()->NAMA_OBJEK_PAJAK42.'</option>';
                      } else{
                        echo '<option value="'.$nama->NAMA_OBJEK_PAJAK42.'">'.$nama->NAMA_OBJEK_PAJAK42.'</option>';
                      }

                    } 
                  ?> 
                </select>
              </div>   
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Jenis Bunga Deposito :</label>   
                <select class="custom-select" name="editPremi">
                  <?php 
                    foreach ($NamaDeposit->result() as $nama) { 
                      if ($nama->DEPOSITO_NAME == $employee->row()->DEPOSITO_NAME) {
                        echo '<option value="'.$employee->row()->DEPOSITO_NAME.'" selected="selected">'.$employee->row()->DEPOSITO_NAME.'</option>';
                      } else{
                        echo '<option value="'.$nama->DEPOSITO_NAME.'">'.$nama->DEPOSITO_NAME.'</option>';
                      }

                    } 
                  ?> 
                </select>
              </div>   
               <div class="form-group">
                <label class="label-utama">Uraian Penghasilan :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->HU_URAIAN_PENGHASILAN; ?>" name="editUraian">
              </div>   
               <div class="form-group">
                <label class="label-utama">NOP - Sewa Tanah Bangunan:</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->STB_NOP; ?>" name="editSTBNOP">
              </div>   
              <div class="form-group">
                <label class="label-utama">Lokasi Objek Pajak - Sewa Tanah Bangunan :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->STB_LOKASI_OBJEK_PAJAK; ?>"name="editSTBLokasi">
              </div>  
               <div class="form-group">
                <label class="label-utama">NOP - Sewa Tanah Bangunan (dibayar sendiri):</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->STB_BS_NOP; ?>" name="editBSNOP">
              </div>   
               <div class="form-group">
                <label class="label-utama">Lokasi Objek Pajak - Sewa Tanah Bangunan (dibayar sendiri):</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->STB_BS_LOKASI_OBJEK_PAJAK; ?>" name="editBSLokasi">
              </div>   
               <div class="form-group">
                <label class="label-utama">NTPN - Sewa Tanah Bangunan (dibayar sendiri):</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->STB_BS_NTPN; ?>" name="editBSNTPN">
              </div>   
              <div class="form-group">
                <label class="label-utama">Tanggal NTPN - Sewa Tanah Bangunan (dibayar sendiri):</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->STB_BS_TANGGAL_NTPN; ?>" name="editBSTanggalNTPN">
              </div>   
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">NTPN - Jasa Kontruksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->JK_BS_NTPN; ?>" name="editJKNTPN">
              </div>   
               <div class="form-group">
                <label class="label-utama">Tanggal NTPN - Jasa Kontruksi :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->JK_BS_TANGGAL_NTPN; ?>" name="editJKTanggalNTPN">
              </div>   
               <div class="form-group">
                <label class="label-utama">NTPN - Pengalihan Hak Atas :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->PHTB_NTPN; ?>" name="editPHANTPN">
              </div>   
              <div class="form-group">
                <label class="label-utama">Tanggal NTPN - Pengalihan Hak Atas :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->PHTB_TANGGAL_NTPN; ?>" name="editPHATanggalNTPN">
              </div>  
               <div class="form-group">
                <label class="label-utama">Bruto :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->BRUTO; ?>" name="editBruto">
              </div>   
            </div>
          </div>
          <hr>
          <div class="row">
              <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Hitung dan Simpan</button>
              <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('pph_23/bulan/summary/karyawan/edit'); ?>">Kembali</a>
          </div>
          </form>
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