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
                 <form action="<?php echo base_url ('roles/group/insert_roles')?>" method="post" class="form-horizontal form-input">
          					<input type="hidden" name="data[group_id]" value="<?= $group_id ?>">
                    <ul class="collection">
                    <?php

                        $html_modul ='';
                        foreach ($menu_list->result() as $rows) {
                            $menu_all[$rows->modul_id][$rows->id] = '<li style="" class="collection-item">
                            <p><input type="checkbox" class="filled-in input-text-checkbox" name="role[]" id="filled-in-box-'.$rows->modul_id.$rows->id.'" value="'.$rows->id.'">
                            <label for="filled-in-box-'.$rows->modul_id.$rows->id.'">'.$rows->label_menu.'</label></p>
                            </li>';
                        }

                        foreach ($modul_list->result() as $key) {
                          $html_modul .= '<li style="" class="collection-item">
                          <p><input type="checkbox" class="filled-in input-text-checkbox" id="filled-in-box-'.$key->id.'" name="role[]" value="'.$key->id.'">
                          <label for="filled-in-box-'.$key->id.'">'.$key->label_modul.'</label></p>';
                            $id=$key->id;
                            $html_modul .= '<ul style="" class="collection">';
                            foreach ($menu_list->result() as $key2) {
                              if (isset($menu_all[$id][$key2->id])){
                                $html_modul .= $menu_all[$id][$key2->id];
                              }
                            }
                            $html_modul .= '</ul></li>';
                        }

                        echo $html_modul;
                    ?>
                    </ul>
          					<hr>
          					<div class="row">
          						<div class="col-md-offset-3 col-md-9">
          							<input type="submit" name="submit" value="Sumbit" class="btn btn-success">
          							<button type="button" class="btn btn-default btn-reset">Reset</button>
          						</div>
          					</div>
        				</form>
               <div class="clearBoth"></div>
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
       $(".ul-user-management").addClass('collapse in');
       $(".menu-group").addClass('active-menu');

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
