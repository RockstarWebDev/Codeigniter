<?php $this->load->view('layouts/header'); ?>


<div class="container">
    <div class="row">

      <?php if ($this->session->flashdata('login_failed')): ?>
  <p class="alert alert-dismissable alert-danger">
    <?php echo $this->session->flashdata('login_failed'); ?>
  </p>
<?php endif ?>

      <div class="col-lg-offset-3 col-lg-6">
        <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
    <?php echo form_open(base_url().'LoginController/login_validate', $attribute = array('class' =>'form-horizontal'  )); ?>
    
      <div class="form-group">
       <label>Email</label>
         <div class="col-lg-10">
           <input type="Email" name="email" placeholder="Email" class="form-control" value="<?php echo set_value('email');  ?>" >
         </div>
      </div>

       <div class="form-group">
       <label>Password</label>
         <div class="col-lg-10">
           <input type="password" name="password" placeholder="password" class="form-control">
         </div>
      </div>


      <div class="form-group">

         <div class=" col-lg-offset-3 col-lg-10">
           <input type="submit" name="submit" value="Submit" class="btn btn-primary">
&nbsp;
            <input type="button" name="cancel" value="Cancel" class="btn btn-default">
         </div>

          
          
         
      </div>

       
        
      
    <?php form_close(); ?>

    <a href="<?php echo base_url() ?>RegisterController">New User please register first</a>
  </div>
</div>
      </div>
    </div>
</div>
  
<?php $this->load->view('layouts/footer'); ?>