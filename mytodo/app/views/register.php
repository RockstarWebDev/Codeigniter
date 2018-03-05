<?php $this->load->view('layouts/header'); ?>


<div class="container">
    <div class="row">
      <div class="col-lg-offset-2 col-lg-8">
        <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Register</h3>
  </div>
  
  <div class="panel-body">
    <?php echo form_open(base_url().'RegisterController/reg_validate', $attribute = array('class' =>'form-horizontal' , )); ?>
      <div class="form-group">

        <?php if (form_error('name')): ?>  
        <div class="text text-warning">
        <?php echo form_error('name'); ?>
      </div>
        <?php endif ?>

       <label>Name</label>
         <div class="col-lg-10">
           <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo set_value('name') ?>">
         </div>
      </div>


      <div class="form-group">
        <?php if (form_error('email')): ?>  
        <div class="text text-warning">
        <?php echo form_error('email'); ?>
      </div>
        <?php endif ?>
       <label>Email</label>
         <div class="col-lg-10">
           <input type="Email" name="email" placeholder="Email" class="form-control" value="<?php echo set_value('email') ?>">
         </div>
      </div>

       <div class="form-group">
        <?php if (form_error('password')): ?>  
        <div class="text text-warning">
        <?php echo form_error('password'); ?>
      </div>
        <?php endif ?>
       <label>Password</label>
         <div class="col-lg-10">
           <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo set_value('password') ?>">
         </div>
      </div>

      <div class="form-group">
        <?php if (form_error('password2')): ?>  
        <div class="text text-warning">
        <?php echo form_error('password2'); ?>
      </div>
        <?php endif ?>
       <label> Confirm Password</label>
         <div class="col-lg-10">
           <input type="password" name="password2" placeholder="confirm password" class="form-control">
         </div>
      </div>


      <div class="form-group">

         <div class=" col-lg-offset-4 col-lg-10">
           <input type="submit" name="submit" value="Register" class="btn btn-primary">
&nbsp;
            <input type="button" name="cancel" value="Not now" class="btn btn-default">
         </div>

          
          
         
      </div>

       
        
      
    <?php form_close() ?>
  </div>
</div>
      </div>
    </div>
</div>
  
<?php $this->load->view('layouts/footer'); ?>