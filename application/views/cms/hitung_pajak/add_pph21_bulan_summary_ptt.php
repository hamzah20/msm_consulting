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
          <h1>PPH 21</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <?php 
              $pid=$this->input->get('pid');
              $cid=$this->input->get('cid');
              $mid=$this->input->get('mid');
              $yid=$this->input->get('yid');
             ?>
            <li class="active"> <a href="<?php echo base_url("pph_21"); ?>"> PPH 21</a> / <a href="<?php echo base_url("pph_21/bulan?cid=$cid&yid=$yid") ?>">Bulanan</a> / <a href="<?php echo base_url("pph_21/bulan/summary?pid=$pid&cid=$cid&mid=$mid&yid=$yid"); ?>">Summary</a> / <a href="<?php echo base_url("pph_21/bulan/summary/tidak_tetap?pid=$pid&cid=$cid&mid=$mid&yid=$yid"); ?>">Karyawan Tidak Tetap</a> / Tambah</li>
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
          <form method="POST" action="<?php echo base_url('PPH/Pph21/insert_pph21_ptt'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>"> 
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>"> 
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>"> 
          <h6><span class="badge badge-success mb-4">Data PPH 21 PTT</span></h6> 
          <div class="row">
            <div class="col-4"> 
              <div class="form-group">
                <label class="label-utama">Nama Pegawai :</label> 
                <input type="text" class="form-control" name="NAMA_PEGAWAI">
              </div>   
               <div class="form-group">
                <label class="label-utama">NPWP :</label> 
                <input type="text" class="form-control" name="NPWP">
              </div>   
               <div class="form-group">
                <label class="label-utama">NIK / No. Paspor :</label> 
                <input type="text" class="form-control" name="NIK_PASPOR">
              </div>   
              <div class="form-group">
                <label class="label-utama">Alamat :</label> 
                <textarea class="form-control" name="ALAMAT"></textarea>
              </div>  
               <div class="form-group">
                <label class="label-utama">WP Asing :</label> 
                <input type="text" class="form-control" name="WP_ASING">
              </div>      
            </div>
            <div class="col-4">  
              <div class="form-group">
                <label class="label-utama">Kode Negara :</label>  
                <input type="text" class="form-control" name="COUNTRY_CODE">
              </div>  
               <div class="form-group">
                <label class="label-utama">Nomor Bukti Potong :</label> 
                <input type="text" class="form-control" name="NOMOR_BUKTI_POTONG">
              </div>   
               <div class="form-group">
                <label class="label-utama">Tanggal Bukti Potong :</label> 
                <input type="date" class="form-control" name="TANGGAL_BUKTI_POTONG">
              </div>   
              <div class="form-group">
                <label class="label-utama">Kode Objek :</label> 
                <select class="custom-select" name="KODE_OBJEK">
                	<?php foreach ($obj_pajak->result() as $objek_pajak) { ?>
                    <option value="<?= $objek_pajak->KODE_OBJEK_PAJAK; ?>"><?= $objek_pajak->NAMA_OBJEK_PAJAK; ?></option> 
                  <?php } ?> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">TK ID :</label> 
                <select class="custom-select" name="TK_ID">
                	<?php foreach ($obj_tk->result() as $objek_tk) { ?>
                    <option value="<?= $objek_tk->TK_ID; ?>"><?= $objek_tk->TK_NAME; ?></option> 
                  	<?php } ?> 
                </select>
              </div> 
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Metode :</label> 
                <input type="text" class="form-control" name="METODE">
              </div>   
               <div class="form-group">
                <label class="label-utama">Golongan :</label> 
                <input type="text" class="form-control" name="GOLONGAN">
              </div>     
              <div class="form-group">
                <label class="label-utama">Sifat Penghasilan :</label> 
                <input type="text" class="form-control" name="SIFAT_PENGHASILAN">
              </div>  
              <div class="form-group">
                <label class="label-utama">Penghasilan Lainnya :</label> 
                <input type="number" class="form-control" name="PENGHASILAN_LAINNYA">
              </div>  
              <div class="form-group">
                <label class="label-utama">Penghasilan Bruto :</label> 
                <input type="number" class="form-control" name="PENGHASILAN_BRUTO">
              </div>  
              <div class="form-group">
                <label class="label-utama">Status :</label> 
                <input type="text" class="form-control" name="STATUS" disabled value="ON PROGRESS">
              </div>  
            </div>
          </div>
          <hr>
          <div class="row">
              <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Simpan</button>
              <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?= base_url('pph_21/bulan/summary/tidak_tetap?pid='.$this->input->get('pid').'&cid='.$this->input->get('cid') . '&mid=' . $this->input->get('mid') . '&yid=' . $this->input->get('yid') ); ?>">Kembali</a>
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