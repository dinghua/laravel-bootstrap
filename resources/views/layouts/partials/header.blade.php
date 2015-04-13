<header id="header" class="app-header navbar" role="menu">
    <!-- navbar header -->
    <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">
            <i class="fa fa-btc"></i>
            <img src="" alt="." class="hide">
            <span class="hidden-folded m-l-xs">{{Lang::get('common.site_name')}}</span>
        </a>
        <!-- / brand -->
    </div>
    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
            <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <ul class="nav navbar-nav hidden-sm">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
                    <span>新建</span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/admin/permission/create" >权限</a></li>
                    <li><a href="/admin/role/create" >角色</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="">
                            <span class="badge bg-danger pull-right">4</span>
                            <span translate="header.navbar.new.EMAIL">Email</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- / link and dropdown -->

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle clear">
                    <span class="hidden-sm hidden-md">{{Auth::user()->name}}</span> <b class="caret"></b>
                </a>
                <!-- dropdown -->
                <ul class="dropdown-menu animated fadeInRight w">
                    <li>
                        <a href="/auth/logout">注销</a>
                    </li>
                </ul>
                <!-- / dropdown -->
            </li>
        </ul>
        <!-- / navbar right -->
    </div>
    <!-- / navbar collapse -->
</header>