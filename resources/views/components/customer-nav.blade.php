<div class="sidebar-menu">
    <div class="sidebar-header">
        <div>
            <h2 style="color: #ffff">Desktops</h2>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li @if ( Request::is('customer/dashboard') ) class="active" @endif>
                        <a href="{{ route('customer.home') }}" aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>Exploration</span>
                        </a>
                    </li>
                    <li @if ( Request::is('customer/my-workspaces') ) class="active" @endif>
                        <a href="{{ route('my-workspaces.index') }}" aria-expanded="true">
                            <i class="ti-list-ol"></i>
                            <span>MyWorkSpaces</span>
                        </a>
                    </li>

                    <li @if ( Request::is('customer/my-tainents') ) class="active" @endif>
                        <a href="{{ route('my-tainents.index') }}" aria-expanded="true">
                            <i class="ti-list-ol"></i>
                            <span>My Tainents</span>
                        </a>
                    </li>

                    <li @if ( Request::is('customer/settings') ) class="active" @endif>
                        <a href="{{ route('customer.setting.edit') }}" aria-expanded="true">
                            <i class="ti-settings"></i>
                            <span>settings</span>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </div>
</div>
