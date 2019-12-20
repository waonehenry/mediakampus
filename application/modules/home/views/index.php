<script src="<?= base_url(); ?>assets/custom/marquee/jquery.marquee.js"></script>
<style>
.card-action-title{
  padding: 8px ! important;
}

.row {
  margin-bottom: 0px ! important;
  height: 50% ! important;
}

#page-inner {
  margin: 0px ! important;
  padding: 5px 10px ! important;
}
.marquee {
    height: 400px;
    overflow: hidden;
    border:1px solid #ccc;
    /* background: black; */
    color: rgb(202, 255, 195);
}

.marquee-munaqosah {
    height: 300px;
    overflow: hidden;
    /* border:1px solid #ccc; */
    /* background: black; */
    /* color: rgb(202, 255, 195); */
}

</style>
<style>
* {box-sizing: border-box;}
body {
  font-family: Verdana, sans-serif;
  font-size: <?= (setting_display()['font_size']) ?>px;
}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  /* color: #f2f2f2; */
  /* color: red; */
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  /* text-align: center; */
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active-dot {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
<div id="page-wrapper">
    <div class="header">
        <ol class="breadcrumb"></ol>
    </div>
        <div id="page-inner">
          <div id="">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="height: <?= (setting_display()['top_section']) ?>px;">
                  <div class="card-action card-action-title" style="
                          background-color: <?= (setting_display()['color']) ?>;
                          color: <?= (setting_display()['font_color']) ?>;
                          ">
                    <b>Jadwal Kuliah Hari Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection" style="height: <?= (setting_display()['top_section']-100) ?>px;">
                      <div class='marquee'>
                      <?php foreach ($course->result() as $key): ?>
                          <?php
                                $color_badge = "green";
                                $message = "";
                                $empty = empty_course($key->dosen_id, $key->shift_id, date('Y-m-d'));
                                if ($empty->num_rows() > 0) {
                                    $temp = $empty->row_array();
                                    $color_badge = "red";
                                    $message = $temp['description'];
                                }
                          ?>
                          <a href="#!" class="collection-item"><?= $key->course ?> | <?= $key->room ?> | <?= $key->dosen ?> | <?= $key->class ?>
                            <span class="new badge <?= $color_badge?>" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span>
                            <?php if ($color_badge == "red"): ?>
                                <span class="badge" data-badge-caption=""><?= $message ?></span>
                            <?php endif; ?>
                          </a>
                      <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div id="">
          <div class="row">
            <?php
                $extend = 8;
                if ($agenda->num_rows() > 0) {
                    $extend = 4;
                }
            ?>
            <div class="col-md-<?= $extend ?> col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-action card-action-title" style="
                        background-color: <?= (setting_display()['color']) ?>;
                        color: <?= (setting_display()['font_color']) ?>;
                        ">
                  <b>Jadwal Munaqosah</b>
                </div>
                <div class="card-image">
                    <ul class="collection" style="height: 280px;">
                      <div class='marquee-munaqosah'>
                      <?php foreach ($thesis->result() as $key): ?>
                      <?php
                        if ($key->type == 7) {
                            $color_icon = 'orange';
                            $icon = 'track_changes';
                            $background = '';
                        } elseif ($key->type == 8) {
                            $icon = 'track_changes';
                            $background = 'red';
                            $color_icon = 'orange';
                        } else {
                            $background = '';
                            $icon = 'format_quote';
                            $color_icon = 'yellow';
                        }
                      ?>
                      <li class="collection-item avatar <?= $background ?>">
                        <i class="material-icons circle <?= $color_icon ?>"><?= $icon ?></i>
                        <span class="title"><?= $key->title ?></span>
                        <p><?= $key->description ?><br>
                           Ruang: <?= $key->room ?> <br>
                           Penguji: <?= $key->examiner ?>
                           <span class="new badge red" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span>
                        </p>
                      </li>
                      <?php endforeach; ?>
                      </div>
                    </ul>
                </div>
                <div class="card-action" style="padding: 5px ! important; border-top: 0px ! important;">
                  <a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a> Seminar proposal
                  <a class="btn-floating orange"><i class="material-icons">track_changes</i></a> S1/<b style="color:red;">S2</b>
                </div>
              </div>
            </div>
              <?php if ($agenda->num_rows() > 0): ?>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action card-action-title" style="
                          background-color: <?= (setting_display()['color']) ?>;
                          color: <?= (setting_display()['font_color']) ?>;
                          ">
                    <b>Agenda Kampus</b>
                  </div>
                  <div class="card-image">
                    <div class="collection" style="height: 280px;">
                      <div class="slideshow-container">
                        <?php foreach ($agenda->result() as $key): ?>
                          <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="<?= base_url(); ?>assets/upload/logo/logo-uin-fix.png" style="height:150px; width: 1px;">
                            <div class="text">
                              <span class="title"><b><?= $key->title ?></b></span>
                              <p><?= $key->description ?><br>
                              <span class="new badge green" data-badge-caption=""><?= $key->time_desc ?></span>
                              </p>
                            </div>
                          </div>
                        <?php endforeach; ?>
                        </div>
                        <br>
                        <div style="text-align:center">
                          <?php $no = 1; foreach ($agenda->result() as $key): ?>
                            <span class="dot"><?= $no ?></span>
                          <?php $no++; endforeach; ?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action card-action-title" style="
                          background-color: <?= (setting_display()['color']) ?>;
                          color: <?= (setting_display()['font_color']) ?>;
                          ">
                    <b>Info Akademik</b>
                  </div>
                  <div class="card-image">
                      <ul class="collection" style="height: 300fpx;">
                        <?php if ($info->num_rows() > 0): ?>
                            <?php foreach ($info->result() as $key): ?>
                                <li class="collection-item">
                                  <span class="title"><b><?= $key->title ?></b></span>
                                  <p><?= $key->description ?><br>
                                  <span class="new badge green" data-badge-caption=""><?= $key->time_desc ?></span>
                                  </p>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                          <li class="collection-item">
                            <i>Belum ada info</i>
                          </li>
                        <?php endif; ?>
                      </ul>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <!-- /. ROW  -->
           <div class="fixed-action-btn horizontal click-to-toggle">
              <a class="btn-floating btn-large orange">
                <i class="material-icons">menu</i>
              </a>
              <ul>
                <!-- <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li> -->
                <li><a href="<?= base_url(); ?>home/pasca" class="btn-floating yellow darken-1" id="btn-pasca"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green" id="btn-fs"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue" id="btn-admin"><i class="material-icons">attach_file</i></a></li>
              </ul>
            </div>

          <footer>
            <div class="row" style="margin-right: -30px ! important; margin-left: -30px ! important;">
              <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 0 ! important;">
                <div class="card orange">
                  <div class="card-action" style="padding-bottom: 30px; font-size: 18px; font-weight: lighter;">
                    <div class="marquee-runtext">
                      <?php if ($running_text->num_rows() > 0): ?>
                          <span>
                          <?php foreach ($running_text->result() as $key): ?>
                                <?= $key->name ?>: <?= $key->description ?> | &nbsp;
                          <?php endforeach; ?>
                          </span>
                      <?php endif; ?>
                      <span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<script type="text/javascript">
var slideIndex = 0;

<?php if ($agenda->num_rows() > 0) : ?>
showSlides();
<?php endif; ?>

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active-dot", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active-dot";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function maxWindow() {
    window.moveTo(0, 0);

    if (document.all) {
        top.window.resizeTo(screen.availWidth, screen.availHeight);
    }

    else if (document.layers || document.getElementById) {
        if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
            top.window.outerHeight = screen.availHeight;
            top.window.outerWidth = screen.availWidth;
        }
    }
}

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
}

$(document).ready(function(){
    // timedRefresh(10000)
    $('.marquee').marquee({
    	direction: 'down',
      dublicated: true,
    	speed: <?= setting_display()['marquee_speed'] ?>
    });

    $('.marquee-runtext').marquee({
      dublicated: true,
    	speed: <?= setting_display()['marquee_speed_running_text'] ?>
    });

    $('.marquee-munaqosah').marquee({
    	direction: 'down',
      dublicated: true,
    	speed: <?= setting_display()['marquee_speed'] ?>
    });

    $("#btn-fs").click();
    $("html, body").animate({ scrollTop: 0 }, "slow");

    $("#btn-fs").on("click", function(e) {
        e.preventDefault();
        var elem = document.body; // Make the body go full screen.
        requestFullScreen(elem);
    })

    $("#btn-admin").on("click", function(e) {
        e.preventDefault();
        var url = "<?= base_url() ?>schedule/schedule"; // Make the body go full screen.
        window.location.href=url;
    })
    // maxWindow();
    // setTimeout(function(){
    //     window.location.reload();
    // }, 4000);
    $("#sideNav").click();
})
</script>
