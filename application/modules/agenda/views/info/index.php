<link href="<?= base_url(); ?>assets/custom/jquery-te/jquery-te-1.4.0.css" rel="stylesheet" />
<script src="<?= base_url(); ?>assets/custom/jquery-te/jquery-te-1.4.0.min.js"></script>
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
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>agenda/info/store">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="title" type="text" name="data[title]" required class="input-text" autocomplete="off">
                       <input type="hidden" value="2" name="data[type]">
                       <label for="title">Title</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s6">
                       <input id="date-start" type="text" name="data[date_start]" required class="input-text input-date" autocomplete="off">
                       <label for="date-start">Date Start</label>
                     </div>
                     <div class="input-field col s6">
                       <input id="date-end" type="text" name="data[date_end]" required class="input-text input-date" autocomplete="off">
                       <label for="date-end">Date End</label>
                     </div>
                   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <textarea id="description" class="materialize-textarea input-text textarea" name="data[description]"></textarea>
       								  <label for="description">Description</label>
       								</div>
   							   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <textarea id="time-description" class="materialize-textarea input-text" name="data[time_desc]"></textarea>
       								  <label for="time-description">Time Description</label>
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
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Duration</th>
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
         <h4 style="text-align:center;">Are you sure to remove this?</h4>
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
        $(".ul-agenda").addClass('collapse in');
        $(".modul-agenda").addClass('active-menu');
        $(".menu-info").addClass('active-menu');

        $(".textarea").jqte();

       var default_url = '<?= base_url()?>agenda/info/store';
       //datatables
       table = $('#table-content').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('agenda/info/server_side_list')?>",
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
                       $("#title").val(response.title);
                       $("#description").jqteVal(response.description);
                       $("#time-description").val(response.time_desc);
                       $("#date-start").val(response.date_start);
                       $("#date-end").val(response.date_end);
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
