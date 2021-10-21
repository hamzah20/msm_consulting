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
          <h1>PPH22 / Tambah Transaksi</h1>
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
        <div class="card mt-3 p-2">
          <form method="POST" action="<?php echo base_url('PPH/Pph22/insert_transaksi'); ?>"> 
          <div class="row"> 
            <input type="hidden" class="form-control" name="pphID" value="<?php echo $this->input->get('pid'); ?>">
            <input type="hidden" class="form-control" name="companyID" value="<?php echo $this->input->get('cid'); ?>">
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Data PPH22</span></h6>
              <div class="form-group">
                <label class="label-utama">Nomor Formulir :</label> 
                <input type="text" class="form-control" name="addNoForm">
              </div>
              <div class="form-group">
                <label class="label-utama">Nama Lawan Transaksi :</label>  
                <select class="custom-select" name="addNama">
                  <?php foreach ($NamaTransaksi->result() as $nama) { ?>
                    <option value="<?= $nama->TRANSACTION_NAME; ?>"><?= $nama->TRANSACTION_NAME; ?></option> 
                  <?php } ?> 
                </select>
              </div> 
              <div class="form-group">
                <label class="label-utama">Nomor Bukti Potong :</label> 
                <input type="text" class="form-control" name="addNoBuktiPotong">
              </div>
              <div class="form-group">
                <label class="label-utama">Tanggal Bukti Potong :</label> 
                <input type="date" class="form-control"  name="addTglBuktiPotong">
              </div>
              <div class="form-group">
                <label class="label-utama">Keterangan Transaksi :</label>  
                <input type="text" class="form-control"  name="addKeterangan">
              </div> 
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Bidang Industri Tertentu</span></h6>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Semen :</label> 
                <input type="text" class="form-control"  name="addSemen"> 
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Kertas :</label>  
                <input type="text" class="form-control" name="addKertas">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Baja :</label>  
                <input type="text" class="form-control"  name="addBaja">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Otomotif :</label>  
                <input type="text" class="form-control"  name="addOtomotif">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Farmasi :</label>  
                <input type="text" class="form-control" name="addFarmasi">
              </div> <hr>
              <h6><span class="badge badge-success mb-4">BBM, BBG, Pelumas</span></h6>
              <div class="form-group">
                <label class="label-utama">Penyalur / Agen :</label>  
                <div class="form-group"> 
                  <select class="custom-select" name="addPenyalur">
                    <option value="Y">YA</option>
                    <option value="N">TIDAK</option> 
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto BBM & BBG :</label>  
                <input type="text" class="form-control" name="addBBMBBG">
              </div>
              <div class="form-group">
                <label class="label-utama">Penjualan Bruto Pelumas :</label>  
                <input type="text" class="form-control" name="addPelumas">
              </div>
            </div>
            <div class="col-4">
              <h6><span class="badge badge-success mb-4">Barang yang Tergolong</span></h6>
              <div class="form-group">
                <label class="label-utama">Jenis :</label>  
                <select class="custom-select" name="addType">
                  <?php foreach ($ProductType->result() as $type) { ?>
                    <option value="<?= $type->TYPE_ID; ?>"><?= $type->TYPE_ID; ?></option> 
                  <?php } ?> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Harga Jual :</label> 
                <input type="text" class="form-control" name="addHarga">
              </div> <hr> 
              <h6><span class="badge badge-success mb-4">Lainnya</span></h6>
              <div class="form-group">
                <label class="label-utama">Pembelian Bahan untuk Keperluan Industri atau Ekspor dari Pedagang Pengumpul :</label> 
                <input type="text" class="form-control" name="addIndustri">
              </div>
              <div class="form-group">
                <label class="label-utama">Pembelian Batubara, Mineral Logam, dan Mineral Bukan Logam, dari Badan atau Orang Pribadi Pemegang Izin Usaha Pertambangan oleh Industri atau Badan Usaha (Rp) :</label> 
                <input type="text" class="form-control" name="addMining">
              </div>
            </div>
          </div>
          <hr>
            <div class="row">
                <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Hitung dan Simpan</button>
                <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('pph_21/bulan/summary/karyawan/add'); ?>">Kembali</a>
            </div>
          </form>
        </div>

      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan'); ?>
    <!-- End of Add Modal Perusahaan -->
    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_kompensasi'); ?>
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