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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>NO</th>
                  <th>Title</th>
                  <th>Created_on</th>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>



<?php $this->load->view('layouts/footer'); ?>