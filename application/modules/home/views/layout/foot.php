<!-- END CONTAINER -->
</div>
</div>
<div class="page-wrapper-row">
<div class="page-wrapper-bottom">
    <!-- BEGIN FOOTER -->
    <?php //$this->load->view('home/page/prefooter'); ?>
    <!-- BEGIN INNER FOOTER -->
    <div class="page-footer">
        <div class="container-fluid"> 2019 &copy; Metronic Theme By
            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
            <a href="#">Developed by KEMENTERIAN KESEHATAN RI</a>
        </div>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
    <!-- END INNER FOOTER -->
    <!-- END FOOTER -->
</div>
</div>
</div>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url() ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= base_url() ?>assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">

jQuery(document).ready(
  function(){
    // App.blockUI({boxed:!0}),window.setTimeout(function(){App.unblockUI()},2e3)
    $(".input-date").inputmask("date", {alias:"dd-mm-yyyy"});
  }
);
</script>
</body>

</html>
