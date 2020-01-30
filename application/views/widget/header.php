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
            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
          </div>
          <div class="top-menu d-flex align-items-center">
              <div class="dropdown">
                  <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <img class="avatar" src="<?= base_url(empty($avatar) ? 'assets/user.png' : 'uploads/avatar/'.$avatar) ?>" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="<?=base_url('logout')?>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
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

      <?php if (isset($this->session->error)) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $this->session->error ?>
      </div>
      <?php endif ?>
      <?php if (isset($this->session->message)) : ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= $this->session->message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php endif ?>