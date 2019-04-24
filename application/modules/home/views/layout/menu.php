<!-- BEGIN MEGA MENU -->
<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
<div class="hor-menu">
    <ul class="nav navbar-nav">
        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
            <a href="<?= base_url(); ?>"> Dashboard
                <span class="arrow"></span>
            </a>
        </li>
        <?php echo $menu; ?>
        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;"> More
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
                <li aria-haspopup="true" class="dropdown-submenu ">
                    <a href="javascript:;" class="nav-link nav-toggle ">
                        <i class="icon-settings"></i> Form Stuff
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li aria-haspopup="true" class=" ">
                            <a href="form_controls.html" class="nav-link "> Bootstrap Form
                                <br>Controls </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_controls_md.html" class="nav-link "> Material Design
                                <br>Form Controls </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_validation.html" class="nav-link "> Form Validation </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_validation_states_md.html" class="nav-link "> Material Design
                                <br>Form Validation States </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_validation_md.html" class="nav-link "> Material Design
                                <br>Form Validation </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_layouts.html" class="nav-link "> Form Layouts </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_repeater.html" class="nav-link "> Form Repeater </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_input_mask.html" class="nav-link "> Form Input Mask </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_editable.html" class="nav-link "> Form X-editable </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_wizard.html" class="nav-link "> Form Wizard </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_icheck.html" class="nav-link "> iCheck Controls </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_image_crop.html" class="nav-link "> Image Cropping </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_fileupload.html" class="nav-link "> Multiple File Upload </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="form_dropzone.html" class="nav-link "> Dropzone File Upload </a>
                        </li>
                    </ul>
                </li>
                <li aria-haspopup="true" class="dropdown-submenu ">
                    <a href="javascript:;" class="nav-link nav-toggle ">
                        <i class="icon-briefcase"></i> Tables
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li aria-haspopup="true" class=" ">
                            <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="table_bootstrap.html" class="nav-link "> Bootstrap Tables </a>
                        </li>
                        <li aria-haspopup="true" class="dropdown-submenu ">
                            <a href="javascript:;" class="nav-link nav-toggle"> Datatables
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                </li>
                                <li class="">
                                    <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li aria-haspopup="true" class="dropdown-submenu ">
                    <a href="?p=" class="nav-link nav-toggle ">
                        <i class="icon-wallet"></i> Portlets
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li aria-haspopup="true" class=" ">
                            <a href="portlet_boxed.html" class="nav-link "> Boxed Portlets </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="portlet_light.html" class="nav-link "> Light Portlets </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="portlet_solid.html" class="nav-link "> Solid Portlets </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="portlet_ajax.html" class="nav-link "> Ajax Portlets </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="portlet_draggable.html" class="nav-link "> Draggable Portlets </a>
                        </li>
                    </ul>
                </li>
                <li aria-haspopup="true" class="dropdown-submenu ">
                    <a href="?p=" class="nav-link nav-toggle ">
                        <i class="icon-settings"></i> Elements
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li aria-haspopup="true" class=" ">
                            <a href="elements_steps.html" class="nav-link "> Steps </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="elements_lists.html" class="nav-link "> Lists </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="elements_ribbons.html" class="nav-link "> Ribbons </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="elements_overlay.html" class="nav-link "> Overlays </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="elements_cards.html" class="nav-link "> User Cards </a>
                        </li>
                    </ul>
                </li>
                <li aria-haspopup="true" class="dropdown-submenu ">
                    <a href="javascript:;" class="nav-link nav-toggle ">
                        <i class="icon-bar-chart"></i> Charts
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_amcharts.html" class="nav-link "> amChart </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_flotcharts.html" class="nav-link "> Flot Charts </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_flowchart.html" class="nav-link "> Flow Charts </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_google.html" class="nav-link "> Google Charts </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_echarts.html" class="nav-link "> eCharts </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="charts_morris.html" class="nav-link "> Morris Charts </a>
                        </li>
                        <li aria-haspopup="true" class="dropdown-submenu ">
                            <a href="javascript:;" class="nav-link nav-toggle"> HighCharts
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <a href="charts_highcharts.html" class="nav-link " target="_blank"> HighCharts </a>
                                </li>
                                <li class="">
                                    <a href="charts_highstock.html" class="nav-link " target="_blank"> HighStock </a>
                                </li>
                                <li class="">
                                    <a href="charts_highmaps.html" class="nav-link " target="_blank"> HighMaps </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- END MEGA MENU -->
