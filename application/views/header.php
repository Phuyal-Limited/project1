<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title><?php echo $title;?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
  </head>
  <body>
<!-- Start: HEADER -->
    <header style="height:40px;">
      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="home" class="brand brand-nepalreads"><img src="<?php echo base_url('assets/images/logo.png');?>"></a>
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">        
              <ul class="nav pull-right">
                <li><a href="#">Products</a></li>
                <li><a href="#">product</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Feedback</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Sign up</a></li>
                <li><a href="#">Sign in</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Navigation wrapper -->   
    </header>
    <!-- End: HEADER -->