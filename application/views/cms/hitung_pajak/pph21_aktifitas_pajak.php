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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan') ?>">Bulanan</a> / <a href="<?php echo base_url('pph_21/bulan/summary'); ?>">Summary</a> / Aktifitas Pajak</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-sm btn-warning text-white" href="<?php echo base_url('pph_21/bulan/summary/aktifitas_pajak/edit'); ?>" role="button">Edit Data</a> 
        <hr> 
        <div class="row">
        	<div class="col-3">
        		<div class="form-group">
              <label for="txtNamaPerusahaan" class="label-utama font-weight-bold">Nama Perusahaan (Klien)</label>
              <input type="text" class="form-control form-control-sm" id="txtNamaPerusahaan" aria-describedby="" name="txtNamaPerusahaan" value="" placeholder="....." readonly> 
            </div>
        	</div>
        	<div class="col-3">
        		<div class="form-group">
              <label for="txtJenisPajak" class="label-utama font-weight-bold">Jenis Pajak</label>
              <input type="text" class="form-control form-control-sm" id="txtJenisPajak" aria-describedby="" name="txtJenisPajak" value="" placeholder="....." readonly> 
            </div>
        	</div>
        	<div class="col-3">
        		<div class="form-group">
              <label for="txtPeriode" class="label-utama font-weight-bold">Masa (Periode)</label>
              <input type="text" class="form-control form-control-sm" id="txtPeriode" aria-describedby="" name="txtPeriode" value="" placeholder="....." readonly> 
            </div>
        	</div>
        	<div class="col-3">
        		<div class="form-group">
              <label for="txtKurangBayar" class="label-utama font-weight-bold">Jumlah KB (Kurang Bayar)</label>
              <input type="text" class="form-control form-control-sm" id="txtKurangBayar" aria-describedby="" name="txtKurangBayar" value="" placeholder="....." readonly> 
            </div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="form-group">
              <label for="txtAktifitasPajak" class="label-utama font-weight-bold">Status Aktifitas Pajak</label>
              <div class="input-group">
                <a class="btn btn-sm btn-danger mr-2" data-placement="top" title="Detail Status" href="#" data-toggle="modal" data-target="#detailAktifitasPajak"><i class="fa fa-eye"></i></a>
                <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtAktifitasPajak" value="" placeholder="....." readonly>
              </div>  
            </div>
        	</div>
        </div> 

        <label for="" class="label-utama font-weight-bold mt-3">Dokumen / Bukti Proses Pembayaran</label>
        <div class="card">
          <div class="card-body">
            <table class="table" id="companyTable">
              <thead class="thead-dark">
                <tr> 
                  <th scope="col-1">No</th>  
                  <th scope="col-1">Kode Biling</th>  
                  <th scope="col-1">Kode NTPN</th>  
                  <th scope="col-1">Nominal</th>  
                  <th scope="col-7">Dokumen / Bukti</th>  
                  <th scope="col-1">Aksi</th>  
                </tr>
              </thead>
              <tbody>  
                    <tr> 
                      <td>1</td> 
                      <td>1234213412</td> 
                      <td>13421341234213</td> 
                      <td>263,245 </td> 
                      <td></td> 
                      <td>
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lihatDokumenBukti" data-placement="top" title="Lihat" href="#"><i class="fa fa-eye"></i></a> 
                      </td> 
                      
                    </tr> 

                    <tr> 
                      <td colspan="3"><span class="font-weight-bold">TOTAL</span></td>  
                      <td class="font-weight-bold">263,245</td> 
                      <td class="font-weight-bold"></td> 
                      <td class="font-weight-bold"></td>  
                    </tr> 
                   
              </tbody>
            </table>
          </div>
        </div>
        
        <label for="" class="label-utama font-weight-bold mt-3">Dokumen / Bukti Lapor</label>
        <div class="card">
          <div class="card-body">
            <table class="table" id="companyTable">
              <thead class="thead-dark">
                <tr> 
                  <th scope="col-1">No</th>  
                  <th scope="col-1">Tanggal Penyampaian</th>  
                  <th scope="col-1">Kode NTTE</th>  
                  <th scope="col-1">Nominal</th>  
                  <th scope="col-7">Dokumen / Bukti</th>  
                  <th scope="col-1">Aksi</th>  
                </tr>
              </thead>
              <tbody>  
                    <tr> 
                      <td>1</td> 
                      <td>12 Januari 2021</td> 
                      <td>13421341234213</td> 
                      <td>263,245 </td> 
                      <td></td> 
                      <td>
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lihatDokumenBukti" data-placement="top" title="Lihat" href="#"><i class="fa fa-eye"></i></a> 
                      </td> 
                      
                    </tr> 

                    <tr> 
                      <td colspan="3"><span class="font-weight-bold">TOTAL</span></td>  
                      <td class="font-weight-bold">263,245</td> 
                      <td class="font-weight-bold"></td> 
                      <td class="font-weight-bold"></td>  
                    </tr> 
                   
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div> 

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_pph21_perusahaan_bulan'); ?>
    <!-- End of Add Modal Perusahaan -->
    <!-- Modal Edit PPH21 Kompensasi -->
    <?php $this->load->view('modal/edit_pph21_kompensasi'); ?>
    <!-- End of Modal Edit PPH 21 Kompensasi -->
    <!-- Add Modal Import PPH21 -->
    <?php $this->load->view('modal/import_pph21'); ?>
    <!-- End of Add Modal Import PPH21 -->
    <!-- Detail Aktifitas Pajak -->
    <?php $this->load->view('modal/detail_status_aktifitas_pajak'); ?>
    <!-- End of Detail Aktifitas Pajak --> 
    <!-- Lihat Dokumen Bukti -->
    <?php $this->load->view('modal/lihat_dokumen_bukti'); ?>
    <!-- End of Lihat Dokumen Bukti --> 

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