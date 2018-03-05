<?php $this->load->view('layouts/header'); ?>


<div class="container">
    <div class="row">
      <div class="col-lg-offset-2 col-lg-8">
        <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create New List</h3>
  </div>
  
  <div class="panel-body">
    <?php echo form_open('ListController/update/'.$list->id.'', $attribute = array('class' =>'form-horizontal' , )); ?>
      <div class="form-group">

        <?php if (form_error('title')): ?>  
        <div class="text text-warning">
        <?php echo form_error('title'); ?>
      </div>
        <?php endif ?>

       <label>Title</label>
         <div class="col-lg-10">
           <input type="text" name="title" placeholder="list title" class="form-control" value="<?php echo $list->title; ?>">
         </div>
      </div>


      <div class="form-group">
        <?php if (form_error('body')): ?>  
        <div class="text text-warning">
        <?php echo form_error('body'); ?>
      </div>
        <?php endif ?>
       <label>Body</label>
         <div class="col-lg-10">
           <textarea class="form-control" name="body" placeholder="list body"><?php echo $list->body; ?></textarea>
         </div>
      </div>

       

      <div class="form-group">

         <div class=" col-lg-offset-4 col-lg-10">
           <input type="submit" name="submit" value="Update" class="btn btn-primary">
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