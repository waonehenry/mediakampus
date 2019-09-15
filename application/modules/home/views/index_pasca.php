<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
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
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
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
</style><div id="page-wrapper">
    <div class="header">
        <!-- <h1 class="page-header">
            Dashboard
        </h1> -->
        <ol class="breadcrumb">
          <!-- <li><a href="#">Home</a></li>
          <li><a href="#">Dashboard</a></li>
          <li class="active">Data</li> -->
        </ol>
    </div>
        <div id="page-inner" style="padding-top: 0px ! important;">
          <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Jadwal Kuliah Hari Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection">
                      <marquee  behavior="scroll" direction="down" scroll="continuous" valign="center" scrolldelay="3" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
                      <?php foreach ($course->result() as $key): ?>
                          <?php
                                $color_badge = "green";
                                if (empty_course($key->dosen_id, $key->shift_id, date('Y-m-d')) > 0) {
                                    $color_badge = "red";
                                }
                          ?>
                          <a href="#!" class="collection-item"><?= $key->course ?> | <?= $key->room ?> | <?= $key->dosen ?> | <?= $key->class ?> <span class="new badge <?= $color_badge?>" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span></a>
                      <?php endforeach; ?>
                      </marquee>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Registrasi Thesis/Disertasi</b>
                  </div>
                  <div class="card-image">
                    <ul class="collection">
                        <?php if ($register->num_rows() > 0): ?>
                            <?php foreach ($register->result() as $key): ?>
                                <li class="collection-item">
                                  <span class="title"><b><?= $key->name ?></b></span>
                                  <p><?= $key->document ?><br>
                                  <p><?= $key->description ?><br>
                                  <span class="new badge green" data-badge-caption=""><?= $key->created_at ?></span>
                                  </p>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                          <li class="collection-item">
                            <i>Belum ada agenda</i>
                          </li>
                        <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="card">
                <div class="card-action">
                  <b>Jadwal Munaqosah Pekan Ini</b>
                </div>
                <div class="card-image">
                    <ul class="collection">
                      <marquee  behavior="scroll" direction="down" scroll="continuous" valign="center" scrolldelay="6" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
                      <?php foreach ($thesis->result() as $key): ?>
                      <li class="collection-item avatar">
                        <i class="material-icons circle green">track_changes</i>
                        <span class="title"><?= $key->title ?></span>
                        <p><?= $key->description ?><br>
                           Ruang: <?= $key->room ?> <span class="new badge red" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span>
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
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Agenda Bulan Ini</b>
                  </div>
                  <div class="card-image">
                    <ul class="collection">
                        <?php if ($agenda->num_rows() > 0): ?>
                            <?php foreach ($agenda->result() as $key): ?>
                                <li class="collection-item">
                                  <span class="title"><b><?= $key->title ?></b></span>
                                  <p><?= $key->description ?><br>
                                  <span class="new badge green" data-badge-caption=""><?= $key->time_desc ?></span>
                                  </p>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                          <li class="collection-item">
                            <i>Belum ada agenda</i>
                          </li>
                        <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
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
          <!-- /. ROW  -->
           <div class="fixed-action-btn horizontal click-to-toggle">
              <a class="btn-floating btn-large red">
                <i class="material-icons">menu</i>
              </a>
              <ul>
                <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green" id="btn-fs"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
              </ul>
            </div>

          <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p>


          </footer>
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
    // maxWindow();
    // setTimeout(function(){
    //     window.location.reload();
    // }, 4000);
    $("#sideNav").click();
})
</script>
