<!DOCTYPE html>
<html>
<head>
	<title>my ci todo</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
</head>
<body>
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>Welcome">TODO LIST</a>

      <?php if ($this->session->userdata('logged_in')): ?> 
            <a href="<?php echo base_url(); ?>ListController" class="navbar-brand">| &nbsp; My Lists</a>
<?php endif ?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      
      <p class='navbar-text'></p>
      <ul class="nav navbar-collapse navbar-nav navbar-right">
        <li>
          <?php if ($this->session->userdata('logged_in')): ?> 
            <a href="<?php echo base_url(); ?>LoginController/logout" class="pull-right"><button class="btn btn-danger">Logout</button></a>
<?php else: ?>

        	<a href="<?php echo base_url(); ?>LoginController" class="pull-right"><button class="btn btn-success">Login</button></a>
<?php endif ?>
          
        </li>
      </ul>
    </div>
  </div>
</nav>