          <footer>
              <p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>
          </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<script src="<?= base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>


<script type="text/javascript">
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
    $('.input-text-select2').val('').trigger('change');
    $('.input-text-checkbox').prop('checked', false);
    $('label').removeClass('active');
    $('.form-input').attr('action', url);
    // $('.textarea').jqteVal("");
}

function formFocus() {
    $(".first-focus").focus();
    $("label").addClass('active');
    $("html, body").animate({ scrollTop: 0 }, "slow");
}

$(document).ready(function() {
    formFocus();
    $('.modal').modal();
    $(".input-date").inputmask("date", {alias:"dd-mm-yyyy"});
    // $(".input-date").datetimepicker();
    $(".select2").select2({
        allowClear: true
    });
})
</script>

</body>

</html>
