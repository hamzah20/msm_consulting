<style type="text/css">
  .label-green{
    background-color: #28a745;color: #fff;
  }
  .label-red{
    background-color: #dc3545;color: #fff;
  }
  .label-yellow{
    background-color: #ffc107;color: #fff;
  }
  table{
    font-size: 8pt;
  }
</style>
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light"></p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light"></p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light"></p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light"></p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div> 

            

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>MY PENDING TASK</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-dashboard">
                          <thead>
                            <tr>
                              <th scope="col">NO</th>
                              <th scope="col">KLIEN</th>
                              <th scope="col">PROJECT STATUS</th>
                              <th scope="col">TASK STATUS</th> 
                              <th scope="col">TARGET DATE</th>
                              <th scope="col">PIC</th>
                              <th scope="col">DUE IN</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>Perhitungan Pajak</td>
                              <td>Perhitungan Pajak PPh 21</td>
                              <td>2021-09-17</td>
                              <td>Hamzah</td>
                              <td><h6><span class="badge badge-warning text-white">3 more days</span></h6></td>
                            </tr> 
                            <tr>
                              <th scope="row">2</th>
                              <td>PT. SEJAHTERA ABADI</td>
                              <td>Pengiriman HardCopy</td>
                              <td>Menunggu Pengiriman HardCopy</td>
                              <td>2021-09-10</td>
                              <td>Andi</td>
                              <td><h6><span class="badge badge-danger">4 days ago</span></h6></td>
                            </tr> 
                            <tr>
                              <th scope="row">3</th>
                              <td>PT. INCUBE SOLUTIONS</td>
                              <td>Perhitungan Pajak</td>
                              <td>Menunggu Approval Klien</td>
                              <td>2021-09-20</td>
                              <td>Rafif</td>
                              <td><h6><span class="badge badge-success">6 more days</span></h6></td>
                            </tr>

                          </tbody>
                        </table>
                    </div>
                </div>
                <!-- /# card -->
            </div>

             <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>MY PENDING CUSTOM TASK</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-dashboard">
                          <thead>
                            <tr >
                              <th scope="col">NO</th>
                              <th scope="col">PIC</th>
                              <th scope="col">CUSTOMER</th>
                              <th scope="col">PROJECT </th>
                              <th scope="col">TASK</th> 
                              <!-- <th scope="col">START DATE</th> -->
                              <th scope="col">TARGET DATE</th>
                              <th scope="col">PLANDED HOURS</th>
                              <th scope="col">ACTUAL HOURS</th>
                              <th scope="col">STATUS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Hamzah</td>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>AUDIT FINANCIAL STATEMENT</td>
                              <td>Data COA</td>
                              <!-- <td>2021-09-17</td> -->
                              <td>2021-10-01</td>
                              <td>72</td>
                              <td>65</td>
                              <td>Data has been Collected</td>
                              <!-- <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td> -->
                            </tr> 
                           <tr>
                              <th scope="row">2</th>
                              <td>Rafif</td>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>AUDIT FINANCIAL STATEMENT</td>
                              <td>Cek Inventory & COGS</td>
                              <!-- <td>2021-09-17</td> -->
                              <td><h6><span class="badge badge-danger">2021-10-26</span></h6></td>
                              <td><h6><span class="badge badge-danger">72</span></h6></td>
                              <td><h6><span class="badge badge-danger">70</span></h6></td>
                              <td><h6><span class="badge badge-danger">Check Inventory & COGS</span></h6></td>
                              <!-- <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td> -->
                            </tr> 
                            <tr >
                              <th scope="row">3</th>
                              <td>Andi</td>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>AUDIT FINANCIAL STATEMENT</td>
                              <td>Data Jurnal</td>
                              <!-- <td>2021-09-17</td> -->
                              <td>2021-10-10</td>
                              <td>72</td>
                              <td>72</td>
                              <td>Check Jurnal</td>
                              <!-- <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td> -->
                            </tr> 
                            <tr>
                              <th scope="row">4</th>
                              <td>Hamzah</td>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>AUDIT FINANCIAL STATEMENT</td>
                              <td>Alokasi Resource</td>
                              <!-- <td>2021-09-17</td> -->
                              <td><h6><span class="badge badge-danger">2021-10-16</span></h6></td>
                              <td><h6><span class="badge badge-danger">72</span></h6></td>
                              <td><h6><span class="badge badge-danger">78</span></h6></td>
                              <td><h6><span class="badge badge-danger">Resource Gathering</span></h6></td>
                              <!-- <td><button class="btn btn-success"><i class="fa fa-eye"></i></button></td> -->
                            </tr> 
                          </tbody>
                        </table>
                    </div>
                </div>
                <!-- /# card -->
            </div>
             <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>CUSTOM TASK WAITING FOR APPROVAL</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-dashboard">
                          <thead>
                            <tr>
                              <th scope="col">NO</th>
                              <th scope="col">CUSTOMER</th>
                              <th scope="col">PROJECT </th>
                              <th scope="col">TASK</th>
                              <th scope="col">TARGET DATE</th>
                              <th scope="col">TOTAL HOURS</th>
                              <th scope="col">PIC</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td>AUDIT FINANCIAL STATEMENT</td>
                              <td>Data COA</td>
                              <td>2021-09-20</td>
                              <td>72</td>
                              <td>Hamzah</td>
                              <td>
                                <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#approvalTask"><i class="fa fa-eye"></i></a>
                              </td>
                            </tr> 
                           
                          </tbody>
                        </table>
                    </div>
                </div>
                <!-- /# card -->
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>CUSTOM TASK WAITING FOR APPROVAL</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-dashboard">
                          <thead>
                            <tr>
                              <th scope="col">NO</th>
                              <th scope="col">CUSTOMER</th>
                              <th scope="col">PROJECT </th>
                              <th scope="col">TASK</th>
                              <th scope="col">TARGET DATE</th>
                              <th scope="col">TOTAL HOURS</th>
                              <th scope="col">PIC</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($waiting_approval->result() as $waiting_approval_data):
                                $approval_project = $this->cms->getSingularData('g_project', 'PROJECT_ID', $waiting_approval_data->PROJECT_ID);
                                $approval_milestone = $this->cms->getSingularData('g_milestone', 'REC_ID', $waiting_approval_data->MILESTONE_ID);
                                $approval_task = $this->cms->getSingularData('g_task', 'REC_ID', $waiting_approval_data->TASK_ID);
                             ?>
                            <tr>
                              <th scope="row">1</th>
                              <td>PT. PERUSAHAAN YANG SUKSES</td>
                              <td><?= $approval_project->row()->PROJECT_NAME  ?></td>
                              <td><?= $approval_task->row()->TASK_NAME  ?></td>
                              <td><?= $waiting_approval_data->END_DATE ?></td>
                              <td><?= $waiting_approval_data->TOTAL_HOURS ?></td>
                              <td><?= @$s_user->row()->NAME ?></td>
                              <td>
                                <a class="btn btn-success getapproval" href="#" role="button" data-toggle="modal" data-target="#approvalTask" data-recid="<?= $waiting_approval_data->REC_ID ?>"><i class="fa fa-eye"></i></a>
                              </td>
                            </tr> 
                            <?php endforeach ?>
                           
                          </tbody>
                        </table>
                    </div>
                </div>
                <!-- /# card -->
            </div>




        </div> 
        <!-- .content -->
    </div>
    <!-- /#right-panel -->
    <div class="modal fade" id="approvalTask" tabindex="-1" aria-labelledby="approvalTask" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            
            <div class="modal-content content-TaskApproval">
                
            </div>
        
        </div>
    </div>

    <!-- Right Panel -->

    <!-- Footer -->
    <?php $this->load->view('templates_cms/footer'); ?> 
    <!-- End of Footer -->

<script>
    
jQuery(document).ready(function($) {


    $(document).on('click', '.getapproval', function(event){
    var button = $(event.relatedTarget);
          var rec_id = $(this).data('recid');
          var url = '<?php echo base_url('General/Project/getModalApprovalTask?rec_id='); ?>';

          $('.content-TaskApproval').load(url + rec_id, function() {});
    });


    $(document).on('hidden.bs.modal', function (e) {
        $( ".content-TaskApproval" ).empty();
    });


});

</script>

