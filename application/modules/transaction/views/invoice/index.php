<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Transaction</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span><?= $title ?></span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="custom-alerts alert fade in" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <p id="message"></p>
                            </div>
                            <!-- Begin: life time stats -->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="icon-folder font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Form Input</span>
                                        <span class="caption-helper">create, update, delete</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo base_url ('transaction/invoice/store')?>" class="form-horizontal form-input" id="">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">No. Faktur/Dok</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="data[no_faktur]" id="no_faktur" autocomplete="off" class="form-control input-type input-text first-focus" placeholder="Enter text">
                                                </div>
                                                <div class="col-md-1">/</div>
                                                <div class="col-md-4">
                                                    <input type="text" name="data[no_kontrak]" id="no_kontrak" autocomplete="off" class="form-control input-type input-text" placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"><i class="required">*) </i>Tanggal/Periode</label>
                                                <div class="col-md-4">
                                                  <input type="text" name="data[tanggal]" id="tanggal" autocomplete="off" class="form-control input-type input-text input-date" required placeholder="Enter text">
                                                </div>
                                                <div class="col-md-1">/</div>
                                                <div class="col-md-4">
                                                  <input type="text" name="data[periode]" id="periode" autocomplete="off" class="form-control input-type input-text" required placeholder="Enter text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"><i class="required">*) </i>Sumber Dana</label>
                                                <div class="col-md-4">
                                                  <select name="data[dana]" id="dana" class="form-control input-text" required>
                                                    <option value="">--- PILIH ---</option>
                                                       <?php foreach(dana() as $key => $value): ?>
                                                        <option value="<?php echo $value['name']; ?>">
                                                             <?php echo $value['name']; ?>
                                                        </option>
                                                      <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-5">
                                    								<select name="data[tahun_anggaran]" id="tahun_anggaran" class="form-control input-text" required>
                                    									<option value="">--- PILIH ---</option>
                                    									   <?php foreach(tahun() as $key => $value): ?>
                                                          <option value="<?php echo $key; ?>">
                                                               <?php echo $value; ?>
                                                          </option>
                                                        <?php endforeach; ?>
                                    								</select>
                                							 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">PBF</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="data[pbf]" id="pbf" autocomplete="off" class="form-control input-type input-text"  placeholder="Enter text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><i class="required">*) Harus diisi</i></div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-blue">
                                        <i class="icon-settings font-blue"></i>
                                        <span class="caption-subject bold uppercase">List</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-content">
                                        <thead>
                                            <tr>
                                                <th class="all">No.</th>
                                                <th class="min-phone-l">No. Faktur</th>
                                                <th class="min-tablet">No. Dokumen</th>
                                                <th class="min-tablet">Tanggal</th>
                                                <th class="min-tablet">Periode</th>
                                                <th class="min-tablet">PBF</th>
                                                <th class="min-tablet">Sumber Dana</th>
                                                <th class="all">Act</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<div class="modal fade" id="modal-delete"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
            </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <span id="preloader-delete"></span>
                <br>
                <button class="btn btn-danger" id="delete-link"><i class="fa fa-trash"></i> Hapus</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-btn-cancel"><i class="fa fa-close"></i> Batal</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    var default_url = '<?= base_url()?>transaction/invoice/store';
    //datatables
    table = $('#table-content').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('transaction/invoice/server_side_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#table-content').on("draw.dt",function(){
        $('.btn-delete').on("click", function(e){
            e.preventDefault();
            var url = $(this).attr("href");
            $('#modal-delete').modal('show', {backdrop: 'static',keyboard :false});
            $('#delete-link').attr("action" , url );
        })

        $('.btn-edit').on("click", function(e) {
            e.preventDefault();
            url = $(this).attr("href");
            url_update = url.replace("edit", "update");
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $("#no_faktur").val(response.no_faktur);
                    $("#no_kontrak").val(response.no_kontrak);
                    $("#dana").val(response.dana);
                    $("#tanggal").val(response.tanggal);
                    $("#pbf").val(response.pbf);
                    $("#periode").val(response.periode);
                    $("#tahun_anggaran").val(response.tahun_anggaran);
                    $("#no_kontrak").val(response.no_kontrak);
                    $("#no_kontrak").val(response.no_kontrak);
                    $(".form-input").attr("action", url_update);
                    formFocus();
                }
            })
        })
    })

    $('.form-input').on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                blockWindow();
            },
            success: function (response) {
                notif(response.status, response.message);
                if (response.status == 'success') {
                    resetInput(default_url);
                    table.ajax.reload();
                }
            }
        })
    })

    $('#delete-link').on("click", function(e) {
        e.preventDefault();
        url = $(this).attr('action');
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            success: function (response) {
                $('#modal-btn-cancel').click();
                formFocus();
                notif(response.status, response.message);
                if (response.status == 'success') {
                    resetInput(default_url);
                    table.ajax.reload();
                }
            }
        })
    })

    $("#pbf").autoComplete({
        source: function(request, response){
            $.getJSON("<?= base_url(); ?>masterdata/pbf/search", { term: request }, function(item){
                response(item);
            });
        },
        renderItem: function (item, search){

            return '<div class="autocomplete-suggestion" data-val="' + item.value + '" data-id="' + item.id + '">' + item.label + '</div>';
        },
        onSelect: function(e, term, item){
            console.log(item.data('id'));
        }
    })
});
</script>
