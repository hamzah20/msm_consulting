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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan') ?>">Bulanan</a> / Summary</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body"> 
        <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="#"><i class="fa fa-download"></i></a> 
        <a class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ringkasan" href="<?php echo base_url('pph_21/bulan/summary/aktifitas_pajak') ?>"><i class="fa fa-paperclip"></i></a> 
        <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Email" href="#"><i class="fa fa-envelope"></i></a> 
        <a class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="(none)" href="#"><i class="fa fa-asterisk"></i></a> 
        <hr>
        <h6><span class="badge badge-success"># Summary / Ringkasan</span></h6> <br>
        <div class="row mb-3">
        	<div class="col-4">
        		<div class="form-group">
                    <label for="txtPeriode" class="label-utama font-weight-bold">(1) Periode / Masa</label>
                    <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPeriode" value="" placeholder="....." readonly> 
                </div>
        	</div>
        	<div class="col-4">
        		<div class="form-group">
                    <label for="txtPembetulan" class="label-utama font-weight-bold">(2) Pembetulan / Koreksi</label>
                    <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPembetulan" value="" placeholder="....." readonly> 
                </div>
        	</div>
        	<div class="col-4">
        		<div class="form-group">
                    <label for="txtApproval" class="label-utama font-weight-bold">(3) Approval / Persetujuan Klien</label>
                    <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtApproval" value="" placeholder="....." readonly> 
                </div>
        	</div>
        </div>

        <a class="btn btn-sm btn-warning text-white" href="#" role="button" data-toggle="modal" data-target="#editPPH21BulanSummary">Edit Kompensasi</a> 
        <br><br>
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr> 
              <th scope="col-4">Jumlah Pegawai</th> 
              <th scope="col-1" class="text-center">Total Penghasilan Bruto</th>
              <th scope="col-1" class="text-center">PPh 21 Terutang</th>
              <th scope="col-1" class="text-center">Kompensasi</th> 
              <th scope="col-1" class="text-center">PPh 21 KB (LB)</th> 
              <th scope="col-1" class="text-center">Kode Jenis Setoran</th>  
            </tr>
          </thead>
          <tbody>  
                <tr> 
                  <td>3</td> 
                  <td class="text-center">16,078,600</td>  
                  <td class="text-center">454,320</td>  
                  <td class="text-center">0</td> 
                  <td class="text-center">454,320</td> 
                  <td class="text-center">411121-100</td>  
                </tr> 

                <tr> 
                  <td><span class="font-weight-bold">TOTAL</span></td> 
                  <td class="text-center">16,078,600</td>  
                  <td class="text-center">454,320</td>  
                  <td class="text-center">0</td> 
                  <td class="text-center">454,320</td> 
                  <td class="text-center"></td>  
                </tr> 
               
          </tbody>
        </table>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body"> 
        <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="#"><i class="fa fa-download"></i></a>  
        <a class="btn btn-sm btn-danger" href="#" role="button" data-toggle="modal" title="Import" data-target="#importPPH21"><i class="fa fa-upload"></i></a>
        <hr>
        <h6><span class="badge badge-success"># Detail / Rincian</span></h6> <br> 
        
        <table class="table" id="companyTable">
          <thead class="thead-dark">
            <tr> 
              <th scope="col-">No</th> 
              <th scope="col-">Nama Karyawan</th> 
              <th scope="col-">Status</th> 
              <th scope="col-">NPWP</th> 
              <th scope="col-">GP*</th> 
              <th scope="col-">TP*</th> 
              <th scope="col-">TL*</th> 
              <th scope="col-">HI*</th> 
              <th scope="col-">PA*</th> 
              <th scope="col-">NA*</th> 
              <th scope="col-">TB*</th> 
              <th scope="col-">PB*</th> 
              <th scope="col-">IU*</th> 
              <th scope="col-">PT*</th> 
              <th scope="col-">Aksi</th> 
            </tr>
          </thead>
          <tbody>  
                <tr> 
                  <td>1</td> 
                  <td>Aris Abdullatif</td> 
                  <td>Lokal</td> 
                  <td>Ada</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>
                  	 <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?php echo base_url('pph_21/bulan/summary/karyawan/detail'); ?>"><i class="fa fa-eye"></i></a> 
                  </td> 
                </tr>  
                <tr> 
                  <td>1</td> 
                  <td>Maniartina</td> 
                  <td>Lokal</td> 
                  <td class="text-danger">Tidak</td> 
                  <td>5,000,000</td> 
                  <td>27,995</td> 
                  <td>200,00</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>5,227,995</td> 
                  <td>0</td> 
                  <td>33,594</td> 
                  <td>
                  	<a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?php echo base_url('pph_21/bulan/summary/karyawan/detail'); ?>"><i class="fa fa-eye"></i></a> 
                  </td> 
                </tr>  
                <tr> 
                  <td>1</td> 
                  <td>Nathalie</td> 
                  <td>Ekspatriat</td> 
                  <td>Tidak</td> 
                  <td>10,000,000</td> 
                  <td>360,605</td> 
                  <td>500,000</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>0</td> 
                  <td>10,850,605</td> 
                  <td>0</td> 
                  <td>420,726</td> 
                  <td>
                  	 <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?php echo base_url('pph_21/bulan/summary/karyawan/detail'); ?>"><i class="fa fa-eye"></i></a> 
                  </td> 
                </tr>  
                <tr> 
                  <td colspan="2" class="font-weight-bold">TOTAL</td>  
                  <td></td> 
                  <td></td> 
                  <td class="font-weight-bold">15,000,000</td> 
                  <td class="font-weight-bold">388,600</td> 
                  <td class="font-weight-bold">700,000</td> 
                  <td class="font-weight-bold">0</td> 
                  <td class="font-weight-bold">0</td> 
                  <td class="font-weight-bold">0</td> 
                  <td class="font-weight-bold">0</td> 
                  <td class="font-weight-bold">16,150,605</td> 
                  <td class="font-weight-bold">0</td> 
                  <td class="font-weight-bold">453,726</td> 
                  <td>
                  	 <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?php echo base_url('pph_21/bulan/summary/karyawan/detail'); ?>"><i class="fa fa-eye"></i></a> 
                  </td> 
                </tr>  
               
          </tbody>
        </table>
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