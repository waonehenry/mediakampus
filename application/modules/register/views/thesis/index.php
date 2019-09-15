<div id="page-wrapper" style="">
    <div class="header">
        <h1 class="page-header">
            <?= $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><?= $modul ?></a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </div>
    <div id="page-inner">
    <div class="row">
        <div class="col-lg-6">
             <div class="card">
               <div class="card-action" style="border-bottom: 1px solid;">
                   INPUT FORM
               </div>
               <div class="card-content">
                 <div class="custom-alerts alert fade in" style="display: none;">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                     <p id="message"></p>
                 </div>
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>register/thesis/store">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="name" type="text" name="data[name]" required class="input-text" autocomplete="off">
                       <label for="date">Name</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                        <?php foreach ($document->result() as $key): ?>
                            <p>
                              <input type="checkbox" class="filled-in input-text-checkbox" id="filled-in-box-<?= $key->id ?>" value="<?= $key->id ?>" name="data_checkbox[document][]"/>
                              <label for="filled-in-box-<?= $key->id ?>"><?= $key->name ?></label>
                            </p>
                        <?php endforeach; ?>
                     </div>
                   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <textarea id="description" class="materialize-textarea input-text" name="data[description]"></textarea>
       								  <label for="description">Description</label>
       								</div>
   							   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <button type="submit" class="btn btn-small btn-submit btn-success">Save</button>
                        <button type="reset" class="btn btn-small btn-reset btn-default">Reset</button>
       								</div>
   							   </div>
                 </form>
               <div class="clearBoth"></div>
              </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="card">
              <div class="card-action" style="border-bottom: 1px solid;">
                   Data
              </div>
              <div class="card-content">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="table-content">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Date</th>
                                  <th>Name</th>
                                  <th>Document</th>
                                  <th>Description</th>
                                  <th>Act</th>
                              </tr>
                          </thead>
                          <tbody></tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
   </div>
   <div class="modal fade" id="modal-delete"  data-backdrop="static" data-keyboard="false" style="height: 272px;">
     <div class="" style="margin-top:100px;">
         <h4 style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
     </div>
     <div class="" style="margin:0px; border-top:0px; padding-bottom: 10px;">
        <div class="center-align">
          <p>
            <a class="waves-effect waves-green btn modal-close" id="delete-link"> Ya</a>
            <a class="waves-effect waves-green btn btn-default modal-close"> Tidak</a>
          </p>
        </div>
     </div>
   </div>
   <script type="text/javascript">
   $(document).ready(function() {
        $(".ul-register").addClass("collapse in");
        $(".modul-register").addClass('active-menu');
        $(".menu-register-thesis").addClass('active-menu');

       var default_url = '<?= base_url()?>schedule/empty_course/store';
       //datatables
       table = $('#table-content').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('register/thesis/server_side_list')?>",
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
               $('#modal-delete').modal('open');
               $('#delete-link').attr("action" , url );
           })

           $('.btn-edit').on("click", function(e) {
               e.preventDefault();
               url = $(this).attr("href");
               url_update = url.replace("edit_group", "update_group");
               $.ajax({
                   url: url,
                   type: "GET",
                   dataType: "json",
                   success: function(response) {
                       $("#description").val(response[0].description);
                       $("#date").val(response[0].date_start);
                       $("#dosen").select2("val", response[0].dosen_id);
                       //
                       var shifts = response.map(function (sch) {
                                            $('.input-text-checkbox[value="'+sch.shift_start+'"]').prop('checked', true);
                                          });
                       $("#shift").select2("val", response.shift_id);
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
                   formFocus();
                   notif(response.status, response.message);
                   if (response.status == 'success') {
                       resetInput(default_url);
                       table.ajax.reload();
                   }
               }
           })
       })
   });
   </script>
