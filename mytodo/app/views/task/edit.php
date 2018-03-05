<?php $this->load->view('layouts/header'); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
          <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create New Task</h3>
    </div>
    
    <div class="panel-body">
     <h1>Add a Task</h1>
<p>List:<strong> <?php //echo $list_name; ?></strong></p>

<!--Display Errors-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('TaskController/update/'.$task->id.''); ?>

<!--Field: Task Name-->
<p>
<?php echo form_label('Task Name:'); ?>
<?php
$data = array(
              'name'        => 'task_name',
              'value'       => $task->task_name
            );
?>
<?php echo form_input($data); ?>
</p>

<!--Field: Task Body-->
<p>
<?php echo form_label('Task Body:'); ?>
<?php
$data = array(
              'name'        => 'task_body',
              'value'       => $task->task_body
            );
?>
<?php echo form_textarea($data); ?>
</p>

<!--Field: Date-->
<p>
<?php echo form_label('Date:'); ?>
<input type="date" name="due_date" value="<?php echo $task->due_date; ?>" />
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Add Task",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?php echo form_submit($data); ?>
</p>
<?php echo form_close(); ?>

    </div>
  </div>  
</div>
    

  
<?php $this->load->view('layouts/footer'); ?>