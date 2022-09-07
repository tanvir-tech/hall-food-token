<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
        @if(Auth::check())
            <ul class="metismenu list-unstyled" id="side-menu">

                @if(Auth::user()->hasRole('Administrator'))
                    <li class="menu-title" key="t-menu">Quick Menu</li>
                        <li>
                            <a href="{{ route('administrator.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-menu">Token Stats</li>
                        
                        <li>
                            <a href="{{ route('date.wise.token') }}" class="waves-effect">
                                <i class="bx bx-calendar"></i>
                                <span key="t-calendar">Date Wise Tokens</span>
                            </a>
                        </li>

                    <li class="menu-title" key="t-apps">Admin Tools</li>
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">All Students</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('add.student') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Student</span>
                            </a>
                        </li>

                @else
                    <li class="menu-title" key="t-menu">Quick Menu</li>
                        <li>
                            <a href="{{ route('student.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>
                
                    <li class="menu-title" key="t-apps">Student Tools</li>

                        <li>
                            <a href="{{ route('buy.token') }}" class="waves-effect">
                                <i class="bx bx-cart-alt"></i>
                                <span key="t-calendar">Buy Token</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('today.token') }}" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Today's Token</span>
                            </a>
                        </li>

                    {{-- <li class="menu-title" key="t-apps">Customer Tools</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-calendar">Customer List</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-calendar">Add Customer</span>
                            </a>
                        </li> --}}
                
                    {{-- <li class="menu-title" key="t-apps">History Stuffs</li>
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-calendar-weekend"></i>
                                <span key="t-calendar">This Week</span>
                            </a>
                        </li>
                    
                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-clock-start"></i>
                                <span key="t-calendar">This Month</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="mdi mdi-table-clock"></i>
                                <span key="t-calendar">This Year</span>
                            </a>
                        </li>

                        <li>
                            <a href="" class="waves-effect">
                                <i class="bx bx-aperture"></i>
                                <span key="t-calendar">Advanced Search</span>
                            </a>
                        </li> --}}
                @endif
            </ul>
            
        @endif
        </div>
        <!-- Sidebar -->
    </div>
    
</div>