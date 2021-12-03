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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 22</a> / <a href="<?php echo base_url('pph_22/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_22/bulan/summary'); ?>">Summary</a> / Karyawan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <h5><span class="badge badge-success mb-4">PERIODE : <?= $employee->row()->PERIOD_MONTH . ' - ' . $employee->row()->PERIOD_YEAR; ?></span></h5>

        <div class="card mt-3 p-2">
          <form method="POST" action="<?php echo base_url('PPH/Pph22/update_pph_22_bulan_summary_karyawan'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>">
          <input type="hidden" name="incomeID" value="<?php echo $this->input->get('eid') ?>">
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>">
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>">
          <div class="row">
            <input type="hidden" name="editID" value="<?= $employee->row()->TRANSACTION_ID; ?>">
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Data PPH22</span></h6>
              <div class="form-group">
                <label class="label-utama">Nomor Formulir :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NO_FORMULIR; ?>" name="editNoForm">
              </div>
              <div class="form-group">
                <label class="label-utama">Nama Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION_NAME; ?>" name="editNama">
              </div>
              <div class="form-group">
                <label class="label-utama">NPWP Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION_NPWP; ?>" name="editNPWP">
              </div>
               <div class="form-group">
                <label class="label-utama">Alamat Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION_ADDRESS; ?>" name="editAlamat">
              </div>
               <div class="form-group">
                <label class="label-utama">Nomor Bukti Potong :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NO_BUKTI_POTONG; ?>" name="editNoBuktiPotong">
              </div>
              <div class="form-group">
                <label class="label-utama">Tanggal Bukti Potong :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_BUKTI_POTONG; ?>" name="editTglBuktiPotong">
              </div>
              <div class="form-group">
                <label class="label-utama">Keterangan Transaksi :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION_NOTES; ?>" name="editKeterangan">
              </div> 
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Bidang Industri Tertentu</span></h6>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Semen :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_SEMEN); ?>" name="editSemen"> 
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Kertas :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_KERTAS); ?>" name="editKertas">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Baja :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_BAJA); ?>" name="editBaja">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Otomotif :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_OTOMOTIF); ?>" name="editOtomotif">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Farmasi :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_FARMASI); ?>" name="editFarmasi">
              </div> <hr>
              <h6><span class="badge badge-success mb-4">BBM, BBG, Pelumas</span></h6>
              <div class="form-group">
                <label class="label-utama">Penyalur / Agen :</label>  
                  <select class="custom-select" name="editPenyalur">
                    <option selected value="<?= $employee->row()->PENYALUR_AGEN; ?>"> <?= $employee->row()->PENYALUR_AGEN;?> </option>
                    <option value="Y">YA</option>
                    <option value="N">TIDAK</option> 
                  </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto BBM & BBG :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_BBM_BBG); ?>" name="editBBMBBG">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Pelumas :</label>  
                <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO_PELUMAS); ?>" name="editPelumas">
              </div>
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Barang yang Tergolong</span></h6>
              <div class="form-group">
                <label class="label-utama">Jenis :</label>
                <!-- <input type="text" class="form-control" value="<?= number_format($employee->row()->BRUTO * 12); ?>" readonly> -->
                <input type="text" class="form-control" value="<?= $employee->row()->PRODUCT_TYPE; ?>" name="editType">
              </div>
              <div class="form-group">
                <label class="label-utama">Harga Jual :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->SELLING_PRICE); ?>" name="editHarga">
              </div> <hr> 
              <h6><span class="badge badge-success mb-4">Lainnya</span></h6>
              <div class="form-group">
                <label class="label-utama">Pembelian Bahan untuk Keperluan Industri atau Ekspor dari Pedagang Pengumpul :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->SELLING_INDUSTRI_MATERIALS); ?>" name="editIndustri">
              </div>
              <div class="form-group">
                <label class="label-utama">Pembelian Batubara, Mineral Logam, dan Mineral Bukan Logam, dari Badan atau Orang Pribadi Pemegang Izin Usaha Pertambangan oleh Industri atau Badan Usaha (Rp) :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->SELLING_BUSINESS_MINING); ?>" name="editMining">
              </div> <hr> 
              <h6><span class="badge badge-success mb-4">Hasil Kalkulasi</span></h6>
              <div class="form-group">
                <label class="label-utama">TOTAL DPP :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->TOTAL_DPP); ?>" name="editIndustri" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">TOTAL PPH22 :</label> 
                <input type="text" class="form-control" value="<?= number_format($employee->row()->TOTAL_PPH22); ?>" name="editMining" readonly>
              </div>  
            </div>
          </div>
          <hr>
            <div class="row">
                <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Hitung dan Simpan</button>
                <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('pph_21/bulan/summary/karyawan/edit'); ?>">Kembali</a>
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