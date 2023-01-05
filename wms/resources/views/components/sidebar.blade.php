<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><img src="{{ Vite::asset('resources/assets/img/WMS.png') }}" style="width:40%;"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="{{ Vite::asset('resources/assets/img/WMSLite.png') }}" style="width:80%;"></a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('supplier') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('supplier') }}"><i class="fas fa-user"></i>
                    <span>Supplier</span>
                </a>
            </li>
            </li>
            <li class="{{ request()->is('items') ? 'active' : '' }}">
                <a href="{{ url('items') }}"><i class="fa fa-boxes"></i><span>Warehouse</span></a>
            </li>
            <li class="{{ request()->is('room') ? 'active' : '' }}">
                <a href="{{ url('room') }}"><i class="fa fa-door-open"></i><span>Ruangan</span></a>
            </li>
            <li class="{{ request()->is('report_item') ? 'active' : '' }}">
                <a href="{{ url('report_item') }}"><i class="fa fa-truck"></i><span>Lapor Barang
                        Rusak</span></a>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Documentation
            </a>
        </div>
    </aside>
</div>
