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
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>setting/display/update/1">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="title" type="text" name="data[title]" required class="input-text first-focus" value="<?= $profile['title']?>">
                       <label for="title" class="first-focus-label active">Title</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="description" type="text" name="data[description]" class="input-text" autocomplete="off" value="<?= $profile['description']?>">
                       <label for="description">Description</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="schedule-speed" type="number" name="data[marquee_speed]" class="input-text" autocomplete="off" value="<?= $profile['marquee_speed']?>">
                       <label for="schedule-speed">Schedule Speed</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="running-text-speed" type="number" name="data[marquee_speed_running_text]" class="input-text" autocomplete="off" value="<?= $profile['marquee_speed_running_text']?>">
                       <label for="running-text-speed">Running Text Speed</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col s12">
                        <label for="semester">Semester</label>
                        <select id="semester" name=data[semester] required class="form-control select2 input-text-select2">
                            <option value="">Silakan pilih</option>
                            <option value="1" <?= ($profile['semester'] == 1) ? 'selected="selected"' : "" ?> >Gasal</option>
                            <option value="2" <?= ($profile['semester'] == 2) ? 'selected="selected"' : "" ?> >Genap</option>
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
        <div class="col-lg-6">
             <div class="card">
               <div class="card-action" style="border-bottom: 1px solid;">
                   INPUT FORM DESIGN
               </div>
               <div class="card-content">
                 <form class="col s12 form-input-design" method="post" action="<?= base_url()?>setting/display/update/1">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="top-section" type="number" name="data[top_section]" class="input-text" autocomplete="off" value="<?= $profile['top_section']?>">
                       <label for="top-section">Top</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="bottom-section" type="number" name="data[bottom_section]" class="input-text" autocomplete="off" value="<?= $profile['bottom_section']?>">
                       <label for="bottom-section">Bottom</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="font-size" type="number" name="data[font_size]" class="input-text" autocomplete="off" value="<?= $profile['font_size']?>">
                       <label for="font-size">Font Size</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="title-font-size" type="number" name="data[title_font_size]" class="input-text" autocomplete="off" value="<?= $profile['title_font_size']?>">
                       <label for="title-font-size">Title Font Size</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s1">
                        Color
                     </div>
                     <div class="input-field col s2">

                       <input id="color" type="color" name="data[color]" required class="input-text" value="<?= $profile['color']?>">
                     </div>
                     <div class="input-field col s3">
                        Font Color
                     </div>
                     <div class="input-field col s3">
                       <input id="font-color" type="color" name="data[font_color]" required class="input-text" value="<?= $profile['font_color']?>">
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
       $(".ul-setting").addClass('collapse in');
       $(".menu-setting").addClass('active-menu');

       $('.form-input').on("submit", function(e) {
           e.preventDefault();
           $.ajax({
               url: $(this).attr('action'),
               type: "POST",
               data: $(this).serialize()+"&"+$('.form-input-design').serialize(),
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

       // $('.form-input-design').on("submit", function(e) {
       //     e.preventDefault();
       //     $.ajax({
       //         url: $(this).attr('action'),
       //         type: "POST",
       //         data: $(this).serialize(),
       //         dataType: "json",
       //         success: function (response) {
       //             notif(response.status, response.message);
       //             if (response.status == 'success') {
       //                 resetInput(default_url);
       //                 table.ajax.reload();
       //             }
       //         }
       //     })
       // })
   });
   </script>
