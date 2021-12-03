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
          <h1>PPH 25</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"> <a href="<?php echo base_url('pph_25'); ?>"> PPH 25</a> / Edit Masukan</li>
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
          <form method="POST" action="<?php echo base_url('PPH/Pph25/update_pph_25_masukan'); ?>">
          <input type="hidden" name="masukanID" value="<?php echo $this->input->get('id') ?>"> 
          <h6><span class="badge badge-success mb-4">Data PPH 25</span></h6> 
          <div class="row">
            <div class="col-4"> 
              <div class="form-group">
                <label class="label-utama">Kode Jenis :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->KODE_JENIS; ?>" name="editKodeJenis" readonly>
              </div>       
                         
            </div>
            <div class="col-4">  
               <div class="form-group">
                <label class="label-utama">FG Pengganti :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->FG_PENGGANTI; ?>" name="editFGPengganti" readonly>
              </div>    

            </div>
            <div class="col-4">
             
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Bulan :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->PERIOD_MONTH; ?>" name="editBulan" readonly>
              </div>   
               <div class="form-group">
                <label class="label-utama">NPWP Faktur :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->FACTURE_NPWP; ?>" name="editNPWP" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">Total DPP :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->TOTAL_DPP; ?>" name="editDPP" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">Creditable :</label> 
                <select class="custom-select" name="editCreditable">
                  <?php 
                    if($masukan->row()->CREDITABLE_F == '0'){
                  ?>
                      <option selected value="<?= $masukan->row()->CREDITABLE_F; ?>"> TIDAK </option>
                  <?php
                    } elseif($masukan->row()->CREDITABLE_F == '1'){
                  ?>
                      <option selected value="<?= $masukan->row()->CREDITABLE_F; ?>"> IYA </option>
                  <?php
                    }
                  ?> 
                  <option value="1">IYA</option>
                  <option value="0">TIDAK</option> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Notes :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->NOTES; ?>" name="editNote">
              </div>
            </div>
            <div class="col-4"> 
               <div class="form-group">
                <label class="label-utama">Tahun :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->PERIOD_YEAR; ?>" name="editTahun" readonly>
              </div>       
               <div class="form-group">
                <label class="label-utama">Nama Faktur :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->FACTURE_NAME; ?>" name="editNama" readonly>
              </div>  
              <div class="form-group">
                <label class="label-utama">Total PPN :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->TOTAL_PPN; ?>" name="editPPN" readonly>
              </div>

              <div class="form-group">
               <label class="label-utama">Riview :</label> 
               <select class="custom-select" name="editRiview">
                  <?php 
                    if($masukan->row()->RIVIEW_F == 'BELUM'){
                  ?>
                      <option selected value="<?= $masukan->row()->RIVIEW_F; ?>"> Belum </option>
                  <?php
                    } elseif($masukan->row()->RIVIEW_F == 'SUDAH'){
                  ?>
                      <option selected value="<?= $masukan->row()->RIVIEW_F; ?>"> Sudah </option>
                  <?php
                    }
                  ?> 
                  <option value="SUDAH">Sudah</option>
                  <option value="BELUM">Belum</option> 
                </select>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">No Facture :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->NOMOR_DIREKTUR; ?>" name="editFacture" readonly>
              </div>     
               <div class="form-group">
                <label class="label-utama">Alamat Faktur :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->FACTURE_ADDRESS; ?>" name="editAlamat" readonly>
              </div>       
              <div class="form-group">
                <label class="label-utama">Total PPNBM :</label> 
                <input type="text" class="form-control" value="<?= $masukan->row()->TOTAL_PPNBM; ?>" name="editPPNBM" readonly>
              </div>
              <div class="form-group">
                <label class="label-utama">Status :</label> 
                <select class="custom-select" name="editStatus"> 
                  <option selected value="<?= $masukan->row()->STATUS_F; ?>"> <?= $masukan->row()->STATUS_F;?> </option>
                  <option value="NORMAL">Normal</option>
                  <option value="PENGGANTI">Pengganti</option> 
                  <option value="BATAL">Batal</option> 
                  <option value="DIGANTI">Diganti</option> 
                </select>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
              <button class="btn btn-sm btn-success col-2 ml-3 mb-3" type="submit">Simpan</button>
              <a class="btn btn-sm btn-secondary col-2 ml-2 mb-3" type="submit" href="<?php echo base_url('pph_25'); ?>">Kembali</a>
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