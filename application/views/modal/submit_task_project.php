            <div class="modal-header">
              <h5 class="modal-title" id="judul">Submit Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Task :</label>
                        <input type="text" class="form-control form-control-sm" readonly value="<?= $g_task->row()->TASK_NAME ?>">
                    </div>
                
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">File Task :</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">File Name</th>
                                    <th scope="col">Uploader</th>
                                    <th scope="col">Upload Date</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <?php 
                            $no = 1;
                            foreach ($dokumen_list_task->result() as $dokumen_task):
                                $addr = $dokumen_task->FILE_ADDRESS
                             ?>
                                <tr>
                                    <td>
                                        <?php echo $no;$no++; ?>
                                    </td>
                                    <td>
                                        <?= $dokumen_task->FILE_NAME ?>
                                    </td>
                                    <td>
                                        <?= $dokumen_task->USER_NAME ?>
                                    </td>
                                    <td>
                                        <?= $dokumen_task->UPLOAD_DATE ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary text-white" title="Download Dokumen" href="<?= base_url('General/Project/Download_doc?addr='.$addr); ?>">
                                          <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>

                    </div>
                
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Catatan :</label>
                        <textarea class="form-control form-control-sm" name="NOTES_PIC"></textarea>
                    </div>

                </div>


            <div class="modal-footer">
              <button class="btn btn-primary btn-sm simpanSubmitTask" data-idprojdetail="<?= $g_project_detail->row()->REC_ID ?>">Submit</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            </div>

<script>
jQuery(document).ready(function($) {

    $(document).on('click', '.simpanSubmitTask', function(event) {

          let id_proj_detail = $(this).data('idprojdetail');
          let notes_pic = $('textarea[name="NOTES_PIC"]').val();

          Swal.fire({
            title: 'Submit Task',
            text: 'Apakah anda yakin akan submit task ini untuk di approve ?',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.value) {

              $.post(baseUrl + 'General/Project/submitTask', {
                id_proj_detail:id_proj_detail,
                notes_pic:notes_pic

              }, function(resp) {
                if (resp.code == 200) {
                  Swal.fire({
                    title: 'Proses Berhasil',
                    text: 'Submit Berhasil',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    location.reload();
                  });
                } else {

                  Swal.fire({
                    title: 'Proses Gagal',
                    text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonText: 'Tutup'
                  });
                }
              });
            }
          });
      });


});

</script>