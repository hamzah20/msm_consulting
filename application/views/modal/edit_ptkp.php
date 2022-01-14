<?php foreach($m_ptkp->result() as $ptkp) ?>
  	
  						<div class="form-group">
                <label for="TK_ID" class="col-form-label">PKPT ID</label>
                <input type="text" class="form-control form-control-sm" id="TK_ID" name="TK_ID" required value="<?= $ptkp->TK_ID ?>">
                <label for="TK_NAME" class="col-form-label">PTKP NAME</label>
                <input type="text" class="form-control form-control-sm" id="TK_NAME" name="TK_NAME" required value="<?= $ptkp->TK_NAME ?>">
                <label for="TK_TARIF" class="col-form-label">PTKP TARIF</label>
                <input type="text" class="form-control form-control-sm" id="TK_TARIF" name="TK_TARIF" required value="<?= $ptkp->TK_TARIF ?>">
                <label for="TK_ORDER" class="col-form-label">PTKP ORDER</label>
                <input type="text" class="form-control form-control-sm" id="TK_ORDER" name="TK_ORDER" required value="<?= $ptkp->TK_ORDER ?>">
                <label for="PERIOD_YEAR" class="col-form-label">YEARS</label>
                <input type="text" class="form-control form-control-sm" id="PERIOD_YEAR" name="PERIOD_YEAR" required value="<?= $ptkp->PERIOD_YEAR ?>">
                <input type="text" name="REC_ID" hidden value="<?= $ptkp->REC_ID ?>">
                <div class="invalid-feedback">
                  tidak boleh kosong
                </div>
              </div>

  					