<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="/admin" class=" waves-effect">
                        <i class="bx bxs-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Call Center</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-support"></i>
                        <span>Agents</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/agents/">Agents</a></li>
                        <li><a href="admin/agents/add">Add New Agent</a></li>
                        <li><a href="/agents/group">Agent Group</a></li>
                        <li><a href="/extension">Extension Status</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.customer') }}">Customer</a></li>
                        <li><a href="{{ route('admin.customer-group') }}">Customer Group</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fas fa-voicemail"></i>
                        <span>Voip</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-building"></i>
                        <span>Offices</span>
                    </a>
                </li>
                <li>
                    <a href="chat" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Chat</span>
                    </a>
                </li>
                <li class="menu-title">Calls</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-message-dots"></i>
                        <span>Auto Answer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="schedule/view">Scheduler</a></li>
                        <li><a href="prompt/view">Voice prompts</a></li>
                        <li><a href="holdMusic">Music on hold</a></li>
                        <li><a href="submenu/view">Sub-menus</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-add-to-queue"></i>
                        <span>ACD</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="admin/queue/view">View Queues</a></li>
                        <li><a href="admin/queue/add">Add Queue</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-pulse"></i>
                        <span>Recordings</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                        <i class="fas fa-mail-bulk"></i>
                        <span>SMS Routing</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.number') }}" class="waves-effect" aria-expanded="false">
                        <i class="bx bx bx-spreadsheet"></i>
                        <span>Phone Numbers</span>
                    </a>
                </li>
                <li class="menu-title">System</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.user') }}">User</a></li>
                        <li><a href="{{ route('admin.user-group') }}">User Group</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.page') }}" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-file"></i>
                        <span>Front Pages</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.log') }}" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-file-blank"></i>
                        <span class="badge badge-pill badge-danger float-right">6</span>
                        <span>Log</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting') }}" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="menu-title">Info</li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span>Statistic</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                        <i class="bx bxs-report"></i>
                        <span>Reporting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/reports/cdr">CDR Reports</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
