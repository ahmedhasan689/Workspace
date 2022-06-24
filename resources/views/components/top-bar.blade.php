<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">
                    Dashboard
                </h4>

                <ul class="breadcrumbs pull-left">
                    <li>
                        <a href="owner-dashboard.html">
                            @yield('breadcramp_title')
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ Auth::guard(session('guardName'))->user()->image }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">

                    {{ Auth::guard(session('guardName'))->user()->full_name }}

                    <i class="fa fa-angle-down"></i>
                </h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Settings</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="border: none; background-color: transparent; color: #8a8a8a; margin-left: 25px;">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area End -->
