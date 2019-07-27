<nav class="navbar-default navbar-side" role="navigation" style="">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="waves-effect waves-dark modul-dashboard" href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-desktop"></i> Agenda <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url(); ?>agenda/announcement"><i class="fa fa-fw fa-file"></i> Announcement</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>agenda/event"><i class="fa fa-fw fa-file"></i> Event</a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#" class="active-menu waves-effect waves-dark modul-schedule"><i class="fa fa-qrcode"></i> Schedule <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
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
                <ul class="nav nav-second-level">
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
                        <a href="<?= base_url(); ?>masterdata/course" class="menu-course"><i class="fa fa-fw fa-file"></i> Course</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>masterdata/shift" class="menu-shift"><i class="fa fa-fw fa-file"></i> Shift</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect waves-dark modul-dosen"><i class="fa fa-edit"></i> Admin Dosen <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?= base_url(); ?>masterdata/dosen" class="menu-dosen"><i class="fa fa-fw fa-file"></i> Dosen</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>schedule/dosen_restrict" class="menu-holiday"><i class="fa fa-fw fa-file"></i> Holiday</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="waves-effect waves-dark"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
