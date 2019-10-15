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
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>roles/menu/store">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="name" type="text" name="data[label_menu]" required class="input-text first-focus" autocomplete="off">
                       <label for="name" class="first-focus-label active">Name</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="url" type="text" name="data[url_menu]" class="input-text" autocomplete="off">
                       <small><i style="color: red">*)without <?= base_url() ?></i></small>
                       <label for="url" class="">URL</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="class-menu" type="text" name="data[class]" required class="input-text" autocomplete="off">
                       <label for="class-menu">Class</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                       <label for="group">Modul</label>
                       <select id="group" name="data[modul_id]" required class="form-control input-text">
                          <option value="">Silakan diisi</option>
                          <?php foreach ($modul_list->result() as $key): ?>
                              <option value="<?= $key->id ?>"><?= $key->label_modul ?></option>
                          <?php endforeach; ?>
                       </select>
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
                                  <th>Name</th>
                                  <th>URL</th>
                                  <th>Class</th>
                                  <th>Modul</th>
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
       $(".modul-user-management").addClass('active-menu');
       $(".ul-user-management").addClass('collapse in');
       $(".menu-menu").addClass('active-menu');

       var default_url = '<?= base_url()?>roles/menu/store';
       //datatables
       table = $('#table-content').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('roles/menu/server_side_list')?>",
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
               url_update = url.replace("edit", "update");
               $.ajax({
                   url: url,
                   type: "GET",
                   dataType: "json",
                   success: function(response) {
                       $("#name").val(response.label_menu);
                       $("#url").val(response.url_menu);
                       $("#class-menu").val(response.class);
                       $("#group").val(response.modul_id);
                       $("#description").val(response.description);
                       $(".form-input").attr("action", url_update);
                       formFocus();
                   }
               })
           })

           $('.btn-reset-password').on("click", function(e) {
               e.preventDefault();
               url = $(this).attr("href");
               $.ajax({
                   url: url,
                   type: "GET",
                   dataType: "json",
                   success: function(response) {
                       notif(response.status, response.message);
                       if (response.status == 'success') {
                           resetInput(default_url);
                           table.ajax.reload();
                       }
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
               // beforeSend: function() {
               //     blockWindow();
               // },
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
