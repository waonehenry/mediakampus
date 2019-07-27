<div id="page-wrapper">
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <button id="btn-fs">FS</button>
                    <b>Jadwal Kuliah Hari Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection">
                      <marquee  behavior="scroll" direction="down" scroll="continuous" valign="center" scrolldelay="3" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
                      <?php foreach ($course->result() as $key): ?>
                          <a href="#!" class="collection-item"><?= $key->course ?> | <?= $key->room ?> | <?= $key->dosen ?> | <?= $key->class ?> <span class="new badge red" data-badge-caption=""><?= $key->start ?>-<?= $key->end ?></span></a>
                      <?php endforeach; ?>
                      </marquee>
                    </div>
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
                </div>
              </div>
            </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Agenda Bulan Ini</b>
                  </div>
                  <div class="card-image">
                    <div class="collection">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-action">
                    <b>Pengumuman:</b>
                  </div>
                  <div class="card-image">
                      <ul class="collection">
                        <li class="collection-item">1. Jadwal registrasi mahasiswa baru silakan dilihat pada website resmi fakultas</li>
                        <li class="collection-item">2. Daftar ulang mahasiswa lama dimulai pada tanggal 12 Agustus 2019</li>
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
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
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
