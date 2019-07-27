<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Target Material Design Bootstrap Admin Template</title>
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
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">info_outline</i> <strong>KAMPUS</strong></a>

		            <div id="sideNav" href="" class=""><i class="material-icons dp48" id="toc">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				           <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>Admin</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li>
<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>	   <!--/. NAV TOP  -->
