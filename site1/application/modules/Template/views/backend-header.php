<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html> 
  <head>       
    <!-- Meta --> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>InstaSales</title>
        
    <!-- CSS --> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-responsive.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-reset.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/backend/styles.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/backend/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head> 

  <body class="">
    <div id="wrapper" class="">
    <header class="main-header">
      <nav class="navbar navbar-static-top" role="navigation">
        <div class="col-xs-4">
          <!-- Sidebar toggle button-->
          <a href="#menu-toggle" class="sidebar-toggle" id="menu-toggle" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        </div>
        <div class="col-xs-4 phone-logo">
         <a href="/Dashboard">
            <span class="logo-lg">Instasales</span>
          </a>
        </div>
        <div class="col-xs-4">
          <!-- Navbar Right Menu -->
          <div class="navbar-rightside">
            <ul class="nav navbar-nav"> 
              <li><a href="<?php echo base_url().'Products'; ?>"><i class="fa fa-eye"></i> View Shop</a></li>
              <li><a href="<?php echo base_url().'Users/logout'; ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="sidebar">
      <ul class="sidebar-menu">
        <li class="no-style">
          <!-- Logo -->
          <a href="/Dashboard" class="logo">
            <span class="logo-lg">Instasales</span>
          </a>
        </li>
        <li class="fullview">
          <?php echo anchor('Dashboard/Home', '<i class="fa fa-dashboard"></i> Dashboard')?>
        </li>
        <li class="fullview">
          <?php echo anchor('Products/manage','<i class="fa fa-archive"></i> Products'); ?>
        </li>
        <li class="fullview">
          <?php echo anchor('Product_categories/manage','<i class="fa fa-th-list"></i> Categories'); ?>
        </li>          
        <li class="fullview">
         <?php echo anchor('Orders/manage','<i class="fa fa-shopping-cart"></i> Orders');?>
        </li>
        <li class="fullview">
         <?php echo anchor('Customer_account/manage','<i class="fa fa-users"></i> Customers'); ?>
        </li>
        <li class="fullview">
          <?php echo anchor('Shipping','<i class="fa fa-paper-plane-o"></i> Shipping'); ?>
        </li>
        <li class="fullview">
          <a href="<?php echo base_url().'Products'; ?>"><i class="fa fa-eye"></i> View Shop</a>
        </li>
        <li class="fullview">
          <a href="<?php echo base_url().'Users/logout'; ?>"><i class="fa fa-sign-out"></i> Log Out</a>
        </li>
      </ul>
    </div>
    <!-- /.sidebar -->
    <div class="content-wrapper">