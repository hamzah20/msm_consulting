    <div class="modal fade" id="addPPH21Payment" tabindex="-1" aria-labelledby="addPPH21Payment" aria-hidden="true">
      <div class="modal-dialog">
        <form class="needs-validation" id="formAddPayment" method="POST" novalidate action="<?= base_url('PPH/Pph21/Payment'); ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addPPH21Payment">Payment - PPH 21</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" class="form-control form-control-sm" id="id_pph" name="id_pph" value="<?= $summary->row()->PPH_ID; ?>">
              <input type="hidden" class="form-control form-control-sm" id="company_id" name="company_id" value="<?= $summary->row()->COMPANY_ID; ?>"> 
              <input type="hidden" class="form-control form-control-sm" id="years" name="years" value="<?= $summary->row()->PERIOD_YEAR; ?>"> 
              <input type="hidden" class="form-control form-control-sm" id="month" name="month" value="<?= $summary->row()->PERIOD_MONTH; ?>">   
              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nomor SSE :</label>
                      <select class="custom-select" name="no_sse" id="no_sse" onchange="myFunction()">
                        <option value="0">- SELECT -</option>
                        <?php foreach ($sse_active->result() as $sse) { ?>
                          <option value="<?= $sse->NO_SSE_21; ?>"><?= $sse->NO_SSE_21; ?></option> 
                        <?php } ?> 
                      </select> 
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nomor Payment :</label>
                    <input type="text" class="form-control form-control-sm" id="no_payment" name="no_payment" required> 
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
                    <label for="recipient-name" class="col-form-label">Kurang (Lebih) Bayar setelah Penyetoran melalui SSE:</label>
                    <?php 
                      if(empty($payment->row()->KBLB_PPH21)){
                    ?>
                      <input type="text" class="form-control form-control-sm" id="kblb_payment" name="kblb_payment" value="0" readonly> 
                    <?php
                      } else{
                    ?>
                        <input type="text" class="form-control form-control-sm" id="kblb_payment" name="kblb_payment" value="<?= number_format($payment->row()->KBLB_PPH21); ?>" readonly> 
                    <?php
                      }
                    ?>
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Jumlah Pembayaran :</label>
                    <input type="text" class="form-control form-control-sm" id="amount_payment" name="amount_payment" readonly> 
                  </div>
                </div>  
              </div>

              <div class="row"> 
                <div class="col-12">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tanggal Pembayaran :</label>
                    <input type="date" class="form-control form-control-sm" id="date_payment" name="date_payment"> 
                  </div>
                </div>  
              </div>  
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">Pay</button>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>