<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand" style="background-color: #6f42c1;">
            <a href="/dashboard">
                <img src="{{asset('frontend/assets/img/favicon.png')}}" alt="customer image">
                <span class="brand-name">IamSyahmi </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar" style="background-color: #3e266b;">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu" style="background-color: #37225e">

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
                                <a class="sidenav-item-link" href="{{route('admin.portfolio')}}">
                                    <span class="nav-text">Portfolio</span>

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
                        <div class="sub-menu" style="background-color: #37225e;">

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

        <div class="sidebar-footer" style="background-color: #3e266b;">
            <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                    Powered by mrnopeofficial
                </h6>
            </div>
        </div>
    </div>
</aside>