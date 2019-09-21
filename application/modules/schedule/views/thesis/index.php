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
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>schedule/thesis/store">
                   <div class="row">
                     <div class="col s12">
                        <label for="room">Room</label>
                        <select id="room" name=data[room_id] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <?php foreach ($room->result() as $key): ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php endforeach; ?>
                        </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                        <label for="shift">Shift</label>
                        <select id="shift" name=data[shift_id] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <?php foreach ($shift->result() as $key): ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php endforeach; ?>
                        </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="date" type="text" name="data[d_date]" required class="input-text input-date" autocomplete="off">
                       <label for="date">Date</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="title" type="text" name="data[title]" required class="input-text" autocomplete="off">
                       <label for="title">Title</label>
                     </div>
                   </div>
                   <div class="row">
       								<div class="input-field col s12">
       								  <textarea id="description" class="materialize-textarea input-text" name="data[description]"></textarea>
       								  <label for="description">Description</label>
       								</div>
   							   </div>
                   <div class="row">
                     <div class="col s12">
                        <label for="dosen-1">Dosen Penguji 1</label>
                        <select id="dosen-1" name=data[dosen_id_1] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <?php foreach ($dosen->result() as $key): ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php endforeach; ?>
                        </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                        <label for="dosen-2">Dosen Penguji 2</label>
                        <select id="dosen-2" name=data[dosen_id_2] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <?php foreach ($dosen->result() as $key): ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            <?php endforeach; ?>
                        </select>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                        <label for="dosen-3">Dosen Penguji 3</label>
                        <select id="dosen-3" name=data[dosen_id_3] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <?php foreach ($dosen->result() as $key): ?>
                                <option value="<?= $key->id ?>"><?= $key->name ?></option>
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
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Examiner</th>
                                  <th width="10%">Time</th>
                                  <th width="10%">Room</th>
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
        $(".ul-schedule").addClass("collapse in");
        $(".modul-schedule").addClass('active-menu');
        $(".menu-thesis").addClass('active-menu');

       var default_url = '<?= base_url()?>schedule/thesis/store';
       //datatables
       table = $('#table-content').DataTable({
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.

           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('schedule/thesis/server_side_list')?>",
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
                       $("#description").val(response.description);
                       $("#date").val(response.d_date);
                       $("#room").select2("val", response.room_id);
                       $("#shift").select2("val", response.shift_id);
                       $("#dosen-1").select2("val", response.dosen_id_1);
                       $("#dosen-2").select2("val", response.dosen_id_2);
                       $("#dosen-3").select2("val", response.dosen_id_3);
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
