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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 23 26</a> / <a href="<?php echo base_url('pph_23/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_23/bulan/summary'); ?>">Summary</a> / Karyawan</li>
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
          <form method="POST" action="<?php echo base_url('PPH/Pph23/insert_transaksi'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>"> 
          <h6><span class="badge badge-success mb-4">Data PPH 23 26</span></h6> 
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Nama Lawan Transaksi :</label> 
                <select class="custom-select" name="addNama">
                  <?php foreach ($NamaTransaksi->result() as $nama) { ?>
                    <option value="<?= $nama->TRANSACTION23_NAME; ?>"><?= $nama->TRANSACTION23_NAME; ?></option> 
                  <?php } ?> 
                </select>
              </div> 
              <div class="form-group">
                <label class="label-utama">No Invoice :</label> 
                <input type="text" class="form-control" name="addNoInvoice">
              </div> 
              <div class="form-group">
                <label class="label-utama">Kode Objek :</label> 
                <select class="custom-select" name="addObjek">
                  <?php foreach ($KodeObjek->result() as $objek) { ?>
                    <option value="<?= $objek->KODE_OBJEK_PAJAK; ?>"><?= $objek->KODE_OBJEK_PAJAK; ?></option> 
                  <?php } ?> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Mendapatkan Fasilitas :</label> 
                <select class="custom-select" name="addFasilitas" id="fasilitas_change"> 
                  <option value="N">Tidak</option>  
                  <option value="SKD">SKD</option>  
                  <option value="DTP">DTP</option>  
                </select>
              </div>  
              
            </div>
            <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Jenis Pajak :</label> 
                <select class="custom-select" name="addJenis" id="jenis_change"> 
                  <option value="23">23</option>  
                  <option value="26">26</option>  
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Jenis Dokumen:</label> 
                <select class="custom-select" name="addDokumen">
                  <?php foreach ($JenisDokumen->result() as $dokumen) { ?>
                    <option value="<?= $dokumen->NAMA_JENIS_DOKUMEN; ?>"><?= $dokumen->NAMA_JENIS_DOKUMEN; ?></option> 
                  <?php } ?> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Tanggal Invoice :</label> 
                <input type="date" class="form-control" name="addTglInvoice">
              </div>
              <div class="form-group">
                <label class="label-utama">Penghasilan Bruto :</label> 
                <input type="text" class="form-control" name="addBruto">
              </div> 
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Tanggal Dokumen :</label> 
                <input type="date" class="form-control" name="addTglDokumen">
              </div>
              <div class="form-group">
                <label class="label-utama">Tanggal Pembayaran :</label> 
                <input type="date" class="form-control" name="addTglPembayaran">
              </div>
               <div class="form-group">
                <label class="label-utama">No Telpon :</label> 
                <input type="text" class="form-control" name="addTelpon">
              </div>
              <div class="form-group">
                <label class="label-utama">Keterangan Transaksi :</label> 
                <input type="text" class="form-control" name="addKetTransaksi">
              </div>
            </div>
          </div> <hr>
          <h6><span class="badge badge-success mb-4" style="display: none" id="jenis-title">Data PPH 26</span></h6>  
          <div class="row" style="display: none" id="jenis">
            <div class="col-4"> 
              <div class="form-group">
                <label class="label-utama">Tanggal Lahir WP Terpotong :</label>  
                <input type="date" class="form-control" name="addTanggal">
              </div>
              <div class="form-group">
                <label class="label-utama">Alamat WP Terpotong :</label>  
                <input type="text" class="form-control" name="addAlamat">
              </div>
              <div class="form-group">
                <label class="label-utama">No Kitas WP Terpotong :</label>  
                <input type="text" class="form-control" name="addKitas">
              </div> 
              <div class="form-group">
                <label class="label-utama">No Paspor WP Terpotong :</label>  
                <input type="text" class="form-control" name="addPaspor">
              </div>  
            </div> 
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Penggunaan Perkiraan Penghasilan Netto  :</label>  
                <select class="custom-select" name="addNetto"> 
                  <option value="Y">Iya</option>  
                  <option value="N">Tidak</option>  
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Ada P3B :</label>  
                <select class="custom-select" name="addP3B"> 
                  <option value="Y">Iya</option>  
                  <option value="N">Tidak</option>  
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Memiliki Surat Keterangan Domisili :</label>  
                <select class="custom-select" name="addDomisili"> 
                  <option value="Y">Iya</option>  
                  <option value="N">Tidak</option>  
                </select>
              </div>
               <div class="form-group">
                <label class="label-utama">TIN (dengan format / tanda baca) :</label>  
                <input type="text" class="form-control" name="addTIN">
              </div> 
            </div>
            <div class="col-4">
             <div class="form-group">
                <label class="label-utama">Perkiraan Hasil Netto (%) :</label>  
                <input type="text" class="form-control" name="addPerkiraan">
              </div>
             <div class="form-group">
                <label class="label-utama">Tarif P3B :</label>  
                <input type="text" class="form-control" name="addP3BTarif">
              </div>
              <div class="form-group">
                <label class="label-utama">Kode Negara :</label> 
                <select class="custom-select" name="addNegara">
                  <?php foreach ($NamaNegara->result() as $negara) { ?>
                    <option value="<?= $negara->COUNTRY_CODE; ?>"><?= $negara->COUNTRY_DESC; ?></option> 
                  <?php } ?> 
                </select>
              </div>
            </div>
          </div> <hr>
           <h6><span class="badge badge-success mb-4" style="display: none" id="fasilitas-title">Fasilitas</span></h6> 
          <div class="row" style="display: none" id="fasilitas">
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Nomor SKB :</label> 
                <input type="text" class="form-control" name="addSKB">
              </div>   
            </div>
            <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Tarif SKB :</label> 
                <input type="text" class="form-control" name="addTarifSKD">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">NTPN DTP :</label> 
                <input type="text" class="form-control" name="addNTPNDTP">
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
    <script type="text/javascript">
      jQuery(document).ready(function(){
          document.getElementById("fasilitas_change").onchange = function() { 
             var facility= document.getElementById("fasilitas_change").value;
            // alert(facility);
             if(facility!='N'){
              document.getElementById("fasilitas-title").style.display = 'inline-block';
              document.getElementById("fasilitas").style.display = 'inline-block';
             }
             else{
              document.getElementById("fasilitas-title").style.display = 'none';
              document.getElementById("fasilitas").style.display = 'none';
             }
          };

          document.getElementById("jenis_change").onchange = function() { 
             var facility= document.getElementById("jenis_change").value;
            // alert(facility);
             if(facility!='23'){
              document.getElementById("jenis-title").style.display = 'inline-block';
              document.getElementById("jenis").style.display = 'inline-block';
             }
             else{
              document.getElementById("jenis-title").style.display = 'none';
              document.getElementById("jenis").style.display = 'none';
             }
          };

      });
    </script>
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