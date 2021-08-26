<div class="container">
      <img src="<?= base_url('assets/images/schoters-logo.png') ?>" class="img-fluid schoters-logo mb-3">
      <form method="POST" action="<?php echo base_url('Login'); ?>">
        <div class="form-group">
          <!-- Notifcatio Error for Login not Available! -->
          <?php echo $this->session->flashdata('massage'); ?>

          <label>Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda" value="<?php echo set_value('name') ?>"> 
          </div>
          <!-- Notifcatio Error for Username -->
          <small class="text-danger"><?php echo form_error('username') ?></small>
        </div>
        <div class="form-group"> 
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-unlock-alt"></i>
              </div>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda">
          </div>
          <!-- Notifcatio Error for Username -->
          <small class="text-danger"><?php echo form_error('password') ?></small>
        </div>
        <button type="submit" class="btn btn-primary btn-login">LOGIN</button> 
      </form>
    </div>