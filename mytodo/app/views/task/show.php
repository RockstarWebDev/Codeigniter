<?php $this->load->view('layouts/header'); ?>

<div class="container">
  <div class="row">
    
    
    <a href="<?php echo base_url(); ?>TaskController/create/<?php echo $list_id ?>" class="btn btn-primary">Add a new task</a>
     &nbsp; 
    <a href="<?php echo base_url(); ?>TaskController/edit/<?php echo $task->id ?>"  class="btn btn-info">Edit task</a>
     &nbsp;
    <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>TaskController/delete/<?php echo $task->list_id ?>/<?php echo $this->uri->segment(3) ?>" class="btn btn-warning">Delete task</a>
     &nbsp;

      


  <div class="col-lg-12">
    <ul id="actions">
    <h4>Task Actions</h4>  
     
    <?php if($is_complete) : ?>
        <li> <a href="<?php echo base_url(); ?>TaskController/mark_new/<?php echo $task->id; ?>"><button class="btn btn-info">Mark New</button></a></li> 
    <?php else : ?>
        <li> <a href="<?php echo base_url(); ?>TaskController/mark_complete/<?php echo $task->id; ?>"><button class="btn btn-info">Mark Complete</button></a></li> 
    <?php endif; ?>

</ul>




<div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title"><?php echo $task->task_name; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Created on</dt>
                <dd><?php echo date("n-j-Y",strtotime($task->created_at)); ?></dd>
                <dt>Status</dt>
                <dd><?php if($task->is_complete == 0) : ?>
    <strong style="color: red;">Uncomplete</strong>
<?php else : ?>
    <strong style="color: green;">Completed</strong>
<?php endif; ?></dd>
               
                <dt>Due Date</dt>
                <dd><?php echo date("n-j-Y",strtotime($task->due_date)); ?></dd>
                <dt>About Task</dt>
                <dd><?php echo $task->task_body; ?>
                </dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
   
  </div>

  </div>

</div>



<?php $this->load->view('layouts/footer'); ?>