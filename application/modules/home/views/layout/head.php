<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>elogv4</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for recent ecommerce statistics, charts, recent orders and sales" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= base_url() ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= base_url() ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>

        <script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- Library autoComplete -->
        <link href="<?= base_url() ?>assets/global/plugins/jquery-autocomplete-v2/jquery.auto-complete.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url() ?>assets/global/plugins/jquery-autocomplete-v2/jquery.auto-complete.js" type="text/javascript"></script>
        <!-- End of Library autoComplete -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/pages/scripts/ui-blockui.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <script>
            function notif(status, message) {
                $('.alert').show();
                $('.custom-alerts').addClass('alert-'+status);
                $('#message').text(message);
                setTimeout(function(){
                    $('.alert').hide();
                }, 4000);
            }

            function resetInput(url) {
                $('.input-text').val('');
                $('.input-text-checkbox').prop('checked', false);
                $('.form-input').attr('action', url);
            }

            function formFocus() {
                $(".first-focus").focus();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            function blockWindow() {
                App.blockUI({boxed:!0}),window.setTimeout(function(){App.unblockUI()},2e3)
            }
        </script>
    <!-- END HEAD -->
    <style type="text/css">
      .ui-autocomplete { z-index:20000; width:35%}
    	.ui-autocomplete{
    		max-height:200px;
    		overflow-y:auto;
    		overflow-x:hidden;
    	}
    	* html .ui-autocomplete{height:200px;}
      </style>
    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container-fluid">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="index.html">
                                        <img src="<?= base_url() ?>assets/layouts/layout3/img/kemenkes.png" width="50%" alt="logo" class="" style="padding-top: 10px;">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <img alt="" class="img-circle" src="<?= base_url() ?>assets/layouts/layout3/img/avatar9.jpg">
                                                <span class="username username-hide-mobile">Nick</span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="page_user_profile_1.html">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <li>
                                                    <a href="app_todo_2.html">
                                                        <i class="icon-rocket"></i> My Tasks
                                                        <span class="badge badge-success"> 7 </span>
                                                    </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="page_user_login_1.html">
                                                        <i class="icon-key"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
                                <?php $this->load->view('home/layout/menu', $role); ?>
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                  <!-- BEGIN CONTAINER -->
