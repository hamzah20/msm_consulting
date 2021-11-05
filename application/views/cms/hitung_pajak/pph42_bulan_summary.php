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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 42</a> / <a href="<?php echo base_url('pph_42/bulan?cid=' . $this->input->get('cid')) ?>">Bulanan</a> / Summary</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
          <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="<?= base_url('PPH/Pph21/generateReport?cid=' . $this->input->get('cid') . '&pid=' . $this->input->get('pid')); ?>"><i class="fa fa-download"></i></a>
          <a class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ringkasan" href="<?php echo base_url('pph_21/bulan/summary/aktifitas_pajak') ?>"><i class="fa fa-paperclip"></i></a>
          <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Email" href="#"><i class="fa fa-envelope"></i></a>
          <a class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="(none)" href="#"><i class="fa fa-asterisk"></i></a>
          </div>
          <!-- -->
        </div>
        
        <hr>
        <h6><span class="badge badge-success"># Summary / Ringkasan</span></h6> <br>
       <div class="row mb-3">
          <?php 
              foreach ($employees->result() as $employee); 
              if(!empty($employee)){
              ?>
              <div class="col-4">
                <div class="form-group">
                  <label for="" class="label-utama font-weight-bold text-center">(1) Periode / Masa</label> 
                  <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPeriode" value="<?php echo $employee->PERIOD_MONTH."-".$employee->PERIOD_YEAR; ?>" readonly>  
                </div>
              </div>
              <?php
            }else{
              ?>
              <div class="col-4">
                <div class="form-group">
                  <label for="" class="label-utama font-weight-bold text-center">(1) Periode / Masa</label> 
                  <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPeriode" value="...." readonly>  
                </div>
              </div>
              <?php
            } 
            foreach($correction->result() as $pembetulan); 

          ?>
          
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(2) Pembetulan / Koreksi</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPembetulan" value="0" readonly>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(3) Approval / Persetujuan Klien</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtApproval" value="<?php echo "";?>" readonly>
            </div>
          </div> 
        </div> 
        <div class="row">
          <div class="col-8">
            <div class="alert alert-info" role="alert">
              <h4 class="alert-heading">MORE INFORMATION</h4> <hr>
              <table>  
                <?php
                foreach ($Getpph42->result() as $GetData42) {
                ?>
                  <tr>
                    <td>PPH 42</td>
                    <td class="px-2">:</td>
                    <td><?php echo number_format($GetData42->COMPANY_PPHVAL42);?></td>  
                  </tr> 
                  <tr>
                    <td>PEMBETULAN</td>
                    <td class="px-2">:</td>
                    <td>0</td> 
                  </tr>  
                <?php
                }
                ?>
              </table> 
            </div>
          </div> 
          <div class="col-4">
            <div class="alert alert-success pb-3" role="alert">
              <h4 class="alert-heading">NOTES :</h4> <hr>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, ut labore et dolore magna aliqua. <br/><br/>
              <span class="font-weight-bold">Immanuel Titus - 20 Sept 2021 13:51</span>
            </div>
          </div>
        </div> 
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body">
        <ul class="nav nav-tabs nav-edit-perusahaan my-3">
          <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('pph_42/bulan/summary?cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH42_ID . '&mid=' . $employee->PERIOD_MONTH . '&yid=' . $employee->PERIOD_YEAR); ?>"><i class="fa fa-id-card mr-1"></i>PPH 4(2)</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pph_42/bulan/summary/umkm?cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH42_ID . '&mid=' . $employee->PERIOD_MONTH . '&yid=' . $employee->PERIOD_YEAR); ?>"><i class="fa fa-id-card mr-1"></i>UMKM</a>
          </li> 
          </li>
        </ul>
        <div class="row">
          <div class="col-6">
            <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="<?= base_url('PPH/Pph42/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-download"></i> Download</a> 
            <a class="btn btn-sm btn-danger" href="#" role="button" data-toggle="modal" title="Import" data-target="#importPPH42"><i class="fa fa-upload"></i> Upload</a>  
             <!-- <a class="btn btn-sm btn-info" title="Download" href="<?= base_url('PPH/Pph22/LawanTransaksi'); ?>"><i class="fa fa-plus"></i> Lawan Transaksi </a> --> <br><br>
          </div>
          <div class="col-6 text-right">
            <!-- <a class="btn btn-sm btn-info mb-1" data-toggle="tooltip" data-placement="top" title="Submit Perhitungan PPh" href="<?= base_url('PPH/Pph21/generateXLSFileLaporPajak?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-check-circle"></i></a> 
            <a class="btn btn-sm btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Approve Perhitungan" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-thumbs-up"></i></a> 
            <a class="btn btn-sm btn-warning text-white mb-1" data-toggle="tooltip" data-placement="top" title="Customer Approval" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-user"></i> </a> 
            <a class="btn btn-sm btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Pembayara PPh" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-dollar"></i> </a> 
            <a class="btn btn-sm btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="Tax Filing" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-file"></i> </a> 
            <a class="btn btn-sm text-white mb-1" style="background: #672511" data-toggles="tooltip" data-placement="top" title="Lapor Pajak" href="<?= base_url('PPH/Pph21/LaporPajak?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid'). '&mid=' . $this->input->get('mid'). '&yid=' . $this->input->get('yid')); ?>"><i class="fa fa-copy"></i> </a>  -->
            <!-- <a class="btn btn-sm btn-dark mb-1" data-toggle="tooltip" data-placement="top" title="Harcopy" href="<?= base_url('PPH/Pph22/generateXLSFileLaporPajak?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-envelope"></i> Lapor Pajak</a>  -->
          </div>
        </div>
        
        <hr> 
        <h6><span class="badge badge-success mb-1"># Detail / Rincian</span></h6> <br> 
        <a class="btn btn-sm btn-info" title="Tambah" href="<?= base_url('pph_42/transaksi/add?pid='.$employee->PPH42_ID.'&cid='.$employee->COMPANY_ID ); ?>"><i class="fa fa-plus"></i> Transaksi</a>

        <table id="companyTable" class="table table-company">
          <!-- <thead class="thead-dark"> -->
            <tr class="thead-dark">
              <th scope="col-">No</th>
              <th scope="col-">Nama WP Dipotong</th> 
              <th scope="col-">Tanggal Bukti Potong</th>
              <th scope="col-">Bruto</th> 
              <th scope="col-">PPH 4(2)</th> 
              <th scope="col-">Aksi</th> 
            </tr>
          <!-- </thead> -->
          <tbody>
            <?php if ($employees->num_rows() != 0) {

              $totalGP = 0;
              $totalTP = 0;
              $totalTL = 0;
              $totalHI = 0;
              $totalPA = 0;
              $totalNA = 0;
              $totalTB = 0;
              $totalPB = 0;
              $totalIU = 0;
              $totalPT = 0;

            ?>
              <?php 

              foreach ($employees->result() as $employee) {   
                ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $employee->NAMA_WP_DIPOTONG; ?></td> 
                  <td><?= $employee->TANGGAL_BUKTI_POTONG; ?></td>
                  <td><?= $employee->BRUTO; ?></td> 
                  <!-- <td><?= number_format($employee->TOTAL_PPHVAL22); ?></td> -->
                  <td><?= $employee->TOTAL_PPHVAL42; ?></td>
                  
                  <td>
                    <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?= base_url('pph_42/bulan/summary/karyawan/detail?eid=' . $employee->INCOME_ID . '&cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH42_ID); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('pph_42/bulan/summary/karyawan/edit?eid=' . $employee->INCOME_ID . '&cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH42_ID. '&mid=' . $employee->PERIOD_MONTH. '&yid=' . $employee->PERIOD_YEAR); ?>"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
              <?php } ?>  
            <?php } ?>


          </tbody>
        </table> 

      </div>
    </div>

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/edit_pph21_kompensasi'); ?>
    <!-- End of Add Modal Perusahaan -->

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/import_pph42'); ?>
    <!-- End of Add Modal Perusahaan --> 

    <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/import_umkm'); ?>
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

    $('#employeeSumTable').DataTable();
    $('#companyTable').DataTable();
    $('#companyUMKMTable').DataTable();

    // $(document).ready(function() {
    //   $('#companyTable').DataTable( {
    //       "scrollX": true
    //   });
    // }); 
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