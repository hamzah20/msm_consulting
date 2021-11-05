<!-- Header -->
<?php $this->load->view('templates_cms/header'); ?>
<!-- End of Header -->
<!-- Sidebar -->
<?php $this->load->view('templates_cms/sidebar'); ?>
<!-- End of Sidebar -->
<!-- Right Panel -->
<style type="text/css">
.list-group-item{
  color:orange;
}
.list-group-item ul{
  margin-top: 10px;
  margin-right: -15px;
  margin-bottom: -10px;
  color:green;
}
.list-group-item li{
  padding: 10px 15px 10px 3em;
  border-top: 1px solid #ddd;
}
.list-group-item li:before{
  content: '';
  display: block;
  position: absolute;
  left: 0;
  width: 100%;
  height: 1px;
  margin-top: -11px;
  background: #ddd;
}
</style>
<div id="right-panel" class="right-panel">
  <!-- Topbar-->
  <?php $this->load->view('templates_cms/topbar'); ?>
  <!-- End of Topbar -->
  <!-- Header-->
  <div class="breadcrumbs">
    <div class="col-sm-4">
      <div class="page-header float-left">
        <div class="page-title">
          <h1>Project </h1>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="page-header float-right">
        <div class="page-title">
          <ol class="breadcrumb text-right">
            <li class="active">Project </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="content mt-3">
   <div class="card">
        <div class="card-header">
            <h4>List Project </h4>
        </div>

        <div class="card-body">
          <!-- <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="modal" data-target="#addProjectType"><i class="fa fa-plus"></i> Project </a> -->
           <table class="table table-striped" style="margin-top: 10px;width: 1200px;">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">PROJECT INFO</th>
                  <th scope="col">CUSTOMER</th>
                  <th scope="col">STATUS</th>
                  <th scope="col">START DATE</th>
                  <th scope="col">END DATE</th>
                  <th scope="col">DURATION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <label style="font-weight: bold;font-size: 14px;">AUDIT FINANCIAL STATEMENT</label><br>
                    <label style="font-size: 12px;">Project OWNER : AJI PRATAMA</label><br>
                    
                  </td>
                  <td>
                    <label style="font-weight: bold;font-size: 14px;">INCUBESOLUTIONS</label><br>

                  </td>
                  <td>
                   <h6><span class="badge badge-success">Check Inventory & COGS</span></h6>
                  </td>
                  <td>
                   <label style="font-size:12px;" class="badge badge-primary">2021-10-26</label>
                  </td>
                  <td>
                   <label style="font-size:12px;" class="badge badge-danger">2021-11-26</label>
                  </td>
                  <td>
                   <label style="font-size:12px;font-weight: bold;" >30 Days</label>
                  </td>
                </tr>
                <tr>

                  <td colspan=2>
                    <ul class="list-group">
                      <li class="list-group-item">
                       <i class="fa fa-arrow-right"> </i> Pengumpulan Data
                        <ul class="list-unstyled">
                          <li><i class="fa fa-arrow-right"> </i> Data COA</li>
                          <li><i class="fa fa-arrow-right"> </i> Data STOCK</li>
                          <li><i class="fa fa-arrow-right"> </i> Data Jurnal</li>
                        </ul>
                      </li>
                      <li class="list-group-item">
                       <i class="fa fa-arrow-right"> </i> Persiapan
                        <ul class="list-unstyled">
                          <li><i class="fa fa-arrow-right"> </i> Alokasi Resource</li>
                          <li><i class="fa fa-arrow-right"> </i> Cek Inventory & COGS</li>
                          <li><i class="fa fa-arrow-right"> </i> Cek Mutasi Rekening</li>
                        </ul>
                      </li>
                       <li class="list-group-item"><i class="fa fa-arrow-right"> </i> Pengecekan</li>
                       <li class="list-group-item"><i class="fa fa-arrow-right"> </i> Validasi</li>
                      <li class="list-group-item">
                       <i class="fa fa-arrow-right"> </i> Konfirmasi & Approval
                        <ul class="list-unstyled">
                          <li><i class="fa fa-arrow-right"> </i> Konfirmasi COA</li>
                        </ul>
                      </li>
                      <li class="list-group-item"><i class="fa fa-arrow-right"> </i> Project Close</li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group">
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>HAMZAH Aji</li>
                          <li>ANDI WARDANA</li>
                          <li>RAFIF AHMADI</li>  
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                        <ul class="list-unstyled" style="color:#807c7c;">
                         <li>AJI PRATAMA</li>
                          <li>ANDI WARDANA</li>
                          <li>RAFIF AHMADI</li>
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                        
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                       
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                        <ul class="list-unstyled" style="color:#807c7c;">
                         <li>AJI PRATAMA</li>
                         
                        </ul>
                      </li>
                       <li class="list-group-item" style="color:#040404; font-weight: bold;">PIC
                      </li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group">
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li><span class="badge badge-success" style="width: 50%;font-size: 12px;">DONE</span></li> 
                          <li><span class="badge badge-success" style="width: 50%;font-size: 12px;">DONE</span></li> 
                          <li><span class="badge badge-success" style="width: 50%;font-size: 12px;">DONE</span></li> 
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li><span class="badge badge-success" style="width: 50%;font-size: 12px;">DONE</span></li>
                           <li><span class="badge badge-warning" style="font-size: 12px;">ONPROGRESS</span></li>
                           <li><span class="badge badge-danger" style="font-size: 12px;">PENDING</span></li>
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                        
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                       
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                        <ul class="list-unstyled" style="color:#807c7c;">
                        <li><span class="badge badge-danger" style="font-size: 12px;">PENDING</span></li>
                         
                        </ul>
                      </li>
                       <li class="list-group-item" style="color:#040404; font-weight: bold;">Status
                      </li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group">
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>2021-10-26</li> 
                          <li>2021-10-27</li> 
                          <li>2021-10-28</li> 
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>2021-10-31</li> 
                          <li>2021-11-01</li> 
                           <li>&nbsp;</li>
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                        
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                       
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                        <li>&nbsp;</li>
                         
                        </ul>
                      </li>
                       <li class="list-group-item" style="color:#040404; font-weight: bold;">Start Date
                      </li>
                    </ul>
                  </td>
                  <td>
                    <ul class="list-group">
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>2021-10-26</li> 
                          <li>2021-10-27</li> 
                          <li>2021-10-28</li> 
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>2021-10-31</li> 
                          <li>2021-11-02</li> 
                           <li>&nbsp;</li>
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                        
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                       
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                        <ul class="list-unstyled" style="color:#807c7c;">
                        <li>&nbsp;</li>
                         
                        </ul>
                      </li>
                       <li class="list-group-item" style="color:#040404; font-weight: bold;">End Date
                      </li>
                    </ul>
                  </td>
                   <td>
                    <ul class="list-group">
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>1 Days</li> 
                          <li>1 Days</li> 
                          <li>1 Days</li> 
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                        <ul class="list-unstyled" style="color:#807c7c;">
                          <li>1 Days</li> 
                          <li>2 Days</li> 
                           <li>&nbsp;</li>
                        </ul>
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                        
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                       
                      </li>
                      <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                        <ul class="list-unstyled" style="color:#807c7c;">
                        <li>&nbsp;</li>
                         
                        </ul>
                      </li>
                       <li class="list-group-item" style="color:#040404; font-weight: bold;">Duration
                      </li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
     <!-- Add Modal Perusahaan -->
    <?php $this->load->view('modal/add_projectType'); ?>
    <!-- End of Add Modal Perusahaan -->
  </div>
  <!-- End of Content -->
</div>

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
<?php
   $this->session->set_userdata('query', '');
 } ?>
<?php if ($this->session->userdata('query') == 'success') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Berhasil',
        text: 'Data Project Type berhasil ditambahkan',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php 
  $this->session->set_userdata('query', '');
} ?>
<!-- Footer -->
<?php $this->load->view('templates_cms/footer'); ?>
<!-- End of Footer -->