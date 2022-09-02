<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if(Auth::user()->hasRole('Administration'))
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('administrator.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Manage Requisitions</li>   
                        <li>
                            <a href="{{ route('administration.pending.requisition') }}" class="waves-effect">
                                <i class="bx bx-shield-quarter"></i>
                                <span key="t-calendar">Pending Approval</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('administration.approved.requisition') }}" class="waves-effect">
                                <i class="bx bx-calendar-check"></i>
                                <span key="t-calendar">Approved Requisitions</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('administration.forwarded.requisition') }}" class="waves-effect">
                                <i class="bx bx-fast-forward-circle"></i>
                                <span key="t-calendar">Forwarded Requisitions</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('administration.declined.requisition') }}" class="waves-effect">
                                <i class="bx bx-window-close"></i>
                                <span key="t-calendar">Declined Requisitions</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Manage Teachers</li>   
                        <li>
                            <a href="{{ route('teachers.list') }}" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">Approved List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('approval.list') }}" class="waves-effect">
                                <i class="bx bx-shield-quarter"></i>
                                <span key="t-calendar">Waiting Approval</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Manage Drivers</li>
                        <li>
                            <a href="{{ route('driver.index') }}" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Drivers List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('driver.create') }}" class="waves-effect">
                                <i class="bx bx-plus-circle"></i>
                                <span key="t-calendar">Add Driver</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('driver.scheduled') }}" class="waves-effect">
                                <i class="bx bx-alarm"></i>
                                <span key="t-calendar">Scheduled Drivers</span>
                            </a>
                        </li>

                @elseif(Auth::user()->hasRole('Teacher'))
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('teacher.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Requisition Tools</li>
                        <li class="@if(url()->current() == route('create.personal.requisition')) mm-active @elseif(url()->current() == route('create.official.requisition')) mm-active @endif">
                            <a href="{{ route('get.started') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Start New Requisition</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
                                <i class="bx bx-receipt"></i>
                                <span key="t-multi-level">My Requisitions</span>
                            </a>

                            <ul class="sub-menu mm-collapse mm-show" aria-expanded="true" style="">
                                
                                <li><a href="{{ route('teacher.pending.administration') }}" key="t-level-1-1" aria-expanded="false">Pending (Administration)</a></li>
                                <li><a href="{{ route('teacher.approved.administration') }}" key="t-level-1-1" aria-expanded="false">Approve (Administration)</a></li>
                                <li><a href="{{ route('teacher.declined.administration') }}" key="t-level-1-1" aria-expanded="false">Declined (Administration)</a></li>

                                <li><a href="{{ route('teacher.pending.chairman') }}" key="t-level-1-1" aria-expanded="false">Forwarded to VC</a></li>
                                <li><a href="{{ route('teacher.approved.vc') }}" key="t-level-1-1" aria-expanded="false">Approve(Vice Chancellor)</a></li>
                                <li><a href="{{ route('teacher.declined.chairman') }}" key="t-level-1-1" aria-expanded="false">Decline(Vice Chancellor)</a></li>

                            </ul>
                        </li>

                @else
                    <li class="menu-title" key="t-menu">Dashboard Stuff</li>
                        <li>
                            <a href="{{ route('chairman.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Manage Requisitions</li>   
                        <li>
                            <a href="{{ route('chairman.pending.requisition') }}" class="waves-effect">
                                <i class="bx bx-shield-quarter"></i>
                                <span key="t-calendar">Pending Approval</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('chairman.approved.requisition') }}" class="waves-effect">
                                <i class="bx bx-calendar-check"></i>
                                <span key="t-calendar">Approved Requisitions</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('chairman.declined.requisition') }}" class="waves-effect">
                                <i class="bx bx-window-close"></i>
                                <span key="t-calendar">Declined Requisitions</span>
                            </a>
                        </li>

                @endif

                <li class="menu-title" key="t-apps">Profile Tools</li>
                        
                        <li>
                            <a href="{{ url('/user/profile') }}" class="waves-effect">
                                <i class="bx bx-news"></i>
                                <span key="t-calendar">Manage Profile</span>
                            </a>
                        </li>
                        
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
    
</div>