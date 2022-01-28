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
                    <a href="{{ route('admin.customer') }}" class="waves-effect" aria-expanded="false">
                        <i class="bx bx-file"></i>
                        <span>Customer</span>
                    </a>
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
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
