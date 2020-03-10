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

.navbar-side {
  display: none;
}

#page-wrapper {
  margin-left: 0px;
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
 -moz-animation: example3 <?= setting_display()['marquee_speed'] ?>s linear infinite;
 -webkit-animation: example3 <?= setting_display()['marquee_speed'] ?>s linear infinite;
 animation: example3 <?= setting_display()['marquee_speed'] ?>s linear infinite;
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
  animation-delay: <?= (setting_display()['marquee_speed']/2) ?>s;
}

.marquee {
  margin: 0 auto;
  white-space: nowrap;
  overflow: hidden;
  position: absolute;
  width: 97%;
  height: 100%;
}

.marquee span {
  display: inline-block;
  padding-left: 100%;
  animation: marquee <?= setting_display()['marquee_speed_running_text'] ?>s linear infinite;
}

.marquee2 span {
  animation-delay: <?= (setting_display()['marquee_speed_running_text']/2) ?>s;
}

@keyframes marquee {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(-100%, 0);
  }
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
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="height: <?= (setting_display()['bottom_section']) ?>px;">
                  <div class="card-action card-action-title" style="
                          background-color: <?= (setting_display()['color']) ?>;
                          color: <?= (setting_display()['font_color']) ?>;
                          ">
                    <b>Jadwal Kuliah Hari Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection" style="height: <?= (setting_display()['bottom_section']-100) ?>px;">
                        <!-- load course_table -->
                        <input type="hidden" id="total-row" value="<?= $count_room ?>">
                        <div id="course-table"></div>
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
                <!-- <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li> -->
                <li><a class="btn-floating green" id="btn-fs"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue" id="btn-admin"><i class="material-icons">attach_file</i></a></li>
              </ul>
            </div>

          <footer>
            <div class="row" style="margin-right: -30px ! important; margin-left: -30px ! important;">
              <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 0 ! important;">
                <div class="card orange">
                  <div class="card-action" style="padding-bottom: 30px; font-size: 18px; font-weight: lighter;">
                    <div class="marquee">
                      <?php if ($running_text->num_rows() > 0): ?>
                          <span>
                          <?php foreach ($running_text->result() as $key): ?>
                                <?= $key->name ?>: <?= $key->description ?> | &nbsp;
                          <?php endforeach; ?>
                          </span>
                      <?php endif; ?>
                      <span></span>
                    </div>
                    <div class="marquee marquee2">
                      <?php if ($running_text->num_rows() > 0): ?>
                          <span>
                          <?php foreach ($running_text->result() as $key): ?>
                                <?= $key->name ?>: <?= $key->description ?> | &nbsp;
                          <?php endforeach; ?>
                          </span>
                      <?php endif; ?>
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

function reloadCourse(val) {
    var url = '<?= base_url(); ?>home/pasca/ajax_table/'+val;
    $.get(url, function(data) {
        $('#course-table').html(data);
    })
}
$(document).ready(function(){
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
    var page_total = $("#total-row").val();
    var i = 0;
    var k = 0;
    setInterval(function(){
        console.log(k);

        if (k > page_total) {
            i = 0;
            reloadCourse(i);
            // window.location.href = '<?= base_url() ?>home/pasca';
        } else {
            i++;
            reloadCourse(k);
        }
        k = parseInt(i) * parseInt(10);
    }, 4000);

    setInterval(function(){
        window.location.href = '<?= base_url() ?>home/pasca';
    }, 900000);
})
</script>
