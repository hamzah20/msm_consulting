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
          <h1>PPh 21</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active"> <a href="<?php echo base_url('pph_21'); ?>"> PPh 21</a> / <a href="<?php echo base_url('pph_21/bulan?cid=' . $this->input->get('cid')) ?>">Bulanan</a> / Summary</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="content mt-3"> 

    <div class="card mt-3">
      <div class="card-body">
        <ul class="nav nav-tabs nav-edit-perusahaan my-3">
          <li class="nav-item"> 
            <?php foreach ($summary->result() as $summary_result)?>
              <a class="nav-link" href="<?= base_url('pph_21/bulan/summary?cid=' . $summary_result->COMPANY_ID . '&pid=' . $summary_result->PPH_ID . '&mid=' . $summary_result->PERIOD_MONTH . '&yid=' . $summary_result->PERIOD_YEAR); ?>"><i class="fa fa-id-card mr-1"></i>Tetap</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-id-card mr-1"></i>Tidak Tetap</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('pph_21/bulan/summary/karyawan/sse?cid=' . $summary_result->COMPANY_ID . '&mid=' . $summary_result->PERIOD_MONTH . '&yid=' . $summary_result->PERIOD_YEAR); ?>"><i class="fa fa-id-card mr-1"></i>SSE</a>
          </li> 
        </ul>  
        <?php 
           foreach($summary->result() as $company);  
           if($company->STATUS == 'SSE' OR $company->STATUS == 'ON PROGRESS'){ ?>
                 <a class="btn btn-sm btn-primary mb-1" href="#" role="button" data-toggle="modal" data-target="#addPPH21SSE">+ SSE</a>
        <?php } ?> 
        <hr> 

        <table id="companyTable" class="table table-company">
        <!-- <thead class="thead-dark"> -->
          <tr class="thead-dark">
            <th scope="col-">No</th>
            <th scope="col-">Nomer SSE</th>
            <th scope="col-">Total SSE</th>
            <th scope="col-">Status</th> 
            <th scope="col-">Aksi</th> 
          </tr>
        <!-- </thead> -->
        <tbody>   
          <?php foreach ($payment_sse->result() as $sse) { ?>
            <tr>
              <td><?= $counter++; ?></td>
              <td><?= $sse->NO_SSE_21; ?></td>
              <td><?= number_format($sse->TOTAL_SSE21); ?></td>  
              <td><?= $sse->STATUS; ?></td>  
              <td>
                <?php  
                  if($sse->STATUS == 'PAID'){
                ?>
                 <h6><span class="badge badge-info">Paid, cannot change SSE!</span></h6>
                <?php
                  } elseif($sse->STATUS == 'WAITING OF PAYMENT'){
                ?>
                  <!-- <a class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#editPPH21SSE" data-id="<?= $sse->NO_SSE_21; ?>" title="Edit User" href="#" role="button"></a> -->
                  <button class="btn btn-sm btn-warning editSSE"  data-id="<?= $sse->NO_SSE_21; ?>" data-pph="<?= $summary_result->PPH_ID; ?>" title="Edit User" ><i class="fa fa-edit"></i></button>


                  <a class="btn btn-sm btn-danger hapus" data-toggle="tooltip" data-placement="top" data-user="<?= $sse->NO_SSE_21; ?>" title="Hapus" href="<?= base_url('pph_21/bulan/summary/karyawan/sse/delete?cid=' . $summary_result->COMPANY_ID . '&sid=' . $sse->NO_SSE_21 . '&mid=' . $summary_result->PERIOD_MONTH . '&yid=' . $summary_result->PERIOD_YEAR . '&pid=' . $summary_result->PPH_ID); ?>" role="button"><i class="fa fa-trash"></i></a>
                <?php
                  }
                ?>
              </td>
            </tr> 
          <?php } ?>
          
        </tbody>
      </table>
      <br> 
      </div>
    </div> 

    <!-- Add Modal SSE -->
    <?php $this->load->view('modal/add_pph21_SSE'); ?>
    <!-- End of Add Modal SSE -->

    <!-- Add Modal SSE -->
    <?php $this->load->view('modal/edit_pph21_SSE'); ?>
    <!-- End of Add Modal SSE -->

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
<script type="text/javascript">
  function myFunction(){
    var sse = document.getElementById("no_sse").value;
    //alert(sse);
     jQuery.ajax({
        type: 'post',
        url: '<?php echo base_url();?>/PPH/PPh21/getSSE',
        data: {sse:sse},
        success: function (data) {
           // alert(data);
            document.getElementById("amount_payment").value=data;
        }         
        }); 
  }


  jQuery(document).ready(function ($) {
    $('.editSSE').click(function(){
        var id=$(this).data('id');
        var pph=$(this).data('pph');
        // alert(id);
        $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>/PPH/PPh21/getEditSSE',
        data: {id:id,pphid:pph},
        success: function (data) {
           // alert(data);
            //$(".ModalEditSSE").innerHTML =data;
           $(".ModalEditSSE").html(data);
            $("#editModalPPH21SSE").modal("show");
           
        }         
        }); 
    });

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

<?php if ($this->session->userdata('sse_delete') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {
                "use strict";
                Swal.fire({
                    title: 'Hapus Data SSE',
                    text: 'Data SSE berhasil di hapus',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('sse_delete') == 'error') { ?>
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

    <?php if ($this->session->userdata('sse_update') == 'success') { ?>
        <script>
            jQuery(document).ready(function($) {
                "use strict";
                Swal.fire({
                    title: 'Update Data SSE',
                    text: 'Data SSE berhasil di update',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                });
            });
        </script>
    <?php } ?>

    <?php if ($this->session->userdata('sse_update') == 'error') { ?>
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

<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->