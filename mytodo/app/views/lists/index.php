<?php $this->load->view('layouts/header'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
<?php if ($this->session->flashdata('list-created')): ?>
	<p class="alert alert-dismissable alert-success">
		<?php echo $this->session->flashdata('list-created'); ?>
	</p>
<?php endif ?>

<?php if ($this->session->flashdata('list-update')): ?>
  <p class="alert alert-dismissable alert-success">
    <?php echo $this->session->flashdata('list-update'); ?>
  </p>
<?php endif ?>
			
			<?php echo anchor('ListController/create', 'Add List', 'class="btn btn-success"'); ?>&nbsp;
			
		
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
       <div class="col-md-12">
         <section class="content-header">
      <h2>
        List
        <small>Preview page</small>
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Widgets</li>
      </ol>
    </section>
          <table class="table table-hover">
                <tr>
                  <th>NO</th>
                  <th>Title</th>
                  <th>Created_On</th>
                  <th>Body</th>
                </tr>
                <?php $sr_no = 0; ?>
                <?php foreach ($lists as $list): ?>

                  
                <tr>
                    <td><?php echo ++$sr_no;?></td>
                        <td><a href="<?php echo base_url(); ?>ListController/show/<?php echo $list->id; ?>"><?php echo $list->title;  ?></a></td>
                        <td><?php echo date("n-j-Y", strtotime($list->created_at));?></td>
                        <td><?php echo $list->body;  ?></td>
                 </tr>       
                        
                
                <?php endforeach ?>
              </table>
        </div>
</div>
</div>
<?php $this->load->view('layouts/footer'); ?>