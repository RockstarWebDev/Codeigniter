<?php $this->load->view('layouts/header'); ?>

<?php if ($this->session->flashdata('login')): ?>
	<p class="alert alert-dismissable alert-success">
		<?php echo $this->session->flashdata('login'); ?>
	</p>
<?php endif ?>

<?php if ($this->session->flashdata('no-access')): ?>
	<p class="alert alert-dismissable alert-danger">
		<?php echo $this->session->flashdata('no-access'); ?>
	</p>
<?php endif ?>

<div class="container">
	<div class="row">
		
	<div class="col-lg-12">
		<h1><?php if ($this->session->userdata('logged_in')): ?>
	<?php echo $this->session->userdata('name'); ?>
<?php endif ?></h1>	
	</div>

	</div>
<!-- img -->
	<div class="col-lg-9 pull-right">
		<img src="uploads/Irshad.jpg">
	</div>
	<!-- img -->
</div>

<?php $this->load->view('layouts/footer'); ?>