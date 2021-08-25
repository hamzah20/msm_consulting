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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_21/bulan/summary'); ?>">Summary</a> / <a href="<?php echo base_url('pph_21/bulan/summary/aktifitas_pajak') ?>">Aktifitas Pajak</a> / Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
       <form method="POST" action="#">
       		<div class="row">
	        	<div class="col-3">
	        		<div class="form-group">
	              <label for="" class="label-utama font-weight-bold">Nama Perusahaan (Klien)</label>
	              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtNamaPerusahaan" value="PT. Wijaya Karya" readonly> 
	            </div>
	        	</div>
	        	<div class="col-3">
	        		<div class="form-group">
	              <label for="" class="label-utama font-weight-bold">Jenis Pajak</label>
	              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtJenisPajak" value="Pasal 21" readonly> 
	            </div>
	        	</div>
	        	<div class="col-3">
	        		<div class="form-group">
	              <label for="" class="label-utama font-weight-bold">Masa (Periode)</label>
	              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPeriode" value="JAN-2021" readonly> 
	            </div>
	        	</div>
	        	<div class="col-3">
	        		<div class="form-group">
	              <label for="" class="label-utama font-weight-bold">Jumlah KB (Kurang Bayar)</label>
	              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtKurangBayar" value="454,320" readonly> 
	            </div>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-12">
	        		<div class="form-group">
	              <label for="" class="label-utama font-weight-bold">Status Aktifitas Pajak</label>
	              <div class="input-group">
	                <a class="btn btn-sm btn-danger mr-2" data-placement="top" title="Detail Status" href="#" data-toggle="modal" data-target="#detailAktifitasPajak"><i class="fa fa-eye"></i></a>
	                <select class="form-control option-pegawai" name="txtStatusPajak">
	                    <option value="1">[1] Buat template Laporan Pajak</option>  
	                    <option value="2">[2] Minta atau Konfirmasi data PPh, sesuai dengan Jenis Pajak ke klien</option>  
	                    <option value="3">[3] Persiapan data yang diperlukan, untuk dikirimkan ke MSM</option>  
	                    <option value="4">[4] Verifikasi data Klien(konfirmasi/diskusi kelengkapan)</option>  
	                    <option value="5">[5] Proses data pajak, kirim hasil proses, konfirmasi persetujuan Klien</option>  
	                    <option value="6">[6] Pembuatan/penerbitan Kode Billing (SSE : Surat Setoran Elektronik)</option>  
	                    <option value="7">[7] Lakukan pembayaran, info bukti pembayaran ke MSM (Upload)</option>  
	                    <option value="8">[8] Lapor Pajak ke DJP, info bukti lapor ke klien (Upload)</option>  
	                    <option value="9">[9] Selesai</option>  
	                </select> 
	              </div>  
	            </div>
	        	</div>
	        </div> 	<hr>
	        <a class="btn btn-sm btn-success" href="#" role="button">Simpan Data</a>
       </form>
      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan'); ?>
    <!-- End of Add Modal Perusahaan -->
    <!-- Detail Aktifitas Pajak -->
    <?php $this->load->view('modal/detail_status_aktifitas_pajak'); ?>
    <!-- End of Detail Aktifitas Pajak --> 

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