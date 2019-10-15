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
                   Data
              </div>
              <div class="card-content">
                  Nama:<br>
                  NIM:<br>
                  Prodi:
              </div>
          </div>
        </div>
        <div class="col-lg-6">
             <div class="card">
               <div class="card-action" style="border-bottom: 1px solid;">
                   History
               </div>
               <div class="card-content">
                 <div class="custom-alerts alert fade in" style="display: none;">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                     <p id="message"></p>
                 </div>
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>register/thesis/verif">
                   <div class="row">
                     <div class="col s12">
                        <?php foreach ($state->result() as $key): ?>
                            <p>
                              <input type="checkbox" class="filled-in input-text-checkbox" id="filled-in-box-<?= $key->id ?>" value="<?= $key->id ?>" name="data_checkbox[document][]"/>
                              <label for="filled-in-box-<?= $key->id ?>"><?= $key->name ?></label>
                            </p>
                            <div class="input-field col s12">
             								  <textarea id="description" class="materialize-textarea input-text" name="data[description]"></textarea>
             								  <label for="description">Description</label>
             								</div>
                        <?php endforeach; ?>
                     </div>
                   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <button type="submit" class="btn btn-small btn-submit btn-success">Update</button>
       								</div>
   							   </div>
                 </form>
               <div class="clearBoth"></div>
              </div>
            </div>
        </div>
   </div>
   <div class="modal fade" id="modal-delete"  data-backdrop="static" data-keyboard="false">
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

       var default_url = '<?= base_url()?>register/thesis/store';
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
               url_update = url.replace("edit", "update");
               $.ajax({
                   url: url,
                   type: "GET",
                   dataType: "json",
                   success: function(response) {
                       $("#name").val(response.name);
                       $("#code").val(response.code);
                       $("#description").val(response.description);
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
