<?php $user = checkUser();?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! asset('images/profile.jpg') !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! access()->user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
       {{--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            @if($user == 'Administrator')
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!! route('admin.dashboard') !!}"><span>{{ trans('menus.backend.sidebar.dashboard') }}</span></a>
            </li>
            @endif
            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    <a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.backend.access.title') }}</span></a>
                </li>
            @endauth

            <li class="{{ Active::pattern('admin/members/*') }}">
                <a href="{!! route('members.view') !!}">
                    <i class="fa fa fa-users"></i><span class="text-bold">Members</span>
                </a>
            </li>

            <li class="{{ Active::pattern('admin/shop/*') }}">
               {{--  <a href="{!! route('shop.view') !!}"><i class="fa fa-laptop"></i>Shop</a>
                <a href="{!! route('shop.view') !!}"><i class="fa fa-laptop"></i>Package</a>
                <a href="{!! route('shop.view') !!}"><i class="fa fa-laptop"></i>Create Package</a> --}}
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Shop</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/shop*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/shop*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/shop/list') }}">
                        <a href="{!! url('admin/shop/list') !!}"><i class="fa fa-laptop"></i>Shop</a>
                    </li>
                    <li class="{{ Active::pattern('admin/shop/package') }}">
                        <a href="{!! url('admin/shop/package') !!}"><i class="fa fa-laptop"></i>Package</a>
                    </li>
                    <li class="{{ Active::pattern('admin/shop/package/create') }}">
                        <a href="{!! url('admin/shop/package/create') !!}"><i class="fa fa-laptop"></i>Create Package</a>
                    </li>
                </ul>
            </li>
            @include('backend.includes.category-nav')
            @if($user == 'Administrator')
            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.backend.log-viewer.dashboard') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.backend.log-viewer.logs') }}</a>
                    </li>
                </ul>
            </li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
