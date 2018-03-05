<?php $this->load->view('layouts/header'); ?>

<div class="container">

<?php if ($this->session->flashdata('Task-created')): ?>
  <p class="alert alert-dismissable alert-success">
    <?php echo $this->session->flashdata('Task-created'); ?>
  </p>
<?php endif ?>

<?php if ($this->session->flashdata('task-update')): ?>
  <p class="alert alert-dismissable alert-primary">
    <?php echo $this->session->flashdata('task-update'); ?>
  </p>
<?php endif ?>

<?php if ($this->session->flashdata('task-update')): ?>
  <p class="alert alert-dismissable alert-primary">
    <?php echo $this->session->flashdata('task-update'); ?>
  </p>
<?php endif ?>

<?php if ($this->session->flashdata('marked_complete')): ?>
  <p class="alert alert-dismissable alert-primary">
    <?php echo $this->session->flashdata('marked_complete'); ?>
  </p>
<?php endif ?>

<?php if ($this->session->flashdata('marked_new')): ?>
  <p class="alert alert-dismissable alert-primary">
    <?php echo $this->session->flashdata('marked_new'); ?>
  </p>
<?php endif ?>

  <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
         
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <h3 class="timeline-header"><?php echo $list->title; ?></h3>
<small style="font-style: bold;">Created on - <?php echo $list->created_at; ?></small><br>
                <div class="timeline-body">
                  <?php echo $list->body; ?>
                </div>
                <br>
                <div class="timeline-footer">
                  <a href="<?php echo base_url(); ?>ListController/edit/<?php echo $list->id ?>" class="btn btn-primary btn-xs">Edit list</a>
&nbsp;
                  <a onclick="return confirm('Are you sure ?')" href="<?php echo base_url(); ?>ListController/delete/<?php echo $list->id ?>" class="btn btn-danger btn-xs">Delete list</a>
                </div>
              </div>
            </li>
                    </ul>
                    
        </div>
        <!-- /.col -->
      </div>

  
<!-- 2n row to show task -->

<div class="row">
  <div class="col-lg-8 pull-right"><h2><?php echo ucfirst($list->title) ; ?> Tasks</h2>
   <div class="col-lg-11 pull-right">
    <a href="<?php echo base_url(); ?>TaskController/create/<?php echo $list->id ?>" class="btn btn-info">Add a new task</a>
     &nbsp;
   </div>
  </div>
</div>
<br>

  <div class="col-lg-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  
                  <th><h4>Current Open Tasks</h4></th>
                  <th><h4>Recently Completed</h4></th>
                  
                </tr>
               
<tr>

  <td><?php if($completed_tasks) : ?>

       <?php foreach($completed_tasks as $task) : ?>
        
        <li>
          <a href="<?php echo base_url(); ?>TaskController/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
          
       <?php endforeach; ?>
        
   <?php else : ?>
       <p>There are no current tasks</p>
   <?php endif; ?>
</td>

  <td>          <?php if($uncompleted_tasks) : ?>
       
       <?php foreach($uncompleted_tasks as $task) : ?>
           <li><a href="<?php echo base_url(); ?>TaskController/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
       <?php endforeach; ?>
       
   <?php else : ?>
        <p>There are no completed tasks</p>
   <?php endif; ?></td>

           



     
                            
                
</tr>
               </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
<!-- container -->

<?php $this->load->view('layouts/footer'); ?>