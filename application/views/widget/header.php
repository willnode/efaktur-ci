<?php $role = $this->session->userdata('role')?>
<?php $username = $this->session->userdata('username')?>
<!DOCTYPE HTML>
<html lang="id">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=TITLE?></title>
  <link rel="icon" href="<?=base_url('assets/logo.png')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('vendors/icon-kit/css/iconkit.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/bootstrap-table/bootstrap-table.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('vendors/lavalite/css/theme.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/style.css')?>">
	<script src="<?=base_url('vendors/jquery/jquery.min.js')?>"></script>
	<script src="<?=base_url('vendors/popper/popper.min.js')?>"></script>
	<script src="<?=base_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
	<script src="<?=base_url('vendors/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('vendors/lavalite/js/theme.min.js')?>"></script>
	<script src="<?=base_url('vendors/bootstrap-table/bootstrap-table.min.js')?>"></script>
</head>

<body class="">
<div class="wrapper">
<header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                  
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/user.jpg" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="pages/profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a>
                                    <a class="dropdown-item" href="pages/login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>


<div class="page-wrap">
  <?php $this->load->view("$role/sidebar", ['username' => $username])?>
  <main class="main-content">
    <div class="container-fluid">