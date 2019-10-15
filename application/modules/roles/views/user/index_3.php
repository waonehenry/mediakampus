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
        <div class="col-lg-12 col-sm-6 col-md-6">
            <div class="card-panel text-center">
              <h4>Progress</h4>
              <div class="easypiechart" id="easypiechart-red" data-percent="<?= $progress ?>" ><span class="percent"><?= $progress ?>%</span>
              </div>
            </div>
        </div>
        <div class="col-lg-4">
             <div class="card">
               <div class="card-action" style="border-bottom: 1px solid;">
                   USER DATA
               </div>
               <div class="card-content">
                   <div class="row">
                     <div class="input-field col s12">
                       <input id="username" type="text" name="" required class="" autocomplete="off" value="<?= $profile['name']?>" readonly>
                       <label for="username">Name</label>
                     </div>
                   </div>
               <div class="clearBoth"></div>
              </div>
            </div>
        </div>
        <div class="col-lg-8">
             <div class="card">
               <div class="card-action" style="border-bottom: 1px solid;">
                   HISTORY
               </div>
               <div class="card-content">
                  <ul class="timeline">
                      <?php foreach ($history->result_array() as $key => $value): ?>
                          <?php
                              if(($key % 2) == 0 )
                                  $right = "timeline-inverted";
                              else
                                  $right = "";

                              if ($value['status'] == 0) {
                                  $sign = "danger";
                                  $icon = "glyphicon-remove";
                              } elseif ($value['status'] == 2) {
                                  $sign = "warning";
                                  $icon = "glyphicon-retweet";
                              } elseif ($value['status'] == 1) {
                                  $sign = "success";
                                  $icon = "glyphicon-thumbs-up";
                              }
                          ?>
                          <li class="<?= $right ?>">
                            <div class="timeline-badge <?= $sign ?>"><i class="glyphicon <?= $icon ?>"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title"><?= $value['state'] ?></h4>
                              </div>
                              <div class="timeline-body">
                                <p><?= $value['description'] ?></p>
                                <p>created: <?= $value['created_at'] ?></p>
                                <?php if($value['updated_at'] != null ): ?>
                                    <p>updated: <?= $value['updated_at'] ?></p>
                                <?php endif; ?>
                              </div>
                            </div>
                          </li>
                      <?php endforeach; ?>
                  </ul>
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
   <style type="text/css">
   .timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}
.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline > li {
  margin-bottom: 20px;
  position: relative;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li > .timeline-panel {
  width: 46%;
  float: left;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-left: 15px solid #ccc;
  border-right: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}
.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #fff;
  border-right: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}
.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 50%;
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
}
.timeline > li.timeline-inverted > .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 15px;
  left: -15px;
  right: auto;
}
.timeline > li.timeline-inverted > .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-badge.primary {
  background-color: #2e6da4 !important;
}
.timeline-badge.success {
  background-color: #3f903f !important;
}
.timeline-badge.warning {
  background-color: #f0ad4e !important;
}
.timeline-badge.danger {
  background-color: #d9534f !important;
}
.timeline-badge.info {
  background-color: #5bc0de !important;
}
.timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}
.timeline-body > p + p {
  margin-top: 5px;
}
   </style>
   <script src="<?= base_url(); ?>assets/template/js/easypiechart.js"></script>
   <script type="text/javascript">
   $(document).ready(function() {
       $(".ul-user-management").addClass('collapse in');
       $(".menu-user").addClass('active-menu');

       $('#easypiechart-red').easyPieChart({
          scaleColor: false,
          barColor: '#f9243f'
      });

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
