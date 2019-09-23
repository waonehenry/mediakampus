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
                 <form class="col s12 form-input" method="post" action="<?= base_url()?>roles/user/update/<?= $profile['id']?>">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="username" type="text" name="" required class="" autocomplete="off" value="<?= $profile['username']?>" readonly>
                       <label for="username">Username</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="password" type="password" name="data[password]" required class="input-text" autocomplete="off">
                       <label for="password">Old Password</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="" type="password" name="data[new_password]" required class="input-text" autocomplete="off">
                       <label for="password">New Password</label>
                     </div>
                   </div>
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="" type="password" name="data[confirm_password]" required class="input-text" autocomplete="off">
                       <label for="password">Confirm New Password</label>
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
       $(".menu-user").addClass('active-menu');

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
                      window.location.href = '<?= base_url() ?>admin/login/logout';
                   }
               }
           })
       })
   });
   </script>
