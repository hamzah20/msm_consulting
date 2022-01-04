    <div class="modal fade" id="addPPH21SSE" tabindex="-1" aria-labelledby="addPPH21SSE" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" id="formAddSSE" method="POST" novalidate action="<?= base_url('PPH/Pph21/insert_sse'); ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addPPH21SSE">SSE - PPH 21</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
              <input type="hidden" class="form-control form-control-sm" id="pph_id" name="pph_id" value="<?= $summary->row()->PPH_ID; ?>"> 
              <input type="hidden" class="form-control form-control-sm" id="company_id" name="company_id" value="<?= $summary->row()->COMPANY_ID; ?>"> 
              <input type="hidden" class="form-control form-control-sm" id="years" name="years" value="<?= $summary->row()->PERIOD_YEAR; ?>"> 
              <input type="hidden" class="form-control form-control-sm" id="month" name="month" value="<?= $summary->row()->PERIOD_MONTH; ?>">   
              <?php 
                if(empty($summary->row()->COMPANY_PPHVAL)){
              ?>
                <input type="hidden" class="form-control form-control-sm" id="pph" name="pph" value="0" readonly> 
              <?php
                } else{
              ?>
                  <input type="hidden" class="form-control form-control-sm" id="pph" name="pph" value="<?= number_format($summary->row()->COMPANY_PPHVAL); ?>" readonly> 
              <?php
                }
              ?>
              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nomor SSE :</label>
                    <input type="text" class="form-control form-control-sm" id="no_sse" name="no_sse" required> 
                  </div>
                </div>  
              </div> 

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">PPH 21 :</label>
                    <input type="text" class="form-control form-control-sm" id="total_payment" name="total_payment" value="<?= number_format($summary->row()->COMPANY_PPHVAL); ?>" readonly> 
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">SSE yang belum dibayarkan :</label>
                    <?php 
                      if(empty($sse_debt->row()->ALL_TOTALDEBT_SSE21)){
                    ?>
                      <input type="text" class="form-control form-control-sm" id="kblb_payment" name="kblb_payment" value="0" readonly> 
                    <?php
                      } else{
                        $fix_ssedebt = ($summary->row()->COMPANY_PPHVAL)-($sse_debt->row()->ALL_TOTALDEBT_SSE21)
                    ?>
                        <input type="text" class="form-control form-control-sm" id="kblb_payment" name="kblb_payment" value="<?= number_format($fix_ssedebt); ?>" readonly> 
                    <?php
                      }
                    ?>
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Total SSE :</label>
                    <input type="text" class="form-control form-control-sm" id="amount_sse" name="amount_sse"> 
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tanggal SSE :</label>
                    <input type="date" class="form-control form-control-sm" id="date_sse" name="date_sse"> 
                  </div>
                </div>  
              </div>  
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>