<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/dashboard">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Inventorium </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li>
                                <a class="sidenav-item-link" href="{{route('admin.passion')}}">
                                    <span class="nav-text">Passion</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('admin.about')}}">
                                    <span class="nav-text">About Me</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('multi.image')}}">
                                    <span class="nav-text">Portfolio</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('all.brand')}}">
                                    <span class="nav-text">Brand</span>

                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Contact</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-elements" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li>
                                <a class="sidenav-item-link" href="{{route('admin.contact')}}">
                                    <span class="nav-text">Profile</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{route('admin.contactform')}}">
                                    <span class="nav-text">Message</span>

                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

            </ul>

        </div>

        <hr class="separator" />

        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                    Powered by mrnopeofficial
                </h6>
            </div>
        </div>
    </div>
</aside>