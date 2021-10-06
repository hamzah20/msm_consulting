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
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPH 21</a> / <a href="<?php echo base_url('pph_21/bulan?cid=' . $this->input->get('cid')) ?>">Bulanan</a> / Summary</li>
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
          <div class="col-6 text-right">
            <?php   
             // $statuspph21 = $this->cms->cekstatuspph21($this->input->get('pid')); 
              foreach ($statuspph21->result() as $key_status);
              // echo $key_status->STATUS;
              if($key_status->STATUS == 'ON PROGRESS'){
               echo "<h3><span class='badge badge-info'>ON PROGRESS</span></h3>"; 
              } elseif ($key_status->STATUS == 'WAITING FOR APPROVAL') {
                echo "<h3><span class='badge badge-primary'>WAITING FOR APPROVAL</span></h3>";
              } elseif ($key_status->STATUS == 'WAITING FOR APPROVAL CUSTOMER') {
                echo "<h3><span class='badge badge-warning'>WAITING FOR APPROVAL CUSTOMER</span></h3> ";
              } elseif ($key_status->STATUS == 'WAITING FOR PAYMENT') {
                echo "<h3><span class='badge badge-warning'>WAITING FOR PAYMENT</span></h3> ";
              } elseif ($key_status->STATUS == 'PAID') {
                echo "<h3><span class='badge badge-info'>PAID</span></h3>";
              } elseif ($key_status->STATUS == 'TAX FILING') {
                echo "<h3><span class='badge badge-info'>TAX FILING</span></h3> ";
              } elseif ($key_status->STATUS == 'HARDCOPY') {
                echo "<h3><span class='badge badge-info'>HARDCOPY</span></h3>";
              } elseif ($key_status->STATUS == 'LAPOR PAJAK') {
                echo "<h3><span class='badge badge-info'>LAPOR PAJAK</span></h3>";
              } elseif ($key_status->STATUS == 'CLOSED') {
                echo "<h3><span class='badge badge-info'>CLOSED</span></h3>";
              } 
            ?> 
          </div>
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
          ?>
          
          <div class="col-4">
            <div class="form-group">
              <label for="" class="label-utama font-weight-bold text-center">(2) Pembetulan / Koreksi</label>
              <input type="text" class="form-control form-control-sm" id="" aria-describedby="" name="txtPembetulan" value="<?php echo $correction->num_rows() - 1; ?>" readonly>
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
                <?php if ($summary->num_rows() != 0) { ?>
                <tr>
                  <td>KODE JENIS SETORAN</td>
                  <td class="px-2">:</td>
                  <td><?= ($summary->row()->COMPANY_KBLB == 0 ? '' : '411121-100'); ?></td> 
                  <td class="px-4"></td>
                  <td>TOTAL PPH21</td>
                  <td class="px-2">:</td>
                  <td>
                    <?php
                      if($payment->num_rows() != 0){
                      foreach ($payment->result() as $key1);
                      echo $key1->TOTAL_PPH21;  
                    }
                    else{
                      echo "0";
                    }
                     
                     ?>
                  </td>
                </tr>
                <tr>
                  <td>JUMLAH PEGAWAI</td>
                  <td class="px-2">:</td>
                  <td><?= $employees->num_rows(); ?></td>
                  <td class="px-4"></td>
                  <td>PPH21 TERBAYAR</td>
                  <td class="px-2">:</td>
                  <td>
                    <?php
                      if($payment->num_rows() != 0){ 
                        echo $key1->PAID_PPH21; 
                      }
                      else{
                        echo "0";
                      } 
                    ?> 
                  </td>
                </tr>
                <tr>
                  <td>TOTAL BRUTO</td>
                  <td class="px-2">:</td>
                  <td><?= number_format($summary->row()->COMPANY_BRUTO); ?></td>
                  <td class="px-4"></td>
                  <td>PPH21 TERHUTANG</td>
                  <td class="px-2">:</td>
                  <td>
                    <?php
                      if($payment->num_rows() != 0){
                        echo $key1->OWED_PPH21; 
                      }
                      else{
                        echo "0";
                      }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>KOMPENSASI</td>
                  <td class="px-2">:</td>
                  <td><?= number_format($summary->row()->COMPANY_COMPENSATION); ?></td>
                  <?php } ?>
              </table> 
            </div>
          </div> 
          <div class="col-4">
            <div class="alert alert-success pb-3" role="alert">
              <h4 class="alert-heading">NOTES :</h4> <hr>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.
            </div>
          </div>
        </div> 
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-download"></i> Donwload</a>
            <a class="btn btn-sm btn-danger" href="#" role="button" data-toggle="modal" title="Import" data-target="#importPPH21"><i class="fa fa-upload"></i> Upload</a>
          </div>
          <div class="col-6 text-right">
            <a class="btn btn-sm btn-info mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFileLaporPajak?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-check-circle"></i></a> 
            <a class="btn btn-sm btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-thumbs-up"></i></a> 
            <a class="btn btn-sm btn-warning text-white mb-1" data-toggle="tooltip" data-placement="top" title=" for Approval" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-hourglass-start"></i> </a> 
            <a class="btn btn-sm btn-warning text-white mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-user"></i> </a> 
            <a class="btn btn-sm btn-success mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-dollar"></i> </a> 
            <a class="btn btn-sm btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-file"></i> </a> 
            <a class="btn btn-sm text-white mb-1" style="background: #672511" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFile?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-copy"></i> </a> 
            <a class="btn btn-sm btn-dark mb-1" data-toggle="tooltip" data-placement="top" title="" href="<?= base_url('PPH/Pph21/generateXLSFileLaporPajak?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')); ?>"><i class="fa fa-envelope"></i> </a> 
          </div>
        </div>
        
        <hr>
        <h6><span class="badge badge-success"># Detail / Rincian</span></h6> <br>

        <table id="companyTable" class="table table-company">
          <!-- <thead class="thead-dark"> -->
            <tr class="thead-dark">
              <th scope="col-">No</th>
              <th scope="col-">Nama Karyawan</th>
              <th scope="col-">Status</th>
              <th scope="col-">NPWP</th>
              <th scope="col-" title="Gaji/Pensiun atau THT/JHT" class="text-center">GP*</th>
              <th scope="col-" title="Tunjangan PPh" class="text-center">TP*</th>
              <th scope="col-" title="Tunjangan lainnya, uang lembur dan sebagainya" class="text-center">TL*</th>
              <th scope="col-" title="Honorarium dan imbalan lain sejenisnya" class="text-center">HI*</th>
              <th scope="col-" title="Premi asuransi yang diberi pemberi kerja" class="text-center">PA*</th>
              <th scope="col-" title="Natura dan kenikmatan lainnya" class="text-center">NA*</th>
              <th scope="col-" title="Tantiem, bonus, gratifikasi, jasa produksi dan THR" class="text-center">TB*</th>
              <th scope="col-" title="Penghasilan bruto" class="text-center">PB*</th>
              <th scope="col-" title="Iuran pensiun atau iuran THT/JHT" class="text-center">IU*</th>
              <th scope="col-" title="PPh 21 Terutang" class="text-center">PT*</th>
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
              <?php foreach ($employees->result() as $employee) { ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $employee->EMPLOYEE_NAME; ?></td>
                  <td><?= $employee->EMPLOYEE_NATIONALITY_STATUS; ?></td>
                  <td class="<?= (strlen($employee->EMPLOYEE_NPWP) == 0 ? 'text-danger' : ''); ?>"><?= (strlen($employee->EMPLOYEE_NPWP) == 0 ? 'Tidak Ada' : 'Ada'); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_GAJI_POKOK); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TUNJANGAN_PPH); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TUNJANGAN_LAINNYA); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_HONORARIUM); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_PREMI); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_NATURA); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_TANTIEMBONUS); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_BRUTO); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_IURAN_PENSIUN); ?></td>
                  <td class="text-center"><?= number_format($employee->EMPLOYEE_PPHVAL); ?></td>
                  <td>
                    <a class="btn btn-sm btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="Lihat" href="<?= base_url('pph_21/bulan/summary/karyawan/detail?eid=' . $employee->EMPLOYEE_ID . '&cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH_ID); ?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-warning text-white" data-toggle="tooltip" data-placement="top" title="Edit" href="<?= base_url('pph_21/bulan/summary/karyawan/edit?eid=' . $employee->EMPLOYEE_ID . '&cid=' . $employee->COMPANY_ID . '&pid=' . $employee->PPH_ID); ?>"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
              <?php

                $totalGP = $totalGP + $employee->EMPLOYEE_GAJI_POKOK;
                $totalTP = $totalTP + $employee->EMPLOYEE_TUNJANGAN_PPH;
                $totalTL = $totalTL + $employee->EMPLOYEE_TUNJANGAN_LAINNYA;
                $totalHI = $totalHI + $employee->EMPLOYEE_HONORARIUM;
                $totalPA = $totalPA + $employee->EMPLOYEE_PREMI;
                $totalNA = $totalNA + $employee->EMPLOYEE_NATURA;
                $totalTB = $totalTB + $employee->EMPLOYEE_TANTIEMBONUS;
                $totalPB = $totalPB + $employee->EMPLOYEE_BRUTO;
                $totalIU = $totalIU + $employee->EMPLOYEE_IURAN_PENSIUN;
                $totalPT = $totalPT + $employee->EMPLOYEE_PPHVAL;
              } ?>

              <tr>
                <td colspan="2" class="font-weight-bold">TOTAL</td>
                <td></td>
                <td></td>
                <td class="font-weight-bold text-center"><?= number_format($totalGP); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTP); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTL); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalHI); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPA); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalNA); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalTB); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPB); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalIU); ?></td>
                <td class="font-weight-bold text-center"><?= number_format($totalPT); ?></td>
              </tr>

            <?php } ?>


          </tbody>
        </table>
      </div>
    </div>

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

    $('#employeeSumTable').DataTable();
    $('#companyTable').DataTable();

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