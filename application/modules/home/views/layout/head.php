<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Title</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/template/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="<?= base_url(); ?>assets/template/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?= base_url(); ?>assets/template/css/font-awesome.css" rel="stylesheet" />

    <!-- select2 -->
    <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom Styles-->
    <link href="<?= base_url(); ?>assets/template/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/js/Lightweight-Chart/cssCharts.css">

    <!-- jQuery Js -->
    <script src="<?= base_url(); ?>assets/template/js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Js -->
    <script src="<?= base_url(); ?>assets/template/js/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/materialize/js/materialize.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="<?= base_url(); ?>assets/template/js/jquery.metisMenu.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url(); ?>assets/template/js/custom-scripts.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation" style="">
            <div class="navbar-header" style="padding-top: 2px;">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand waves-effect waves-dark" href="index.html"> -->
                <a class="" href="index.html" style="padding-left: 20px; padding-right: 20px;">
                  <!-- <i class="large material-icons">info_outline</i> -->
                  <img src="<?= base_url(); ?>assets/upload/logo/logo-uin-fix.png" width="40px">
                  <!-- <strong>FEBI UIN SUKA</strong> -->
                </a>

		            <div id="sideNav" href="" class="" style="display:none;"><i class="material-icons dp48" id="toc">toc</i></div>
            </div>
            <ul class="nav navbar-top-links navbar-right">
			          <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1">
                      <i class="fa fa-user fa-fw"></i> <b><?= ($this->session->userdata('name') !== null) ? $this->session->userdata('name') : "public" ?></b>
                      <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-left" style="background: #ff9900 ! important;">
			          <li>
                  <a href="#" class="dropdown-button waves-effect waves-dark" style="color: white;">
                      <strong>
                        FAKULTAS EKONOMI DAN BISNIS ISLAM
                      </strong>
                  </a>
                </li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <?php if($this->session->userdata('login')): ?>
      <li>
        <a href="<?= base_url()?>roles/user/profile/<?= $this->session->userdata('id') ?>"><i class="fa fa-user fa-fw"></i> My Profile</a>
      </li>
      <li>
        <a href="<?= base_url()?>admin/login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
      </li>
  <?php else: ?>
      <li>
        <a href="<?= base_url()?>admin/login/login"><i class="fa fa-sign-out fa-fw"></i> Login</a>
      </li>
  <?php endif; ?>
</ul>	   <!--/. NAV TOP  -->
