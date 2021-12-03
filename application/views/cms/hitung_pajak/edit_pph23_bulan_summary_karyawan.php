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
          <form method="POST" action="<?php echo base_url('PPH/Pph23/update_pph_23_bulan_summary_karyawan'); ?>">
          <input type="hidden" name="companyID" value="<?php echo $this->input->get('cid') ?>">
          <input type="hidden" name="pphID" value="<?php echo $this->input->get('pid') ?>">
          <input type="hidden" name="incomeID" value="<?php echo $this->input->get('eid') ?>">
          <input type="hidden" name="monthID" value="<?php echo $this->input->get('mid') ?>">
          <input type="hidden" name="yearID" value="<?php echo $this->input->get('yid') ?>">
          <input type="hidden" class="form-control" value="<?= $employee->row()->NO_ATURAN_DTP; ?>" name="editAturan">
          <input type="hidden" class="form-control" value="<?= $employee->row()->NO_SKD26; ?>" name="editSKD">

          <div class="row">
            <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Nama Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION23_NAME; ?>" name="editNama">
              </div>
               <div class="form-group">
                <label class="label-utama">NPWP Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION23_NPWP; ?>" name="editNPWP">
              </div>
              <div class="form-group">
                <label class="label-utama">Profinsi Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION23_PROVINCE; ?>" name="editProfinsi">
              </div> 
              <div class="form-group">
                <label class="label-utama">No Invoice :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NO_INVOICE; ?>" name="editNoInvoice">
              </div> 
              <div class="form-group">
                <label class="label-utama">Kode Objek :</label> 
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->NAMA_OBJEK_PAJAK; ?>" name="editObjek"> -->
                <select class="custom-select" name="editObjek">
                  <?php 
                    foreach ($KodeObjek->result() as $objek) { 
                      if ($objek->KODE_OBJEK_PAJAK == $employee->row()->KODE_OBJEK_PAJAK) {
                        echo '<option value="'.$employee->row()->KODE_OBJEK_PAJAK.'" selected="selected">'.$employee->row()->NAMA_OBJEK_PAJAK.'</option>';
                      } else{
                        echo '<option value="'.$objek->KODE_OBJEK_PAJAK.'">'.$objek->NAMA_OBJEK_PAJAK.'</option>';
                      }

                    } 
                  ?> 
                </select>
              </div>
              <div class="form-group">
                <label class="label-utama">Mendapatkan Fasilitas :</label> 
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->FASILITAS; ?>" name="editFasilitas"> -->
                <select class="custom-select" name="editFasilitas">
                  <option value="Y" <?php if($employee->row()->FASILITAS=="N"){echo "selected";}?>>Tidak</option>
                  <option value="SKD" <?php if($employee->row()->FASILITAS=="SKD"){echo "selected";}?>>SKD</option>
                  <option value="DTP" <?php if($employee->row()->FASILITAS=="DTP"){echo "selected";}?>>DTP</option>
                </select>
              </div>  
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Jenis Pajak :</label> 
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->JENIS_PAJAK; ?>" name="editJenis">  -->
                <select class="custom-select" name="editJenis">
                  <option value="23" <?php if($employee->row()->FASILITAS=="23"){echo "selected";}?>>23</option>
                  <option value="26" <?php if($employee->row()->FASILITAS=="26"){echo "selected";}?>>26</option> 
                </select>
              </div>
               <div class="form-group">
                <label class="label-utama">NIK Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION23_NIK; ?>" name="editNIK">
              </div>
              <div class="form-group">
                <label class="label-utama">Jenis Dokumen:</label> 
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->NAMA_JENIS_DOKUMEN; ?>" name="editDokumen"> -->
                <select class="custom-select" name="editDokumen">
                  <?php 
                    foreach ($JenisDokumen->result() as $jenis) { 
                      if ($jenis->NAMA_JENIS_DOKUMEN == $employee->row()->NAMA_JENIS_DOKUMEN) {
                        echo '<option value="'.$employee->row()->NAMA_JENIS_DOKUMEN.'" selected="selected">'.$employee->row()->NAMA_JENIS_DOKUMEN.'</option>';
                      } else{
                        echo '<option value="'.$jenis->NAMA_JENIS_DOKUMEN.'">'.$jenis->NAMA_JENIS_DOKUMEN.'</option>';
                      }

                    } 
                  ?> 
                </select>
              </div>
               <div class="form-group">
                <label class="label-utama">Tanggal Invoice :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_INVOICE; ?>" name="editTglInvoice">
              </div>
              <div class="form-group">
                <label class="label-utama">Penghasilan Bruto :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->PENGHASILAN_BRUTO; ?>" name="editBruto">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Tanggal Dokumen :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_DOKUMEN; ?>" name="editTglDok">
              </div>
               <div class="form-group">
                <label class="label-utama">Kota Lawan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TRANSACTION23_CITY; ?>" name="editKota">
              </div>
               <div class="form-group">
                <label class="label-utama">Tanggal Pembayaran :</label> 
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_PEMBAYARAN; ?>" name="editTglBayar">
              </div>
              <div class="form-group">
                <label class="label-utama">No Telpon :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NO_TELPON; ?>" name="editTelpon">
              </div>
               <div class="form-group">
                <label class="label-utama">Keterangan Transaksi :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->KETERANGAN_TRANSAKSI; ?>" name="editKeterangan">
              </div>
            </div>
          </div> <hr>

          <h6><span class="badge badge-success mb-4" id="jenis-title">Data PPH 26</span></h6>  
          <div class="row">
            <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Tanggal Lahir WP Terpotong : <?= $employee->row()->TANGGAL_WP_TERPOTONG; ?></label>  
                <input type="date" class="form-control" value="<?= $employee->row()->TANGGAL_WP_TERPOTONG; ?>" name="editTanggal">
              </div>
              <div class="form-group">
                <label class="label-utama">Alamat WP Terpotong :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->ALAMAT_WP_TERPOTONG; ?>" name="editAlamat">
              </div>
              <div class="form-group">
                <label class="label-utama">No Kitas WP Terpotong :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->NOKITAS_WP_TERPOTONG; ?>" name="editKitas">
              </div> 
              <div class="form-group">
                <label class="label-utama">No Paspor WP Terpotong :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->PASPOR_WP_TERPOTONG; ?>" name="editPaspor">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label class="label-utama">Penggunaan Perkiraan Penghasilan Netto  :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->PERKIRAAN_HASIL_NETO; ?>" name="editNetto">
              </div>
               <div class="form-group">
                <label class="label-utama">Ada P3B :</label>  
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->P3B; ?>" name="editP3B"> -->
                <select class="custom-select" name="editP3B">
                  <option value="Y" <?php if($employee->row()->P3B=="Y"){echo "selected";}?>>Iya</option>
                  <option value="N" <?php if($employee->row()->P3B=="N"){echo "selected";}?>>Tidak</option> 
                </select>
              </div>
               <div class="form-group">
                <label class="label-utama">Memiliki Surat Keterangan Domisili :</label>  
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->SURAT_KETERANGAN_DOMISILI; ?>" name="editDomisili"> -->
                <select class="custom-select" name="editDomisili">
                  <option value="Y" <?php if($employee->row()->SURAT_KETERANGAN_DOMISILI=="Y"){echo "selected";}?>>Iya</option>
                  <option value="N" <?php if($employee->row()->SURAT_KETERANGAN_DOMISILI=="N"){echo "selected";}?>>Tidak</option> 
                </select>
              </div>
               <div class="form-group">
                <label class="label-utama">TIN (dengan format / tanda baca) :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->TIN; ?>" name="editTIN">
              </div>
            </div>
            <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Perkiraan Hasil Netto (%) :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->PRESENTASE_PERKIRAAN_HASIL_NETO; ?>" name="editPerkiraan">
              </div>
               <div class="form-group">
                <label class="label-utama">Tarif P3B :</label>  
                <input type="text" class="form-control" value="<?= $employee->row()->TARIF_P3B; ?>" name="editTarif">
              </div>
              <div class="form-group">
                <label class="label-utama">Kode Negara :</label> 
                <!-- <input type="text" class="form-control" value="<?= $employee->row()->COUNTRY_CODE; ?>" name="editNegara">  -->
                 <select class="custom-select" name="editNegara">
                  <?php 
                    foreach ($NamaNegara->result() as $negara) { 
                      if ($negara->COUNTRY_CODE == $employee->row()->COUNTRY_CODE) {
                        echo '<option value="'.$employee->row()->COUNTRY_CODE.'" selected="selected">'.$employee->row()->COUNTRY_CODE.'</option>';
                      } else{
                        echo '<option value="'.$negara->COUNTRY_CODE.'">'.$negara->COUNTRY_CODE.'</option>';
                      }

                    } 
                  ?> 
                </select>
              </div>
            </div>
          </div> <hr>

           <h6><span class="badge badge-success mb-4" id="fasilitas-title">Fasilitas</span></h6> 
           <div class="row">
             <div class="col-4">
                <div class="form-group">
                <label class="label-utama">Nomor SKB (23) :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NO_SKB23; ?>" name="editSKB">
              </div>  
             </div>
             <div class="col-4">
                <div class="form-group">
                <label class="label-utama">Tarif SKD :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TARIF_SKD; ?>" name="editTarifSKD">
              </div>
             </div>
             <div class="col-4">
                <div class="form-group">
                <label class="label-utama">NTPN DTP :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->NTPN_DTP; ?>" name="editNTPNDTP">
              </div>  
             </div>
           </div> <hr>

           <div class="row">
             <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Total DPP :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TOTAL_DPP23; ?>" name="editDPP" readonly>
              </div>
             </div>
             <div class="col-4">
               <div class="form-group">
                <label class="label-utama">Total PPH 23 :</label> 
                <input type="text" class="form-control" value="<?= $employee->row()->TOTAL_PPHVAL23; ?>" name="editPPH23" readonly>
              </div> 
             </div>
             <div class="col-4">
               
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