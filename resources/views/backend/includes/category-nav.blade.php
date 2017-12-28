 <li class="{{ Active::pattern('admin/category/*') }}">
    <a href="#">
        <i class="fa fa-server"></i>
        <span>category</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu {{ Active::pattern('admin/category*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/category*', 'display: block;') }}">
        <li class="{{ Active::pattern('admin/category/list') }}">
            <a href="{!! url('admin/category/list') !!}">
                <i class="fa fa-server"></i>category list
            </a>
        </li>
        <li class="{{ Active::pattern('admin/category/create') }}">
            <a href="{!! url('admin/category/create').'?level=1' !!}">
                <i class="fa fa-server"></i>category main create
            </a>
        </li>
        <li class="{{ Active::pattern('admin/category/create') }}">
            <a href="{!! url('admin/category/create').'?level=2' !!}">
                <i class="fa fa-server"></i>category create level 2
            </a>
        </li>
        <li class="{{ Active::pattern('admin/category/create') }}">
            <a href="{!! url('admin/category/create').'?level=3' !!}">
                <i class="fa fa-server"></i>category create level 3
            </a>
        </li>
        <li class="{{ Active::pattern('admin/category/create') }}">
            <a href="{!! url('admin/category/create').'?level=4' !!}">
                <i class="fa fa-server"></i>category create level 4
            </a>
        </li>
    </ul>
</li>
