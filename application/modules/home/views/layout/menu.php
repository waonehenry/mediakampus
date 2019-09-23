<nav class="navbar-default navbar-side" role="navigation" style="">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="waves-effect waves-dark modul-dashboard" href="#"><i class="fa fa-dashboard"></i> Dashboard <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-display">
                    <li>
                        <a href="<?= base_url(); ?>home/dashboard" class="menu-dashboard-akademik"><i class="fa fa-fw fa-file"></i> Akademik</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>home/dashboard/agenda" class="menu-dashboard-agenda"><i class="fa fa-fw fa-file"></i> Agenda</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>home/dashboard/pasca" class="menu-dashboard-agenda"><i class="fa fa-fw fa-file"></i> Pascasarjana</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> Agenda <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-agenda">
                    <li>
                        <a href="<?= base_url(); ?>agenda/info" class="menu-info"><i class="fa fa-fw fa-file"></i> Information</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>agenda/agenda" class="menu-agenda"><i class="fa fa-fw fa-file"></i> Event</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>agenda/running_text" class="menu-running-text"><i class="fa fa-fw fa-file"></i> Running Text</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="waves-effect waves-dark modul-schedule"><i class="fa fa-qrcode"></i> Schedule <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-schedule">
                    <li>
                        <a href="<?= base_url(); ?>schedule/schedule" class="menu-course"><i class="fa fa-fw fa-file"></i> Course</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>schedule/thesis" class="menu-thesis"><i class="fa fa-fw fa-file"></i> Thesis</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="waves-effect waves-dark modul-masterdata"><i class="fa fa-table"></i> Masterdata <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-masterdata">
                    <li>
                        <a href="<?= base_url(); ?>masterdata/room" class="menu-room"><i class="fa fa-fw fa-file"></i> Room</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/student_class" class="menu-class"><i class="fa fa-fw fa-file"></i> Class</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/prodi" class="menu-prodi"><i class="fa fa-fw fa-file"></i> Prodi</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/course" class="menu-course-master"><i class="fa fa-fw fa-file"></i> Course</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/shift" class="menu-shift"><i class="fa fa-fw fa-file"></i> Shift</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/document" class="menu-document"><i class="fa fa-fw fa-file"></i> Document</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark modul-dosen"><i class="fa fa-edit"></i> Admin Dosen <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-dosen">
                    <li>
                        <a href="<?= base_url(); ?>masterdata/dosen" class="menu-dosen"><i class="fa fa-fw fa-file"></i> Dosen</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>schedule/empty_course" class="menu-empty-course"><i class="fa fa-fw fa-file"></i> Empty Course</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark modul-register"><i class="fa fa-edit"></i> Register <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-register">
                    <li>
                        <a href="<?= base_url(); ?>register/thesis" class="menu-register-thesis"><i class="fa fa-fw fa-file"></i> Thesis</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark modul-user-management"><i class="fa fa-edit"></i> User Management <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-user-management">
                    <li>
                        <a href="<?= base_url(); ?>roles/user" class="menu-user"><i class="fa fa-fw fa-file"></i> User</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>roles/modul" class="menu-modul"><i class="fa fa-fw fa-file"></i> Modul</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark modul-setting"><i class="fa fa-edit"></i> Setting <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level ul-setting">
                    <li>
                        <a href="<?= base_url(); ?>setting/display" class="menu-setting"><i class="fa fa-fw fa-file"></i> Display</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
