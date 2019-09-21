<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Verdana, sans-serif;
}

.row {
  margin-bottom: 0px ! important;
  height: 50% ! important;
}

#page-inner {
  margin: 0px ! important;
  padding: 5px 20px ! important;
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
  color: #f2f2f2;
  font-size: 30px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 30px;
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

/* .active {
  background-color: #717171;
} */

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
</style>
<style>
.example3 {
 overflow: hidden;
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 0;
 white-space: nowrap;
 display: inline-block;
 /* text-align: center; */
 /* Starting position */
 -moz-transform:translateY(-100%);
 -webkit-transform:translateY(-100%);
 transform:translateY(-100%);
 /* Apply animation to this element */
 -moz-animation: example3 16s linear infinite;
 -webkit-animation: example3 16s linear infinite;
 animation: example3 16s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes example3 {
 0%   { -moz-transform: translateY(-100%); }
 100% { -moz-transform: translateY(100%); }
}
@-webkit-keyframes example3 {
 0%   { -webkit-transform: translateY(-100%); }
 100% { -webkit-transform: translateY(100%); }
}
@keyframes example3 {
 0%   {
 -moz-transform: translateY(-100%); /* Firefox bug fix */
 -webkit-transform: translateY(-100%); /* Firefox bug fix */
 transform: translateY(-100%);
 }
 100% {
 -moz-transform: translateY(100%); /* Firefox bug fix */
 -webkit-transform: translateY(100%); /* Firefox bug fix */
 transform: translateY(100%);
 }
}

.example4 {
  animation-delay: 8s;
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
                <div class="card" style="height: 350px;">
                  <div class="card-action">
                    <b>Jadwal Kuliah Hari Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection" style="height: 250px;">
                      <div class="example3">
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
                      <div class="example3 example4">
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
                <div class="card-action">
                  <b>Jadwal Munaqosah</b>
                </div>
                <div class="card-image">
                    <ul class="collection">
                      <marquee  behavior="scroll" direction="down" scroll="continuous" valign="center" scrolldelay="6" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
                      <?php foreach ($thesis->result() as $key): ?>
                      <li class="collection-item avatar">
                        <i class="material-icons circle green">track_changes</i>
                        <span class="title"><?= $key->title ?></span>
                        <p><?= $key->description ?><br>
                           Ruang: <?= $key->room ?> <span class="new badge red" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span><br>
                           Penguji: <?= $key->examiner ?>
                        </p>
                      </li>
                      <?php endforeach; ?>
                      </marquee>
                    </ul>
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                          <div class="numbertext">1 / 3</div>
                          <img src="img_nature_wide.jpg" style="width:100%">
                          <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fade">
                          <div class="numbertext">2 / 3</div>
                          <img src="img_snow_wide.jpg" style="width:100%">
                          <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade">
                          <div class="numbertext">3 / 3</div>
                          <img src="img_mountains_wide.jpg" style="width:100%">
                          <div class="text">Caption Three</div>
                        </div>

                    </div>
                    <br>
                    <div style="text-align:center">
                      <span class="dot"></span>
                      <span class="dot"></span>
                      <span class="dot"></span>
                    </div>
                </div>
              </div>
            </div>
              <?php if ($agenda->num_rows() > 0): ?>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Agenda Kampus</b>
                  </div>
                  <div class="card-image">
                    <ul class="collection">
                        <?php foreach ($agenda->result() as $key): ?>
                            <li class="collection-item">
                              <span class="title"><b><?= $key->title ?></b></span>
                              <p><?= $key->description ?><br>
                              <span class="new badge green" data-badge-caption=""><?= $key->time_desc ?></span>
                              </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Info Akademik:</b>
                  </div>
                  <div class="card-image">
                      <ul class="collection">
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
                <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green" id="btn-fs"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue" id="btn-admin"><i class="material-icons">attach_file</i></a></li>
              </ul>
            </div>

          <!-- <footer style="position: fixed;"><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>


          </footer> -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<script type="text/javascript">
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

$(document).ready(function(){
    $("#btn-fs").click();

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
